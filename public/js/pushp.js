
document.querySelectorAll('.add-to-cart').forEach(button => {
    button.addEventListener('click', function(e) {
        e.preventDefault();

        const productId = this.dataset.id;

        fetch(`/add-to-cart/${productId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({})
        })
        .then(res => res.json())
        .then(data => {
            Swal.fire({
                icon: 'success',
                title: data.message || 'Added to Cart!',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1000,
                timerProgressBar: true,
            });

            // Update cart count
            const cartCount = document.querySelector('.cart-count');
            if (cartCount) {
                cartCount.innerText = data.cart_count;
            } else {
                const span = document.createElement('span');
                span.className = 'cart-count badge bg-danger position-absolute top-0 start-100 translate-middle rounded-pill';
                span.innerText = data.cart_count;
                document.querySelector('.cart-item')?.appendChild(span);
            }
        })
        .catch(err => {
            console.error('Add to cart error:', err);
            Swal.fire({
                icon: 'error',
                title: 'Failed to add to cart!',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1000,
                timerProgressBar: true,
            });
        });
    });
});

