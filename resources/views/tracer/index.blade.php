@extends('layouts.app')
@section('title', 'Tracer Study Alumni - SMKN 1 Dolok Sanggul')

@section('content')
<div class="py-24 bg-green-50">
    <div class="max-w-4xl mx-auto px-4">
        <h2 class="text-2xl font-bold text-gray-800 mb-8">Data Alumni</h2>
        @include('components.tracer.alumni_table', ['tracers' => $tracers])
    </div>
</div>
@endsection

