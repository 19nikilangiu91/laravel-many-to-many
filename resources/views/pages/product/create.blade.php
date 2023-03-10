@extends('layouts.main-layout')

@section('content')
{{-- 17) Creao il form per "Creare un nuovo Prodotto" --}}
<div class="container">
    <h1>Create New Product</h1>
    <form action="{{route('product.store')}}" method="POST">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name">
        <br>
        <label for="description">Description</label>
        <input type="text" name="description">
        <br>
        <label for="price">Price</label>
        <input type="number" name="price">
        <br>
        <label for="weight">Weight</label>
        <input type="number" name="weight">
        <br>
        {{-- 22b) Creo un foreach per stampare le tipologie e nella value inserisco la chiave primaria --}}
        <h3>Typology</h3>
        <select name="typology_id">
            @foreach ($typologies as $typology)
                <option value="{{ $typology -> id }}">{{ $typology -> name }}</option>    
            @endforeach
        </select>
        <br>
        <h3>Categories</h3>
        {{-- 25b) Creo un foreach per stampare le categorie e nella value inserisco la chiave primaria --}}
        @foreach ($categories as $category)
            <input type="checkbox" name="categories[]" value={{ $category -> id }}>
            <label for="categories">{{ $category -> name }}</label>
            <br>            
        @endforeach
        <br>
        <input type="submit" value="Create New Product">
    </form>
</div>
@endsection