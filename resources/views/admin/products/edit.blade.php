@extends('admin.layout.main')
@section('content')
<h2>Edit Product (Admin)</h2>
<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf @method('PUT')
    @include('shared.product_form', ['product' => $product])
</form>
@endsection