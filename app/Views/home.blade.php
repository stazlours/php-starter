@extends('layouts.app')

@section('content')
<h2>{{ $title }}</h2>

<p>Bonjour {{ $name }}</p>

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
@endsection


