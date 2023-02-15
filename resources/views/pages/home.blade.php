@extends('layouts.main-layout')

@section('content')

<div class="container">
    <h1>Products</h1>
    {{-- 16) Aggiungo il link per "Creare un nuovo Prodotto" --}}
    <a href="{{ route('product.create') }}">Create New Product</a>
    @foreach ($categories as $category)
        <h2>{{ $category -> name }}</h2>
        <ul>
            {{-- 15) Facciamo un foreach per stampare i dati --}}
            @foreach ($category -> products as $product)
                @include('components.product.productElem')
            @endforeach
        </ul>
        <hr>
    @endforeach
</div>
@endsection