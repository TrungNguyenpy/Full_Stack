function toggleChatbot() {
    const chatbot = document.getElementById('chatbot-container');
    chatbot.style.display = chatbot.style.display === 'none' || chatbot.style.display === '' ? 'flex' : 'none';
  }

  const form = document.getElementById('chatForm');
  const chatbotBody = document.getElementById('chatbot-body');

  form.addEventListener('submit', async function (e) {
    e.preventDefault(); // Không cho reload

    const messageInput = form.querySelector('textarea');
    const message = messageInput.value.trim();

    if (message === '') return;

    // Hiển thị tin nhắn của người dùng trước
    chatbotBody.innerHTML += `<div class="message user">${message}</div>`;
    chatbotBody.scrollTop = chatbotBody.scrollHeight;

    messageInput.value = '';
    
    try {
      const response = await fetch('AI_process.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `message=${encodeURIComponent(message)}`
      });

      const result = await response.text();

      // Gửi trả về HTML content của phần chatbot-body (đã update)
      chatbotBody.innerHTML = result;
      chatbotBody.scrollTop = chatbotBody.scrollHeight;

    } catch (error) {
      chatbotBody.innerHTML += `<div class="message gemini">Lỗi gửi tin nhắn.</div>`;
    }
  });