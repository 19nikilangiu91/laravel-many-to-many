@extends('layouts.main-layout')

@section('content')
{{-- 17) Creao il form per "Creare un nuovo Prodotto" --}}
<div class="container">
    <h1>Create New Product</h1>
    <form method="POST">
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
        <input type="submit" value="Create New Product">
    </form>
</div>
@endsection