@extends('app')

@section('content')
    <h1>Explore All Countries</h1>
    
    <div class="row">
        @foreach ($countries as $country)
            <div class="col-md-3">
                <div class="card">
                    <img src="{{ $country['flags']['svg'] }}" class="card-img-top" alt="{{ $country['name']['common'] }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $country['name']['common'] }}</h5>
                        <a href="/countries/{{ $country['name']['common'] }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
