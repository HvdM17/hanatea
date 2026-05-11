@extends('layouts.admin', ['title' => 'Manajemen Banner - HanaTea'])

@section('content')
  <div class="flex flex-col gap-3 md:flex-row md:items-end md:justify-between">
    <div>
      <h1 class="text-2xl font-extrabold">Manajemen Banner Promo</h1>
      <p class="text-slate-600">Kelola banner promo agar landing page terlihat aktif & profesional.</p>
    </div>

    <a href="{{ route('admin.banners.create') }}"
       class="inline-flex items-center justify-center rounded-xl bg-emerald-700 px-5 py-3 text-sm font-extrabold text-white shadow hover:bg-emerald-800">
      + Tambah Banner
    </a>
  </div>

  <div class="mt-6 overflow-x-auto rounded-2xl border border-slate-200 bg-white shadow-sm">
    <table class="w-full text-sm">
      <thead class="bg-slate-50">
        <tr class="text-left text-slate-600">
          <th class="px-4 py-3">Banner</th>
          <th class="px-4 py-3">Aktif</th>
          <th class="px-4 py-3 w-44">Aksi</th>
        </tr>
      </thead>

      <tbody class="divide-y divide-slate-100">
        @forelse($banners as $b)
          <tr>
            <td class="px-4 py-4">
              <div class="flex items-center gap-3">
                <div class="h-12 w-12 overflow-hidden rounded-xl bg-emerald-50">
                  @if($b->image)
                    <img class="h-full w-full object-cover" src="{{ asset('storage/'.$b->image) }}" alt="{{ $b->title }}">
                  @endif
                </div>
                <div>
                  <div class="font-semibold">{{ $b->title }}</div>
                  <div class="text-xs text-slate-500 line-clamp-1">{{ $b->description }}</div>
                </div>
              </div>
            </td>

            <td class="px-4 py-4">
              <span class="rounded-full px-2 py-1 text-xs font-semibold {{ $b->is_active ? 'bg-emerald-50 text-emerald-800' : 'bg-slate-100 text-slate-700' }}">
                {{ $b->is_active ? 'Aktif' : 'Nonaktif' }}
              </span>
            </td>

            <td class="px-4 py-4">
              <div class="flex gap-2">
                <a href="{{ route('admin.banners.edit', $b) }}"
                   class="rounded-xl border border-slate-200 px-3 py-2 text-xs font-semibold hover:bg-slate-50">
                  Edit
                </a>

                <form class="js-delete" method="POST" action="{{ route('admin.banners.destroy', $b) }}">
                  @csrf @method('DELETE')
                  <button type="submit"
                          class="rounded-xl border border-rose-200 bg-rose-50 px-3 py-2 text-xs font-semibold text-rose-700 hover:bg-rose-100">
                    Hapus
                  </button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="3" class="px-4 py-10 text-center text-slate-500">
              Belum ada banner. Tambahkan promo agar landing page lebih menarik.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="mt-6">{{ $banners->links() }}</div>
@endsection

@push('scripts')
<script>
document.querySelectorAll('.js-delete').forEach(form => {
  form.addEventListener('submit', (e) => {
    e.preventDefault();
    Swal.fire({
      title: 'Hapus banner?',
      text: 'Tindakan ini tidak bisa dibatalkan.',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Ya, hapus',
      cancelButtonText: 'Batal',
    }).then((r) => r.isConfirmed && form.submit());
  });
});
</script>
@endpush