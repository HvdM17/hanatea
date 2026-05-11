@extends('layouts.public', ['title' => 'Testimoni - HanaTea'])

@section('content')
<section class="mx-auto max-w-6xl px-4 py-12">
  <div class="flex items-end justify-between gap-4">
    <div>
      <h1 class="text-3xl font-extrabold">Testimoni Pelanggan</h1>
      <p class="mt-2 text-slate-600">Cerita nyata dari pelanggan HanaTea.</p>
    </div>
    <a class="text-sm font-extrabold text-emerald-800 hover:text-emerald-900" href="{{ route('public.menu') }}">
      Lihat Menu →
    </a>
  </div>

  <div class="mt-7 grid gap-4 md:grid-cols-3">
    @forelse($testimonials as $t)
      <div class="rounded-2xl border border-emerald-100 bg-white p-5 shadow-sm hover:shadow-md transition">
        <div class="flex items-center justify-between">
          <div class="font-extrabold">{{ $t->customer_name }}</div>
          <div class="text-sm font-extrabold text-emerald-800">★ {{ $t->rating }}/5</div>
        </div>
        <p class="mt-3 text-sm text-slate-600">{{ $t->message }}</p>
      </div>
    @empty
      <div class="rounded-2xl border border-emerald-100 bg-white p-6 text-sm text-slate-600">
        Belum ada testimoni.
      </div>
    @endforelse
  </div>

  <div class="mt-8">{{ $testimonials->links() }}</div>
</section>
@endsection