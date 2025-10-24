<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Chatbot | Lords of Detailing</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
    #chat-widget {
      position: fixed;
      bottom: 20px;
      right: 20px;
      font-family: Arial;
    }
    #chat-box {
      display: none;
      width: 320px;
      height: 420px;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
      overflow: hidden;
      flex-direction: column;
    }
    #chat-header {
      background: #007bff;
      color: white;
      padding: 10px;
      font-weight: bold;
      text-align: center;
    }
    #chat-messages {
      flex: 1;
      padding: 10px;
      overflow-y: auto;
    }
    .msg {
      margin: 5px 0;
      padding: 8px 12px;
      border-radius: 12px;
      max-width: 80%;
    }
    .user { background: #007bff; color: #fff; align-self: flex-end; }
    .bot { background: #f1f1f1; color: #333; align-self: flex-start; }
    #chat-input {
      display: flex;
      border-top: 1px solid #ddd;
    }
    #chat-input input {
      flex: 1;
      border: none;
      padding: 10px;
    }
    #chat-input button {
      background: #007bff;
      border: none;
      color: white;
      padding: 0 15px;
    }
    #chat-toggle {
      background: #007bff;
      color: white;
      border-radius: 50%;
      padding: 12px 15px;
      border: none;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div id="chat-widget">
    <div id="chat-box">
      <div id="chat-header">Lords of Detailing Bot 🤖</div>
      <div id="chat-messages"></div>
      <div id="chat-input">
        <input type="text" id="user-input" placeholder="Type your message..." />
        <button id="send-btn">Send</button>
      </div>
    </div>
    <button id="chat-toggle">💬</button>
  </div>

  <script>
    document.getElementById('chat-toggle').addEventListener('click', () => {
  const box = document.getElementById('chat-box');
  box.style.display = box.style.display === 'none' ? 'flex' : 'none';
});

document.getElementById('send-btn').addEventListener('click', sendMessage);
document.getElementById('user-input').addEventListener('keypress', e => {
  if (e.key === 'Enter') sendMessage();
});

function appendMessage(role, text) {
  const container = document.getElementById('chat-messages');
  const msg = document.createElement('div');
  msg.classList.add('msg', role);
  msg.innerText = text;
  container.appendChild(msg);
  container.scrollTop = container.scrollHeight;
}

function sendMessage() {
  const input = document.getElementById('user-input');
  const message = input.value.trim();
  if (!message) return;

  appendMessage('user', message);
  input.value = '';

  appendMessage('bot', 'Typing...');

  fetch('/chatbot', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    },
    body: JSON.stringify({ message })
  })
  .then(res => res.json())
  .then(data => {
    document.querySelectorAll('.bot').forEach(msg => {
      if (msg.innerText === 'Typing...') msg.remove();
    });
    appendMessage('bot', data.reply);
  })
  .catch(() => {
    appendMessage('bot', 'Oops! Something went wrong. Please try again.');
  });
}

  </script>
</body>
</html>
