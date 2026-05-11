@extends('layouts.admin', ['title' => 'Manajemen Produk - HanaTea'])

@section('content')
  <div class="flex flex-col gap-3 md:flex-row md:items-end md:justify-between">
    <div>
      <h1 class="text-2xl font-extrabold">Manajemen Produk</h1>
      <p class="text-slate-600">Tambah, edit, atur kategori, harga, dan status ketersediaan.</p>
    </div>

    <a href="{{ route('admin.products.create') }}"
       class="inline-flex items-center justify-center rounded-xl bg-emerald-700 px-5 py-3 text-sm font-extrabold text-white shadow hover:bg-emerald-800">
      + Tambah Produk
    </a>
  </div>

  <div class="mt-6 overflow-x-auto rounded-2xl border border-slate-200 bg-white shadow-sm">
    <table class="w-full text-sm">
      <thead class="bg-slate-50">
        <tr class="text-left text-slate-600">
          <th class="px-4 py-3">Produk</th>
          <th class="px-4 py-3">Kategori</th>
          <th class="px-4 py-3">Harga</th>
          <th class="px-4 py-3">Status</th>
          <th class="px-4 py-3 w-44">Aksi</th>
        </tr>
      </thead>

      <tbody class="divide-y divide-slate-100">
        @forelse($products as $p)
          <tr>
            <td class="px-4 py-4">
              <div class="flex items-center gap-3">
                <div class="h-12 w-12 overflow-hidden rounded-xl bg-emerald-50">
                  @if($p->image)
                    <img class="h-full w-full object-cover" src="{{ asset('assets/'.$p->image) }}" alt="{{ $p->name }}">
                  @endif
                </div>
                <div>
                  <div class="font-semibold">{{ $p->name }}</div>
                  <div class="text-xs text-slate-500">{{ $p->slug }}</div>
                </div>
              </div>
            </td>

            <td class="px-4 py-4 font-bold">{{ $p->category }}</td>
            <td class="px-4 py-4">Rp {{ number_format($p->price, 0, ',', '.') }}</td>
            <td class="px-4 py-4">
              <span class="rounded-full px-2 py-1 text-xs font-semibold {{ $p->status ? 'bg-emerald-50 text-emerald-800' : 'bg-rose-50 text-rose-700' }}">
                {{ $p->status ? 'Tersedia' : 'Tidak tersedia' }}
              </span>
            </td>

            <td class="px-4 py-4">
              <div class="flex gap-2">
                <a href="{{ route('admin.products.edit', $p) }}"
                   class="rounded-xl border border-slate-200 px-3 py-2 text-xs font-semibold hover:bg-slate-50">
                  Edit
                </a>

                <form class="js-delete" method="POST" action="{{ route('admin.products.destroy', $p) }}">
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
            <td colspan="5" class="px-4 py-10 text-center text-slate-500">
              Belum ada produk. Tambahkan menu pertama HanaTea sekarang.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="mt-6">{{ $products->links() }}</div>
@endsection

@push('scripts')
<script>
document.querySelectorAll('.js-delete').forEach(form => {
  form.addEventListener('submit', (e) => {
    e.preventDefault();
    Swal.fire({
      title: 'Hapus produk?',
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