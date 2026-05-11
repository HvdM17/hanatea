@extends('layouts.public', ['title' => 'Menu HanaTea'])

@section('content')
<section class="mx-auto max-w-6xl px-4 py-10">
  <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
    <div>
      <h1 class="text-2xl font-extrabold">Menu HanaTea</h1>
      <p class="text-slate-600">Cari menu favoritmu disini.</p>
    </div>

    <form class="flex flex-col gap-2 md:flex-row md:gap-3">
      <input name="q" value="{{ $q }}"
             class="w-full md:w-72 rounded-xl border border-emerald-200 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-emerald-200"
             placeholder="Cari menu...">
      <select name="category"
              class="w-full md:w-56 rounded-xl border border-emerald-200 px-4 py-2">
        <option value="">Semua kategori</option>
        @foreach($categories as $c)
          <option value="{{ $c }}" @selected($category===$c)>{{ $c }}</option>
        @endforeach
      </select>
      <button class="rounded-xl bg-emerald-700 px-4 py-2 font-extrabold text-white hover:bg-emerald-800">
        Cari
      </button>
    </form>
  </div>

  <div class="mt-7 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
    @forelse($products as $p)
      <div class="group rounded-2xl border border-emerald-100 bg-white p-4 shadow-sm hover:shadow-md transition">
        <div class="aspect-[4/3] overflow-hidden rounded-xl bg-emerald-50">
          @if($p->image)
            <img class="h-full w-full object-cover group-hover:scale-[1.03] transition"
                 src="{{ asset('assets/'.$p->image) }}" alt="{{ $p->name }}">
          @else
            <div class="h-full w-full grid place-content-center text-emerald-800 font-extrabold">HanaTea</div>
          @endif
        </div>

        <div class="mt-4 flex items-start justify-between gap-3">
          <div>
            <div class="font-extrabold">{{ $p->name }}</div>
            <div class="text-sm text-slate-600">{{ $p->category }}</div>
          </div>

          <div class="text-right">
            <div class="font-extrabold text-emerald-800">Rp {{ number_format($p->price, 0, ',', '.') }}</div>
          </div>
        </div>

        <div class="mt-3 flex items-center justify-between">
          <div class="text-sm font-bold {{ $p->status ? 'text-emerald-700' : 'text-rose-600' }}">
            {{ $p->status ? 'Tersedia' : 'Tidak tersedia' }}
          </div>
          <a class="text-sm font-extrabold text-emerald-800 hover:text-emerald-900"
             href="{{ route('public.contact') }}">
            Pesan →
          </a>
        </div>
      </div>
    @empty
      <div class="rounded-2xl border border-emerald-100 bg-white p-6 text-sm text-slate-600">
        Belum ada produk. Admin bisa menambahkannya dari dashboard.
      </div>
    @endforelse
  </div>

  <div class="mt-8">
    {{ $products->links() }}
  </div>
</section>
@endsection