@extends('app')

@section('content')
    <h1>{{ $country['name']['common'] }}</h1>
    <img src="{{ $country['flags']['svg'] }}" alt="{{ $country['name']['common'] }} flag">
    <p><strong>Region:</strong> {{ $country['region'] }}</p>
    <p><strong>Capital:</strong> {{ $country['capital'][0] ?? 'N/A' }}</p>
    <p><strong>Languages:</strong> {{ implode(', ', $country['languages'] ?? []) }}</p>
    <p><strong>Population:</strong> {{ number_format($country['population']) }}</p>
    <p><strong>Area:</strong> {{ $country['area'] }} km²</p>

    <a href="/countries" class="btn btn-secondary">Back to Country List</a>
@endsection
