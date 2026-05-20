@csrf
@if(isset($banner)) @method('PUT') @endif

<div class="grid gap-5 md:grid-cols-2">
  <div class="md:col-span-2">
    <label class="text-sm font-bold">Judul Banner</label>
    <input name="title" value="{{ old('title', $banner->title ?? '') }}"
           class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-200"
           placeholder="Contoh: Promo Opening! Beli 2 Lebih Hemat">
  </div>

  <div class="md:col-span-2">
    <label class="text-sm font-bold">Deskripsi</label>
    <textarea name="description" rows="4"
              class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-200"
              placeholder="Copywriting promo singkat...">{{ old('description', $banner->description ?? '') }}</textarea>
  </div>

  <div>
    <label class="text-sm font-bold">Status</label>
    @php $act = old('is_active', isset($banner) ? (int)$banner->is_active : 1); @endphp
    <select name="is_active" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3">
      <option value="1" @selected($act===1)>Aktif</option>
      <option value="0" @selected($act===0)>Nonaktif</option>
    </select>
  </div>

  <div>
    <label class="text-sm font-bold">Gambar Banner</label>
    <input type="file" name="image"
           class="mt-2 w-full rounded-xl border border-slate-200 bg-white px-4 py-3">
    @if(isset($banner) && $banner->image)
      <div class="mt-3 flex items-center gap-3">
        <img src="{{ asset('storage/'.$banner->image) }}" class="h-14 w-14 rounded-xl object-cover" alt="">
        <div class="text-xs text-slate-500">Gambar saat ini</div>
      </div>
    @endif
  </div>
</div>

<div class="mt-6 flex flex-wrap gap-3">
  <button class="rounded-xl bg-emerald-700 px-5 py-3 text-sm font-extrabold text-white shadow hover:bg-emerald-800">
    Simpan
  </button>
  <a href="{{ route('admin.banners.index') }}"
     class="rounded-xl border border-slate-200 px-5 py-3 text-sm font-extrabold hover:bg-slate-50">
    Batal
  </a>
</div>