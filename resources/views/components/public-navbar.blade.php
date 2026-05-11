<nav class="sticky top-0 z-50 border-b border-emerald-100 bg-white/80 backdrop-blur">
  <div class="mx-auto flex max-w-6xl items-center justify-between px-4 py-3">
    <a href="{{ route('public.home') }}" class="flex items-center gap-2">
      <img src="{{ asset('assets/logo-hanatea.png') }}"
      alt="Logo HanaTea"
      class="h-12 w-12 rounded-xl object-contain bg-white p-1 border border-emerald-100">
      <div>
        <div class="font-semibold leading-4">HanaTea</div>
        <div class="text-xs text-emerald-700">Kesegaran di setiap tegukan</div>
      </div>
    </a>
    <div class="flex items-center gap-6">
    <div class="hidden gap-6 md:flex text-sm font-semibold">
      <a class="hover:text-emerald-700" href="{{ route('public.about') }}">Tentang</a>
      <a class="hover:text-emerald-700" href="{{ route('public.menu') }}">Menu</a>
      <a class="hover:text-emerald-700" href="{{ route('public.testimonials') }}">Testimoni</a>
      <a class="hover:text-emerald-700" href="{{ route('public.faq') }}">FAQ</a>
      <a class="hover:text-emerald-700" href="{{ route('public.contact') }}">Kontak</a>
    </div>

    <div class="flex items-center gap-2">
      <a href="{{ route('public.menu') }}"
         class="rounded-xl bg-emerald-700 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-emerald-800">
        Lihat Menu
      </a>
      @auth
        @if(auth()->user()->role === 'admin')
          <a href="{{ route('admin.dashboard') }}"
             class="hidden sm:inline-flex rounded-xl border border-emerald-200 px-4 py-2 text-sm font-semibold text-emerald-900 hover:bg-emerald-50">
            Admin
          </a>
        @endif
      @endauth
    </div>
  </div>
</nav>