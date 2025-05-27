
<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <title>Chatbot Gemini</title>
  <link rel="stylesheet" href="chatbot.css">
</head>
<body>


        <!-- Nút bật/tắt chatbot -->
        <div id="chatbot-toggle" onclick="toggleChatbot()">💬</div>

        <!-- Khung chatbot -->
        <div id="chatbot-container">
        <div id="chatbot-header">
            Chatbot
            <span onclick="toggleChatbot()" style="cursor: pointer;">✖</span>
        </div>
        <div id="chatbot-body">
            <?php
            if (!empty($_SESSION['chat'])) {
                foreach ($_SESSION['chat'] as $msg) {
                    $class = $msg['role'] === 'user' ? 'user' : 'gemini';
                    echo '<div class="message ' . $class . '">' . nl2br(htmlspecialchars($msg['text'])) . '</div>';
                }
            } else {
                echo '<div class="message gemini">Chào bạn! Hãy hỏi tôi điều gì đó.</div>';
            }
            ?>
        </div>

        <form action="AI_process.php" method="POST" id="chatForm" class="aiForm">
            <textarea class="aiSearch" name="message" placeholder="Nhập tin nhắn..." rows="2" required></textarea>
            <button class="aiButton" type="submit">Gửi</button>
        </form>
        </div>




</body>
<script src="../pages/js/AI.js"></script>
</html>
