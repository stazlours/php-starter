@extends('layouts.app')

@section('content')

<div class="min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-xl shadow-lg">
        <h1 class="text-3xl font-bold text-indigo-600">
            🚀 Tailwind 3.4 fonctionne !
        </h1>
            <h2 class="text-2xl text-orange-600 font-light">{{ $title }}</h2>
           <p>Bonjour {{ $name }}</p>
        <p class="mt-4 text-gray-600">
            Stone Starter est prêt 🔥
        </p>

<ul>
@foreach($items as $item)
    @if($item['status'] == 'actif')
        <li>{{ $item['name'] }} - actif</li>
    @else
        <li>{{ $item['name'] }} - inactif</li>
    @endif
@endforeach
</ul>

@include('partials.footer')
    </div>

</div>
@endsection


