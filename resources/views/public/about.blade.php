@extends('layouts.public', ['title' => 'Tentang HanaTea'])

@section('content')
<section class="mx-auto max-w-6xl px-4 py-12">
  <div class="rounded-3xl border border-emerald-100 bg-white p-8 shadow-sm">
    <h1 class="text-3xl font-extrabold">Tentang HanaTea</h1>
    <p class="mt-3 text-slate-600">
      HanaTea adalah UMKM minuman kekinian yang baru berdiri. Kami fokus menghadirkan minuman segar, enak, dan murah
      untuk pelajar dan mahasiswa.
    </p>

    <div class="mt-8 grid gap-5 md:grid-cols-2">
      <div class="rounded-2xl border border-emerald-100 bg-emerald-50 p-6">
        <div class="text-sm font-extrabold text-emerald-900">Cerita Singkat!</div>
        <p class="mt-2 text-sm text-slate-700">
          {{ $setting->about ?? 'Berawal dari keinginan menghadirkan minuman segar yang bisa dinikmati setiap hari tanpa bikin kantong kaget.' }}
        </p>
      </div>

      <div class="rounded-2xl border border-emerald-100 p-6">
        <div class="text-sm font-extrabold">Visi</div>
        <p class="mt-2 text-sm text-slate-600">
          Menjadi pilihan minuman segar terfavorit di sekitar sekolah/kampus dengan harga terjangkau.
        </p>

        <div class="mt-5 text-sm font-extrabold">Misi</div>
        <ul class="mt-2 list-disc pl-5 text-sm text-slate-600">
          <li>Menjaga kualitas rasa dan kebersihan.</li>
          <li>Memberikan pelayanan cepat dan ramah.</li>
          <li>Menyediakan menu yang fresh dan mudah dipilih.</li>
        </ul>
      </div>
    </div>
  </div>
</section>
@endsection