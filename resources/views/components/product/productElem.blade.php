<li class="m-3">
    <div>
        <h5 class="d-inline">Code: </h5>{{ $product -> code }}<br>
        <h5 class="d-inline">Product: </h5>{{ $product -> name }}<br>
        <h5 class="d-inline">Typology: </h5> {{ $product -> typology -> name }}<br>
        <h5 class="d-inline">Digital: </h5>{{ $product -> typology -> digital ? "YES" : "NO" }}<br>
    </div>
    <a href="{{ route('product.delete', $product) }}">Delete</a> - 
    <a href="{{ route('product.edit', $product) }}">Edit</a>
</li>