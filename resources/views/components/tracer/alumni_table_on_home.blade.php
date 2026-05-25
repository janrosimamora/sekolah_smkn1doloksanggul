@php
    /** @var \Illuminate\Pagination\LengthAwarePaginator $tracers */
@endphp

<section id="tracer-alumni" class="py-24 bg-green-50">
    <div class="max-w-4xl mx-auto px-4">
        <h2 class="text-4xl font-bold text-gray-800 mb-12 text-center">Tracer Alumni</h2>
        <p class="text-lg text-gray-600 text-center mb-16">Lihat data alumni tracer study untuk akreditasi sekolah.</p>

        @include('components.tracer.alumni_table', ['tracers' => $tracers])
    </div>
</section>


