@extends('admin.layout.main')
@section('content')
<h2>Pending Vendor Products</h2>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <th>{{$product->id}}</th>
            <td>{{ $product->name }}</td>
            <td>₹{{ $product->price }}</td>
            <td>
                <form method="POST" action="{{ route('admin.products.approve', $product->id) }}">
                    @csrf
                    <button class="btn btn-sm btn-success">Approve</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection