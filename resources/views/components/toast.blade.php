@if(session('success'))
  <div class="mx-auto max-w-6xl px-4 pt-4">
    <div class="rounded-2xl border border-emerald-100 bg-emerald-50 px-4 py-3 text-emerald-900 shadow-sm">
      <div class="font-semibold">Berhasil</div>
      <div class="text-sm">{{ session('success') }}</div>
    </div>
  </div>
@endif

@if($errors->any())
  <div class="mx-auto max-w-6xl px-4 pt-4">
    <div class="rounded-2xl border border-rose-100 bg-rose-50 px-4 py-3 text-rose-900 shadow-sm">
      <div class="font-semibold">Periksa lagi</div>
      <ul class="mt-2 list-disc pl-5 text-sm">
        @foreach($errors->all() as $e)
          <li>{{ $e }}</li>
        @endforeach
      </ul>
    </div>
  </div>
@endif