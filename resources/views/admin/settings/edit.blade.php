@extends('layouts.admin', ['title' => 'Profil UMKM - HanaTea'])

@section('content')
  <div>
    <h1 class="text-2xl font-extrabold">Profil UMKM</h1>
    <p class="text-slate-600">Kelola informasi usaha, sosial media, jam buka, dan QRIS.</p>
  </div>

  <div class="mt-6 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
    <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="grid gap-5 md:grid-cols-2">
        <div>
          <label class="text-sm font-bold">Instagram (URL)</label>
          <input name="instagram" value="{{ old('instagram', $setting->instagram) }}"
                 class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-200"
                 placeholder="https://instagram.com/hanatea">
        </div>

        <div>
          <label class="text-sm font-bold">TikTok (URL)</label>
          <input name="tiktok" value="{{ old('tiktok', $setting->tiktok) }}"
                 class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-200"
                 placeholder="https://tiktok.com/@hanatea">
        </div>

        <div>
          <label class="text-sm font-bold">WhatsApp (nomor)</label>
          <input name="whatsapp" value="{{ old('whatsapp', $setting->whatsapp) }}"
                 class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-200"
                 placeholder="62812xxxxxxx">
          <div class="mt-1 text-xs text-slate-500">Gunakan format internasional tanpa + (contoh: 62812...).</div>
        </div>

        <div>
          <label class="text-sm font-bold">Jam Buka</label>
          <input name="open_hours" value="{{ old('open_hours', $setting->open_hours) }}"
                 class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-200"
                 placeholder="10.00 - 22.00">
        </div>

        <div class="md:col-span-2">
          <label class="text-sm font-bold">Alamat</label>
          <input name="address" value="{{ old('address', $setting->address) }}"
                 class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-200"
                 placeholder="Alamat UMKM">
        </div>

        <div class="md:col-span-2">
          <label class="text-sm font-bold">Tentang Usaha</label>
          <textarea name="about" rows="4"
                    class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-200"
                    placeholder="Cerita singkat HanaTea...">{{ old('about', $setting->about) }}</textarea>
        </div>

        <div class="md:col-span-2">
          <label class="text-sm font-bold">QRIS Image</label>
          <input type="file" name="qris_image"
                 class="mt-2 w-full rounded-xl border border-slate-200 bg-white px-4 py-3">

          @if($setting->qris_image)
            <div class="mt-4 rounded-2xl border border-emerald-100 bg-emerald-50 p-4">
              <div class="text-sm font-extrabold text-emerald-900">QRIS saat ini</div>
              <img class="mt-3 w-full max-w-xs rounded-2xl bg-white p-3 shadow-sm"
                   src="{{ asset('storage/'.$setting->qris_image) }}" alt="QRIS HanaTea">
            </div>
          @endif
        </div>
      </div>

      <div class="mt-6 flex flex-wrap gap-3">
        <button class="rounded-xl bg-emerald-700 px-5 py-3 text-sm font-extrabold text-white shadow hover:bg-emerald-800">
          Simpan Perubahan
        </button>
        <a href="{{ route('admin.dashboard') }}"
           class="rounded-xl border border-slate-200 px-5 py-3 text-sm font-extrabold hover:bg-slate-50">
          Kembali
        </a>
      </div>
    </form>
  </div>
@endsection