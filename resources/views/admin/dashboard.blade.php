@extends('layouts.admin', ['title' => 'Dashboard Admin - HanaTea'])

@section('content')
  <div>
    <h1 class="text-2xl font-extrabold">Dashboard</h1>
    <p class="text-slate-600">Ringkasan data HanaTea untuk pengelolaan cepat.</p>
  </div>

  <div class="mt-6 grid gap-4 md:grid-cols-4">
    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
      <div class="text-sm text-slate-500">Jumlah Produk</div>
      <div class="mt-1 text-3xl font-extrabold text-emerald-800">{{ $productCount }}</div>
    </div>

    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
      <div class="text-sm text-slate-500">Jumlah Testimoni</div>
      <div class="mt-1 text-3xl font-extrabold text-emerald-800">{{ $testimonialCount }}</div>
    </div>

    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
      <div class="text-sm text-slate-500">Produk Terlaris</div>
      <div class="mt-1 text-xl font-extrabold text-emerald-800">{{ $topProducts->first()->name ?? '-' }}</div>
    </div>

    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
      <div class="text-sm text-slate-500">Pengunjung</div>
      <div class="mt-1 text-3xl font-extrabold text-emerald-800"> 5 </div>
    </div>
  </div>

  <div class="mt-6 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
    <div class="flex items-center justify-between">
      <h2 class="text-lg font-extrabold">Top Produk</h2>
      <a href="{{ route('admin.products.index') }}" class="text-sm font-semibold text-emerald-800 hover:text-emerald-900">
        Kelola produk →
      </a>
    </div>

    <div class="mt-4 overflow-x-auto">
      <table class="w-full text-sm">
        <thead>
          <tr class="text-left text-slate-500">
            <th class="py-2">Nama</th>
            <th class="py-2">Kategori</th>
            <th class="py-2">Harga</th>
            <th class="py-2">Terjual</th>
            <th class="py-2">Status</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">
          @forelse($topProducts as $p)
            <tr>
              <td class="py-3 font-semibold">{{ $p->name }}</td>
              <td class="py-3">{{ $p->category }}</td>
              <td class="py-3">Rp {{ number_format($p->price, 0, ',', '.') }}</td>
              <td class="py-3">{{ $p->sold_count }}</td>
              <td class="py-3">
                <span class="rounded-full px-2 py-1 text-xs font-semibold {{ $p->status ? 'bg-emerald-50 text-emerald-800' : 'bg-rose-50 text-rose-700' }}">
                  {{ $p->status ? 'Tersedia' : 'Tidak' }}
                </span>
              </td>
            </tr>
          @empty
            <tr><td class="py-4 text-slate-500" colspan="5">Belum ada data.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
@endsection