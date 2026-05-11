<aside class="w-full border-b border-emerald-200 bg-white md:min-h-screen md:w-72 md:border-b-0 md:border-r">
  <div class="px-5 py-5">
    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
      <div class="h-10 w-10 rounded-2xl bg-emerald-700 text-white grid place-content-center font-extrabold">H</div>
      <div>
        <div class="font-extrabold leading-4">HanaTea</div>
        <div class="text-xs text-emerald-700">Admin Dashboard</div>
      </div>
    </a>
  </div>

  <nav class="px-3 pb-5">
    @php
      $item = fn($active) => $active
        ? 'bg-emerald-50 text-emerald-900 border-emerald-100'
        : 'text-slate-700 hover:bg-slate-50 border-transparent';
    @endphp

    <a class="mb-1 flex items-center justify-between rounded-xl border px-4 py-3 text-sm font-semibold {{ $item(request()->routeIs('admin.dashboard')) }}"
       href="{{ route('admin.dashboard') }}">
      <span>Dashboard</span>
    </a>

    <div class="mt-3 px-4 text-xs font-extrabold uppercase tracking-wider text-slate-400">Manajemen</div>

    <a class="mt-2 flex items-center justify-between rounded-xl border px-4 py-3 text-sm font-semibold {{ $item(request()->routeIs('admin.products.*')) }}"
       href="{{ route('admin.products.index') }}">
      <span>Produk</span>
    </a>

    <a class="mt-2 flex items-center justify-between rounded-xl border px-4 py-3 text-sm font-semibold {{ $item(request()->routeIs('admin.banners.*')) }}"
       href="{{ route('admin.banners.index') }}">
      <span>Banner Promo</span>
    </a>

    <a class="mt-2 flex items-center justify-between rounded-xl border px-4 py-3 text-sm font-semibold {{ $item(request()->routeIs('admin.testimonials.*')) }}"
       href="{{ route('admin.testimonials.index') }}">
      <span>Testimoni</span>
    </a>

    <div class="mt-3 px-4 text-xs font-extrabold uppercase tracking-wider text-slate-400">Pengaturan</div>

    <a class="mt-2 flex items-center justify-between rounded-xl border px-4 py-3 text-sm font-semibold {{ $item(request()->routeIs('admin.settings.*')) }}"
       href="{{ route('admin.settings.edit') }}">
      <span>Profil UMKM</span>
    </a>
  </nav>
</aside>