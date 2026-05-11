@php
  $wa = optional($setting ?? null)->whatsapp ?? null;
  $waNumber = $wa ? preg_replace('/\D+/', '', $wa) : null;
  $waLink = $waNumber ? ('https://wa.me/'.$waNumber.'?text='.urlencode('Halo HanaTea, saya mau pesan.')) : null;
@endphp

@if($waLink)
<a href="{{ $waLink }}" target="_blank"
   class="fixed bottom-5 right-5 z-50 rounded-full bg-emerald-700 px-5 py-3 text-sm font-semibold text-white shadow-lg hover:bg-emerald-800">
  Pesan via WhatsApp
</a>
@endif