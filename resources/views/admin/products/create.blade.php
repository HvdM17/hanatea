@extends('layouts.admin', ['title' => 'Tambah Produk - HanaTea'])

@section('content')
  <div>
    <h1 class="text-2xl font-extrabold">Tambah Produk</h1>
    <p class="text-slate-600">Masukkan data menu baru untuk etalase HanaTea.</p>
  </div>

  <div class="mt-6 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
    <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
      @include('admin.products._form')
    </form>
  </div>
@endsection