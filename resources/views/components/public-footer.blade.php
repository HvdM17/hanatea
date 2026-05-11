<footer class="border-t border-white-100 bg-emerald-50">
  <div class="mx-auto max-w-6xl px-4 py-4">
    <div class="flex flex-col gap-8 md:flex-row md:items-start md:justify-between md:gap-10">

      <!-- Kiri: Brand -->
      <div class="flex max-w-xl flex-col gap-4 text-center md:text-left">
        <div class="flex items-center justify-center gap-3 md:justify-start">
        <img src="{{ asset('assets/logo-hanatea.png') }}"
        alt="Logo HanaTea"
        class="h-12 w-12 rounded-xl object-contain bg-white p-1 border border-emerald-100">

          <div class="text-left">
            <div class="text-lg font-extrabold leading-tight">HanaTea</div>
            <div class="text-sm font-semibold text-emerald-700">Kesegaran di setiap tegukan</div>
          </div>
        </div>

        <p class="text-sm leading-relaxed text-slate-600 md:pr-6">
          Minuman segar, harga ramah, cocok buat pelajar &amp; mahasiswa!
        </p>
      </div>

      <!-- Kanan: Copyright -->
      <div class="flex flex-col items-center justify-center text-center md:items-end md:text-right">
        <div class="hidden h-px w-full max-w-xs bg-emerald-100 md:block md:max-w-none" aria-hidden="true"></div>
        <p class="mt-0 max-w-sm text-xs leading-relaxed text-slate-500 md:mt-6 md:max-w-xs">
          © {{ date('Y') }} HanaTea. Website promosi &amp; manajemen UMKM berbasis Laravel.
        </p>
      </div>
    </div>
  </div>
</footer>