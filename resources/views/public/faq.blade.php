@extends('layouts.public', ['title' => 'FAQ - HanaTea'])

@section('content')
<section class="mx-auto max-w-6xl px-4 py-10">
  <div class="rounded-3xl border border-emerald-100 bg-white p-8 shadow-sm">
    <h1 class="text-3xl font-extrabold">FAQ</h1>
    <p class="mt-2 text-slate-600">Pertanyaan yang sering ditanyakan pelanggan.</p>

    <div class="mt-8 grid gap-4">
      <div class="rounded-2xl border border-slate-200 p-5">
        <div class="font-extrabold">Apakah tersedia QRIS?</div>
        <p class="mt-2 text-sm text-slate-600">Ya, HanaTea mendukung pembayaran digital via QRIS.</p>
      </div>

      <div class="rounded-2xl border border-slate-200 p-5">
        <div class="font-extrabold">Apakah bisa delivery?</div>
        <p class="mt-2 text-sm text-slate-600">
          Bisa. Untuk area sekitar, silakan chat WhatsApp untuk cek ketersediaan & ongkir.
        </p>
      </div>

      <div class="rounded-2xl border border-slate-200 p-5">
        <div class="font-extrabold">Jam buka?</div>
        <p class="mt-2 text-sm text-slate-600">
          Jam buka: <span class="font-bold">{{ $setting->open_hours ?? 'belum diset' }}</span>
        </p>
      </div>

      <div class="rounded-2xl border border-slate-200 p-5">
        <div class="font-extrabold">Minuman best seller?</div>
        <p class="mt-2 text-sm text-slate-600">
          {{ $bestSeller?->name ? $bestSeller->name.' (paling banyak dipesan)' : 'Akan segera tampil setelah ada data penjualan.' }}
        </p>
      </div>
    </div>
  </div>
</section>
@endsection