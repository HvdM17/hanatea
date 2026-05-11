@extends('layouts.admin', ['title' => 'Manajemen Testimoni - HanaTea'])

@section('content')
  <div class="flex flex-col gap-3 md:flex-row md:items-end md:justify-between">
    <div>
      <h1 class="text-2xl font-extrabold">Manajemen Testimoni</h1>
      <p class="text-slate-600">Tambahkan testimoni terbaik untuk meningkatkan kepercayaan pelanggan.</p>
    </div>

    <a href="{{ route('admin.testimonials.create') }}"
       class="inline-flex items-center justify-center rounded-xl bg-emerald-700 px-5 py-3 text-sm font-extrabold text-white shadow hover:bg-emerald-800">
      + Tambah Testimoni
    </a>
  </div>

  <div class="mt-6 overflow-x-auto rounded-2xl border border-slate-200 bg-white shadow-sm">
    <table class="w-full text-sm">
      <thead class="bg-slate-50">
        <tr class="text-left text-slate-600">
          <th class="px-4 py-3">Pelanggan</th>
          <th class="px-4 py-3">Rating</th>
          <th class="px-4 py-3">Pesan</th>
          <th class="px-4 py-3 w-28">Aksi</th>
        </tr>
      </thead>

      <tbody class="divide-y divide-slate-100">
        @forelse($testimonials as $t)
          <tr>
            <td class="px-4 py-4 font-bold">{{ $t->customer_name }}</td>
            <td class="px-4 py-4">
              <span class="rounded-full bg-emerald-50 px-2 py-1 text-xs font-bold text-emerald-800">
                ★ {{ $t->rating }}/5
              </span>
            </td>
            <td class="px-4 py-4 text-slate-700">{{ $t->message }}</td>
            <td class="px-4 py-4">
              <form class="js-delete" method="POST" action="{{ route('admin.testimonials.destroy', $t) }}">
                @csrf @method('DELETE')
                <button type="submit"
                        class="rounded-xl border border-rose-200 bg-rose-50 px-3 py-2 text-xs font-bold text-rose-700 hover:bg-rose-100">
                  Hapus
                </button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="4" class="px-4 py-10 text-center text-slate-500">
              Belum ada testimoni.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="mt-6">{{ $testimonials->links() }}</div>
@endsection

@push('scripts')
<script>
document.querySelectorAll('.js-delete').forEach(form => {
  form.addEventListener('submit', (e) => {
    e.preventDefault();
    Swal.fire({
      title: 'Hapus testimoni?',
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