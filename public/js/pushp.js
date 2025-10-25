
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



document.addEventListener("DOMContentLoaded", function() {
    const viewport = document.querySelector(".slider-viewport");
    const track = document.getElementById("sliderTrack");
    const items = Array.from(track.children);

    if (items.length === 0) return;

    // Duplicate items until track width >= viewport width * 2 (smooth looping)
    function duplicateItems() {
        const viewportWidth = viewport.offsetWidth;
        let trackWidth = track.scrollWidth;
        let count = 0;
        while (trackWidth < viewportWidth * 2 && count < 10) {
            items.forEach(item => track.appendChild(item.cloneNode(true)));
            trackWidth = track.scrollWidth;
            count++;
        }
    }

    duplicateItems();

    // Calculate width of one full set
    const originalWidth = items.reduce((total, el) => total + el.offsetWidth + 16, 0); // +gap

    // Animation speed (lower = faster)
    const speed = 60; // pixels per second
    const duration = originalWidth / speed;
    const animationName = "scrollLeft_" + Math.floor(Math.random() * 100000);

    // Create keyframes dynamically
    const style = document.createElement("style");
    style.innerHTML = `
      @keyframes ${animationName} {
        0% { transform: translateX(0); }
        100% { transform: translateX(-${originalWidth}px); }
      }
    `;
    document.head.appendChild(style);

    // Apply animation
    track.style.animation = `${animationName} ${duration}s linear infinite`;

    // Hover → pause | mouseleave → resume
    viewport.addEventListener("mouseenter", () => {
        track.style.animationPlayState = "paused";
    });

    viewport.addEventListener("mouseleave", () => {
        track.style.animationPlayState = "running";
    });
});

//chatbot

document.getElementById('chatbot-toggle').addEventListener('click', () => {
  document.getElementById('chatbot-box').classList.add('active');
});

document.getElementById('chatbot-close').addEventListener('click', () => {
  document.getElementById('chatbot-box').classList.remove('active');
});

document.getElementById('chatbot-send').addEventListener('click', sendChatMessage);
document.getElementById('chatbot-input-field').addEventListener('keypress', e => {
  if (e.key === 'Enter') sendChatMessage();
});

function appendMessage(sender, text) {
  const container = document.getElementById('chatbot-messages');
  const msg = document.createElement('div');
  msg.classList.add('chatbot-message', sender);
  msg.textContent = text;
  container.appendChild(msg);
  container.scrollTop = container.scrollHeight;
}

function sendChatMessage() {
  const input = document.getElementById('chatbot-input-field');
  const message = input.value.trim();
  if (!message) return;

  appendMessage('user', message);
  input.value = '';

  appendMessage('bot', 'Typing...');

  fetch('/chatbot', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': '{{ csrf_token() }}'
    },
    body: JSON.stringify({ message })
  })
  .then(res => res.json())
  .then(data => {
    document.querySelectorAll('.chatbot-message.bot').forEach(msg => {
      if (msg.textContent === 'Typing...') msg.remove();
    });
    appendMessage('bot', data.reply);
  })
  .catch(() => {
    appendMessage('bot', 'Error connecting to chatbot. Please try again.');
  });
}


