//  add to cart js 
 document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();

            const productId = this.getAttribute('data-id');

            fetch(`/user/add-to-cart/${productId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .getAttribute('content')
                    },
                    body: JSON.stringify({})
                })
                .then(response => {
                    if (!response.ok) throw new Error("Network error");
                    return response.json();
                })
                .then(data => {
                    // ✅ Show success popup using SweetAlert2
                    Swal.fire({
                        icon: 'primary',
                        title: data.success || 'Added to Cart!',
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 1000,
                        timerProgressBar: true,
                    });

                    // ✅ Update cart count
                    if (data.cart_count !== undefined) {
                        const cartCountSpan = document.querySelector('.cart-count');
                        if (cartCountSpan) {
                            cartCountSpan.innerText = data.cart_count;
                        } else {
                            const newBadge = document.createElement('span');
                            newBadge.className =
                                'cart-count badge bg-danger position-absolute top-0 start-100 translate-middle rounded-pill';
                            newBadge.innerText = data.cart_count;
                            document.querySelector('.cart-item').appendChild(newBadge);
                        }
                    }
                })
                .catch(error => {
                    console.error('Error adding to cart:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong. Please try again.',
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 1000
                    });
                });
        });
    });

    // cart page js
   
      function updateCart(id, quantity) {
        fetch("{{ route('cart.update') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ id, quantity })
        })
        .then(res => res.json())
        .then(data => {
            if (data.item_total !== undefined && data.cart_total !== undefined) {
                // Update item subtotal
                const itemTotalElement = document.getElementById(`item-total-${id}`);
                if (itemTotalElement) {
                    itemTotalElement.innerText = `₹${parseFloat(data.item_total).toFixed(2)}`;
                }

                // Update cart total
                const cartTotalElement = document.getElementById('cart-total');
                if (cartTotalElement) {
                    cartTotalElement.innerText = `₹${parseFloat(data.cart_total).toFixed(2)}`;
                }
            }
        })
        .catch(err => console.error('Update failed:', err));
    }

    // Decrease button
    document.querySelectorAll('.btn-decrease').forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');
            const quantitySpan = document.getElementById(`quantity-${id}`);
            let quantity = parseInt(quantitySpan.innerText);

            if (quantity > 1) {
                quantity--;
                quantitySpan.innerText = quantity;
                updateCart(id, quantity);
            }
        });
    });

    // Increase button
    document.querySelectorAll('.btn-increase').forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');
            const quantitySpan = document.getElementById(`quantity-${id}`);
            let quantity = parseInt(quantitySpan.innerText);

            quantity++;
            quantitySpan.innerText = quantity;
            updateCart(id, quantity);
        });
    });

// watchlist js
 document.addEventListener('DOMContentLoaded', function () {
        updateWatchlistBadge();

        document.querySelectorAll('.add-to-watchlist').forEach(function (btn) {
            btn.addEventListener('click', function (e) {
                e.preventDefault();
                const productId = this.getAttribute('data-id');

                fetch(`/watchlist/add/${productId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({})
                })
                .then(response => response.json())
                .then(data => {
                    // Update heart color
                    const heartIcon = document.getElementById('heart-icon-' + productId);
                    heartIcon.classList.add('added');

                    // Update badge
                    updateWatchlistBadge();

                    alert(data.message);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });
        });
    });

    function updateWatchlistBadge() {
        fetch('/watchlist/count')
            .then(response => response.json())
            .then(data => {
                document.getElementById('watchlist-badge').textContent = `Watchlist (${data.count})`;
            });
    }
