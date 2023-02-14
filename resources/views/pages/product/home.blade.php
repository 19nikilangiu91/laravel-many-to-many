@extends('layouts.main-layout')

@section('content')
    <ul>
        @foreach ($products as $product)
        <li class="m-3">
            <div>
                <h5 class="d-inline">Code: </h5>{{ $product -> code }}<br>
                <h5 class="d-inline">Product: </h5>{{ $product -> name }}<br>
                <h5 class="d-inline">Typology: </h5> {{ $product -> typology -> name }}<br>
                <h5 class="d-inline">Digital: </h5>{{ $product -> typology -> digital ? "YES" : "NO" }}<br>
            </div>
        </li>
        @endforeach
    </ul>
@endsection