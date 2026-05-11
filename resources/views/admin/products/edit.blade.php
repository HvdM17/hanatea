@extends('layouts.admin', ['title' => 'Edit Produk - HanaTea'])

@section('content')
  <div>
    <h1 class="text-2xl font-extrabold">Edit Produk</h1>
    <p class="text-slate-600">Perbarui harga, kategori, deskripsi, atau foto produk.</p>
  </div>

  <div class="mt-6 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
    <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
      @include('admin.products._form', ['product' => $product])
    </form>
  </div>
@endsection