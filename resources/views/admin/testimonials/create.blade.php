@extends('layouts.admin', ['title' => 'Tambah Testimoni - HanaTea'])

@section('content')
  <div>
    <h1 class="text-2xl font-extrabold">Tambah Testimoni</h1>
    <p class="text-slate-600">Masukkan testimoni pelanggan (nama, pesan, rating).</p>
  </div>

  <div class="mt-6 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
    <form method="POST" action="{{ route('admin.testimonials.store') }}">
      @csrf

      <div class="grid gap-5 md:grid-cols-2">
        <div>
          <label class="text-sm font-bold">Nama Pelanggan</label>
          <input name="customer_name" value="{{ old('customer_name') }}"
                 class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-200"
                 placeholder="Contoh: Nadia">
        </div>

        <div>
          <label class="text-sm font-bold">Rating (1–5)</label>
          <input type="number" min="1" max="5" name="rating" value="{{ old('rating', 5) }}"
                 class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-200">
        </div>

        <div class="md:col-span-2">
          <label class="text-sm font-bold">Pesan</label>
          <textarea name="message" rows="4"
                    class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-200"
                    placeholder="Contoh: Enak dan seger banget! Harga pelajar.">{{ old('message') }}</textarea>
        </div>
      </div>

      <div class="mt-6 flex flex-wrap gap-3">
        <button class="rounded-xl bg-emerald-700 px-5 py-3 text-sm font-extrabold text-white shadow hover:bg-emerald-800">
          Simpan
        </button>
        <a href="{{ route('admin.testimonials.index') }}"
           class="rounded-xl border border-slate-200 px-5 py-3 text-sm font-extrabold hover:bg-slate-50">
          Batal
        </a>
      </div>
    </form>
  </div>
@endsection