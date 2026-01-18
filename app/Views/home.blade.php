@extends('layouts.app')

@section('content')
@include('partials.header')

<div data-animate="fade" class="min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-xl shadow-lg">
        <h1 class="text-3xl font-bold text-indigo-600">
            🚀 STONE Starter
        </h1>

        <p class="mt-4 text-gray-600">
            Stone Starter est prêt 🔥
        </p>
<ul>
</ul>
<!-- Solid icon -->
<i class="fas fa-home text-indigo-600 w-6 h-6"></i>

<!-- Regular icon -->
<i class="far fa-user text-gray-700 w-5 h-5"></i>

<!-- Brand icon -->
<i class="fab fa-github text-gray-800 w-5 h-5"></i>


@include('partials.footer')
    </div>

</div>

@endsection


