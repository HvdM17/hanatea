<header class="border-b border-emerald-200 bg-white">
  <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4">
    <div>
      <div class="text-sm text-slate-500">Login sebagai</div>
      <div class="font-extrabold">{{ auth()->user()->name ?? 'Admin' }}</div>
    </div>

    <div class="flex items-center gap-3">
      <a href="{{ route('public.home') }}"
         class="rounded-xl border border-emerald-200 px-4 py-2 text-sm font-bold hover:bg-slate-50">
        Lihat Website
      </a>

      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="rounded-xl bg-emerald-700 px-4 py-2 text-sm font-extrabold text-white hover:bg-slate-800">
          Logout
        </button>
      </form>
    </div>
  </div>
</header>