@extends('frontend.layout.main')
@section('content')
<main class="main-content">
    <!--------------- cart-section---------------->
    <section class="blog about-blog footer-padding">
        <div class="container mb-5">
            <div class="blog-bradcrum">
                <span><a href="{{ route('index')}}">Home</a></span>
                <span class="devider">/</span>
                <span><a href="#">404 Not Found</a></span>
            </div>
            <div class="blog-item" data-aos="fade-up">
                <div class="cart-img">
                    <img src="{{ asset('assets/images/homepage-one/empty-cart.webp') }}" alt="img">
                </div>
                <div class="cart-content">
                    <p class="content-title">Empty! You don’t Cart any Products </p>
                    <a href="{{ route('productall')}}" class="shop-btn">Back to Shop</a>
                </div>
            </div>
        </div>
    </section>
    <!--------------- cart-section-end---------------->

       
<footer class="mobile-footer d-md-none">
    <a href="{{route('index')}}" class="footer-item active">
        <i>🏠</i>
        <span>Home</span>
    </a>

     <a href="#">
        <i>📂</i>
        <span>Categories</span>
    </a> 
 <a href="#" id="openSearchBox">
        <i>🔍</i>
        <span>Search</span>
    </a>


<div id="searchOverlay">
    <div class="search-header">
        <input type="text" id="searchInput" placeholder="Search for products...">
        <button id="closeSearch">✖</button>
    </div>

    <div id="searchResults">
      
    </div>
</div>
 
    <a href="{{ route('wishlist.index') }}" id="openWishlist">
        <i>❤️</i>
        <span>Wishlist</span>
    </a>

   
    <a href="{{ auth()->check() ? route('user.dashboard') : route('login') }}" id="openAccount">
        <i>👤</i>
        <span>Account</span>
    </a>

</footer>
<script>
document.getElementById("openSearchBox").addEventListener("click", function(e) {
    e.preventDefault();
    document.getElementById("searchOverlay").style.display = "block";
    document.getElementById("searchInput").focus();
});

document.getElementById("closeSearch").addEventListener("click", function() {
    document.getElementById("searchOverlay").style.display = "none";
    document.getElementById("searchInput").value = "";
    document.getElementById("searchResults").innerHTML = "";
});

// Live Search (AJAX)
document.getElementById("searchInput").addEventListener("keyup", function() {
    let q = this.value.trim();

    if (q.length < 2) {
        document.getElementById("searchResults").innerHTML = "";
        return;
    }

    fetch(`/search-products?query=${q}`)
        .then(res => res.json())
        .then(data => {
            let html = "";

            if (data.length === 0) {
                html = "<p>No products found</p>";
            } else {
                data.forEach(item => {
                    html += `
                        <div class="p-2 border-bottom">
                            <a href="/product/${item.slug}" class="text-dark">
                                <strong>${item.name}</strong><br>
                                <small>${item.price} ₹</small>
                            </a>
                        </div>`;
                });
            }

            document.getElementById("searchResults").innerHTML = html;
        });
});
</script> 

</main>

@endsection