@extends('frontend.layout.main')
@section('content')
<main class="main-content">
    <!--------------- blog-tittle-section---------------->
    <section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="{{ route('index')}}">Home</a></span>
                <span class="devider">/</span>
                <span><a href="#">Cart</a></span>
            </div>
            <div class="blog-heading about-heading">
                <h1 class="heading">Cart</h1>
            </div>
        </div>
    </section>
    <!--------------- blog-tittle-section-end---------------->


    @php $cart = session('cart', []); @endphp
    @foreach($cart as $id => $item)
    <tr class="table-row ticket-row">
        <td class="table-wrapper wrapper-product">
            <div class="wrapper">
                <div class="wrapper-img">
                    <img src="{{ asset('uploads/' . $item['image']) }}" alt="img">
                </div>
                <div class="wrapper-content">
                    <h5 class="heading">{{ $item['name'] }}</h5>
                </div>
            </div>
        </td>
        <td class="table-wrapper">
            <div class="table-wrapper-center">
                <h5 class="heading">${{ number_format($item['price'], 2) }}</h5>
            </div>
        </td>
        <td class="table-wrapper">
            <div class="table-wrapper-center">
                <form action="{{ route('cart.update', $id) }}" method="POST">
                    @csrf
                    <div class="quantity">
                        <button type="submit" name="action" value="decrease">-</button>
                        <span class="number">{{ $item['quantity'] }}</span>
                        <button type="submit" name="action" value="increase">+</button>
                    </div>
                </form>
            </div>
        </td>
        <td class="table-wrapper wrapper-total">
            <div class="table-wrapper-center">
                <h5 class="heading">${{ number_format($item['price'] * $item['quantity'], 2) }}</h5>
            </div>
        </td>
        <td class="table-wrapper">
            <div class="table-wrapper-center">
                <form action="{{ route('cart.remove', $id) }}" method="POST">
                    @csrf
                    <button type="submit">
                        <i class="fas fa-times text-gray-400"> clear</i>
                    </button>
                </form>
            </div>
        </td>
    </tr>


    @endforeach


</main>
@endsection