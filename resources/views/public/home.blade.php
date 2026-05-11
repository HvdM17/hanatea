@extends('layouts.public', ['title' => 'HanaTea - Kesegaran di setiap tegukan'])

@section('content')
@php
  $wa = optional($setting)->whatsapp;
  $waNumber = $wa ? preg_replace('/\D+/', '', $wa) : null;
  $waLink = $waNumber ? ('https://wa.me/'.$waNumber.'?text='.urlencode('Halo HanaTea, saya mau pesan.')) : '#';
@endphp

<section class="mx-auto max-w-6xl px-4 py-10">
  <div class="grid items-center gap-10 md:grid-cols-2">
    <div>
      <div class="inline-flex items-center gap-2 rounded-full bg-emerald-50 px-3 py-1 text-sm text-emerald-800">
        <span class="h-2 w-2 rounded-full bg-emerald-600"></span>
        HanaTea, siap jadi favorit kamu!
      </div>

      <h1 class="mt-4 text-4xl font-extrabold tracking-tight md:text-5xl">
        HanaTea
        <span class="block text-emerald-700">Kesegaran di setiap tegukan</span>
      </h1>

      <p class="mt-4 text-slate-600">
        Menu simple, rasa nagih, dan harga ramah kantong. Cocok buat pelajar & mahasiswa yang butuh minuman segar setiap hari.
      </p>

      <div class="mt-7 flex flex-wrap gap-3">
        <a href="{{ route('public.menu') }}"
           class="rounded-xl bg-emerald-700 px-5 py-3 text-white font-extrabold shadow hover:bg-emerald-800">
          Lihat Menu
        </a>
        <a href="{{ $waLink }}" target="_blank"
           class="rounded-xl border border-emerald-200 px-5 py-3 font-extrabold text-emerald-900 hover:bg-emerald-50">
          Pesan Sekarang
        </a>
      </div>

      <div class="mt-8 flex gap-3 text-center text-sm">
        <div class="flex-1 rounded-2xl border border-emerald-200 p-4">
          <div class="font-extrabold text-emerald-800">3K–10K</div>
          <div class="text-slate-500">Harga terjangkau</div>
        </div>
        <div class="flex-1 rounded-2xl border border-emerald-200 p-4">
          <div class="font-extrabold text-emerald-800">Fresh</div>
          <div class="text-slate-500">Dibuat harian</div>
        </div>
      </div>
    </div>

    <div class="rounded-3xl bg-gradient-to-br from-emerald-700 to-emerald-500 p-1 shadow-xl">
      <div class="rounded-[22px] bg-white p-6">
        <div class="flex items-center justify-between">
          <div class="text-lg font-extrabold">Promo & Info</div>
          <div class="text-sm text-emerald-700 font-extrabold">HanaTea Deals</div>
        </div>

        <div class="mt-4 grid gap-3">
          @forelse($banners as $banner)
            <div class="rounded-2xl border border-emerald-100 p-4 hover:shadow-sm transition">
              <div class="font-extrabold">{{ $banner->title }}</div>
              <div class="text-sm text-slate-600">{{ $banner->description }}</div>
            </div>
          @empty
            <div class="rounded-2xl border border-emerald-100 p-4 text-sm text-slate-600">
              Promo akan segera hadir. Pantau Instagram & TikTok HanaTea ya!
            </div>
          @endforelse
        </div>

        <div class="mt-6 rounded-2xl border border-emerald-100 bg-emerald-50 p-4">
          <div class="font-extrabold text-emerald-900">Rekomendasi Best Seller</div>
          <div class="mt-3 grid gap-2">
            @forelse($bestSellers as $p)
              <div class="flex items-center justify-between rounded-xl bg-white px-3 py-2">
                <div>
                  <div class="text-sm font-extrabold">{{ $p->name }}</div>
                  <div class="text-xs text-slate-500">{{ $p->category }}</div>
                </div>
                <div class="text-sm font-extrabold text-emerald-800">
                  Rp {{ number_format($p->price, 0, ',', '.') }}
                </div>
              </div>
            @empty
              <div class="text-sm text-slate-600">Belum ada data produk.</div>
            @endforelse
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="mx-auto max-w-6xl px-4 pb-14">
  <div class="flex items-end justify-between">
    <div>
      <h2 class="text-2xl font-extrabold">Testimoni Pelanggan</h2>
      <p class="text-slate-600">Biar kamu makin yakin sebelum pesan.</p>
    </div>
    <a class="text-sm font-extrabold text-emerald-800 hover:text-emerald-900" href="{{ route('public.testimonials') }}">
      Lihat semua →
    </a>
  </div>

  <div class="mt-6 grid gap-4 md:grid-cols-3">
    @forelse($testimonials as $t)
      <div class="rounded-2xl border border-emerald-100 bg-white p-5 shadow-sm hover:shadow-md transition">
        <div class="flex items-center justify-between">
          <div class="font-extrabold">{{ $t->customer_name }}</div>
          <div class="text-sm font-extrabold text-emerald-800">★ {{ $t->rating }}/5</div>
        </div>
        <p class="mt-3 text-sm text-slate-600">{{ $t->message }}</p>
      </div>
    @empty
      <div class="rounded-2xl border border-emerald-100 bg-white p-5 text-sm text-slate-600">
        Testimoni akan muncul di sini setelah admin menambahkannya.
      </div>
    @endforelse
  </div>
</section>
@endsection