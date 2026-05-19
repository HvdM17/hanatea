@csrf
@if(isset($product)) @method('PUT') @endif

<div class="grid gap-5 md:grid-cols-2">
  <div class="md:col-span-2">
    <label class="text-sm font-bold">Nama Produk</label>
    <input name="name" value="{{ old('name', $product->name ?? '') }}"
           class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-200"
           placeholder="Contoh: Jasmine Tea">
  </div>

  <div>
    <label class="text-sm font-bold">Kategori</label>
    @php 
      $selectedCategory = old('category', $product->category ?? ''); 
    @endphp
    <select name="category" 
            class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-200 bg-white">
      <option value="" disabled @selected($selectedCategory == '')>-- Pilih Kategori --</option>
      <option value="Tea" @selected($selectedCategory == 'Tea')>Tea</option>
      <option value="Yakult" @selected($selectedCategory == 'Yakult')>Yakult</option>
      <option value="Cendol" @selected($selectedCategory == 'Cendol')>Cendol</option>
    </select>
  </div>

  <div>
    <label class="text-sm font-bold">Harga (Rp)</label>
    <input type="number" name="price" value="{{ old('price', $product->price ?? '') }}"
           class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-200"
           placeholder="Contoh: 5000">
  </div>

  <div class="md:col-span-2">
    <label class="text-sm font-bold">Deskripsi</label>
    <textarea name="description" rows="4"
              class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-200"
              placeholder="Deskripsi singkat yang menarik...">{{ old('description', $product->description ?? '') }}</textarea>
  </div>

  @if(isset($product))
  <div class="md:col-span-2">
    <label class="text-sm font-bold">Slug</label>
    <input name="slug" value="{{ old('slug', $product->slug ?? '') }}"
           class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-200">
    <div class="mt-1 text-xs text-slate-500">Boleh diedit untuk SEO yang rapi.</div>
  </div>
  @endif

  <div>
    <label class="text-sm font-bold">Status</label>
    @php $st = old('status', isset($product) ? (int)$product->status : 1); @endphp
    <select name="status" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3">
      <option value="1" @selected($st===1)>Tersedia</option>
      <option value="0" @selected($st===0)>Tidak tersedia</option>
    </select>
  </div>

  <div>
    <label class="text-sm font-bold">Foto Produk</label>
    <input type="file" name="image"
           class="mt-2 w-full rounded-xl border border-slate-200 bg-white px-4 py-3">
    @if(isset($product) && $product->image)
      <div class="mt-3 flex items-center gap-3">
        <img src="{{ asset('assets/'.$product->image) }}" class="h-14 w-14 rounded-xl object-cover" alt="">
        <div class="text-xs text-slate-500">Gambar saat ini</div>
      </div>
    @endif
  </div>
</div>

<div class="mt-6 flex flex-wrap gap-3">
  <button class="rounded-xl bg-emerald-700 px-5 py-3 text-sm font-extrabold text-white shadow hover:bg-emerald-800">
    Simpan
  </button>
  <a href="{{ route('admin.products.index') }}"
     class="rounded-xl border border-slate-200 px-5 py-3 text-sm font-extrabold hover:bg-slate-50">
    Batal
  </a>
</div>