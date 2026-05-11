@extends('layouts.admin', ['title' => 'Edit Banner - HanaTea'])

@section('content')
  <div>
    <h1 class="text-2xl font-extrabold">Edit Banner</h1>
    <p class="text-slate-600">Perbarui judul, deskripsi, gambar, atau status banner.</p>
  </div>

  <div class="mt-6 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
    <form method="POST" action="{{ route('admin.banners.update', $banner) }}" enctype="multipart/form-data">
      @include('admin.banners._form', ['banner' => $banner])
    </form>
  </div>
@endsection