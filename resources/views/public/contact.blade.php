@extends('layouts.public', ['title' => 'Kontak HanaTea'])

@section('content')
@php
  $wa = $setting->whatsapp ?? null;
  $waNumber = $wa ? preg_replace('/\D+/', '', $wa) : null;
  $waLink = $waNumber ? ('https://wa.me/'.$waNumber.'?text='.urlencode('Halo HanaTea, saya mau pesan.')) : null;
@endphp

<section class="mx-auto max-w-6xl px-4 py-12">
  <div class="grid gap-6 md:grid-cols-2">
    <div class="rounded-3xl border border-emerald-100 bg-white p-8 shadow-sm">
      <h1 class="text-3xl font-extrabold">Kontak & Lokasi</h1>
      <p class="mt-3 text-slate-600">Hubungi HanaTea untuk pemesanan cepat.</p>

      <div class="mt-6 grid gap-3">
        <div class="rounded-2xl border border-slate-200 p-5">
          <div class="text-sm font-extrabold">WhatsApp Pemesanan</div>
            <a class="mt-2 inline-block text-sm font-extrabold text-emerald-800 hover:text-emerald-900"
               href="{{ $waLink }}" target="_blank">{{ $setting->whatsapp }}</a>
        </div>

        <div class="rounded-2xl border border-slate-200 p-5">
          <div class="text-sm font-extrabold">Instagram</div>
            <a class="mt-2 inline-block text-sm font-extrabold text-emerald-800 hover:text-emerald-900"
               href="{{ $setting->instagram }}" target="_blank">{{ $setting->instagram }}</a>
        </div>

        <div class="rounded-2xl border border-slate-200 p-5">
          <div class="text-sm font-extrabold">TikTok</div>
            <a class="mt-2 inline-block text-sm font-extrabold text-emerald-800 hover:text-emerald-900"
               href="{{ $setting->tiktok }}" target="_blank">{{ $setting->tiktok }}</a>
        </div>

        <div class="rounded-2xl border border-slate-200 p-5">
          <div class="text-sm font-extrabold">Alamat UMKM</div>
          <div class="mt-2 inline-block text-sm font-extrabold text-emerald-800 hover:text-emerald-900">
            UNIB Belakang
            <div class="text-xs text-slate-500 font-semibold underline">
            <a href="{{ $setting->address}}" target="_blank" class="text-emerald-800 hover:text-emerald-900">
              (Lihat di Maps)
            </a>
            </div>
          </div>
          <div class="mt-2 text-xs text-slate-500">
            Jam buka: {{ $setting->open_hours ?? 'belum diset' }}
          </div>
        </div>
      </div>
    </div>

    <div class="rounded-3xl border border-emerald-100 bg-white p-8 shadow-sm">
      <h2 class="text-2xl font-extrabold">Pembayaran QRIS</h2>
      <p class="mt-3 text-slate-600">
        Tenang, HanaTea sudah mendukung pembayaran digital via <span class="font-extrabold text-emerald-800">QRIS</span>.
      </p>

      <div class="mt-6 rounded-2xl border border-emerald-100 bg-emerald-50 p-5">
        <img src="{{ asset($setting->qris_image ?? 'assets/cat-qris.png') }}" alt="QRIS HanaTea" class="mt-3 w-48">
        <div class="mt-3 text-sm text-slate-600">
            Scan QRIS untuk pembayaran. Simpan bukti transfer jika diperlukan.
          </div>
      </div>

      <div class="mt-6">
        <a href="{{ route('public.menu') }}"
           class="inline-flex rounded-xl bg-emerald-700 px-5 py-3 text-sm font-extrabold text-white shadow hover:bg-emerald-800">
          Lihat Menu & Harga
        </a>
      </div>
    </div>
  </div>
</section>
@endsection