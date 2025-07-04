@extends('admin.layout.main')
@section('content')
<h3>Add Product (Admin)</h3>
@include('products.form', [
'action' => route('products.store'),
'product' => null,
'categories' => $categories
])
@endsection