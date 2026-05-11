@extends('layouts.admin', ['title' => 'Tambah Banner - HanaTea'])

@section('content')
  <div>
    <h1 class="text-2xl font-extrabold">Tambah Banner</h1>
    <p class="text-slate-600">Buat promo singkat agar landing page terlihat aktif.</p>
  </div>

  <div class="mt-6 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
    <form method="POST" action="{{ route('admin.banners.store') }}" enctype="multipart/form-data">
      @include('admin.banners._form')
    </form>
  </div>
@endsection