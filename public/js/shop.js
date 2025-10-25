// ==================== COUNTDOWN TIMER ====================
const targetDate = new Date("2025-12-31T23:59:59").getTime();
const countdown = setInterval(() => {
    const now = new Date().getTime();
    const distance = targetDate - now;

    if (distance <= 0) {
        clearInterval(countdown);
        ["day", "hour", "minute", "second"].forEach(id => document.getElementById(id).innerText = "0");
        alert("🎉 Countdown Finished!");
        return;
    }

    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("day").innerText = days;
    document.getElementById("hour").innerText = hours;
    document.getElementById("minute").innerText = minutes;
    document.getElementById("second").innerText = seconds;
}, 1000);

// ==================== WISHLIST FUNCTIONS ====================
function addToWishlist(productId) {
    $.ajax({
        url: "/wishlist/add",
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            product_id: productId
        },
        success: function (res) {
            const icon = $('#wishlist-btn-' + productId).find('i');

            if (res.status === 'added') {
                icon.removeClass('text-secondary').addClass('text-danger');
                updateWishlistCount();
                Swal.fire({ icon: 'success', title: 'Added!', text: res.message, timer: 2000, showConfirmButton: false });
            } else if (res.status === 'exists') {
                icon.removeClass('text-secondary').addClass('text-danger');
                Swal.fire({ icon: 'info', title: 'Already Added', text: res.message, timer: 2000, showConfirmButton: false });
            }
        },
        error: handleAjaxError
    });
}

function updateWishlistCount() {
    $.get("/wishlist/count", function (res) {
        $('#wishlist-count').text(res.count);
        res.count > 0 ? $('#wishlist-count').show() : $('#wishlist-count').hide();
    });
}

// ==================== CART FUNCTIONS ====================
function addToCart(productId) {
    $.ajax({
        url: "/cart/add",
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            product_id: productId
        },
        success: function (res) {
            const icon = $('#cart-btn-' + productId).find('i');

            if (res.status === 'added') {
                icon.removeClass('text-dark').addClass('text-success');
                updateCartCount();
                Swal.fire({ icon: 'success', title: 'Added to Cart!', text: res.message, timer: 2000, showConfirmButton: false });
            } else if (res.status === 'exists') {
                icon.removeClass('text-dark').addClass('text-success');
                Swal.fire({ icon: 'info', title: 'Already in Cart', text: res.message, timer: 2000, showConfirmButton: false });
            }
        },
        error: handleAjaxError
    });
}

function updateCartCount() {
    $.get("/cart/count", function (res) {
        $('#cart-count').text(res.count);
        res.count > 0 ? $('#cart-count').show() : $('#cart-count').hide();
    });
}

// ==================== COMMON AJAX ERROR HANDLER ====================
function handleAjaxError(xhr) {
    let message = 'Something went wrong!';
    if (xhr.status === 419) message = 'Session expired. Please refresh the page.';
    else if (xhr.status === 404) message = 'Route not found.';
    else if (xhr.status === 500) message = 'Server error occurred.';
    Swal.fire({ icon: 'error', title: 'Oops...', text: message });
}

// ==================== INITIALIZE ON PAGE LOAD ====================
$(document).ready(function () {
    updateWishlistCount();
    updateCartCount();

    // Load existing wishlist items
    $.get("/wishlist/items", function (res) {
        if (res.wishlist_items && res.wishlist_items.length > 0) {
            res.wishlist_items.forEach(id => {
                $('#wishlist-btn-' + id).find('i')
                    .removeClass('text-secondary')
                    .addClass('text-danger');
            });
        }
    });

    // Load existing cart items
    $.get("/cart/items", function (res) {
        if (res.cart_items && res.cart_items.length > 0) {
            res.cart_items.forEach(id => {
                $('#cart-btn-' + id).find('i')
                    .removeClass('text-dark')
                    .addClass('text-success');
            });
        }
    });
});
