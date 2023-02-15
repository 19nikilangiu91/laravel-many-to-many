@extends('layouts.main-layout')

@section('content')
<div class="container">
    <h1>Products</h1>
    <ul>
        @foreach ($products as $product)
            @include('components.product.productElem')
        @endforeach
    </ul>
</div>
@endsection