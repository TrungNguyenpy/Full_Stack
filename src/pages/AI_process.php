<?php
session_start();
require __DIR__ . '/../../vendor/autoload.php';  
use GuzzleHttp\Client;

$apiKey = 'AIzaSyCp9PJghJ0mj0wjAsoOFb-QQj3Bqr3ASxc';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userMessage = trim($_POST['message'] ?? '');

    if ($userMessage !== '') {
        $_SESSION['chat'][] = ['role' => 'user', 'text' => $userMessage];

        try {
            $client = new Client();
            $response = $client->post(
                'https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=' . $apiKey,
                [
                    'json' => [
                        'contents' => [
                            ['parts' => [['text' => $userMessage]]]
                        ]
                    ],
                    'headers' => ['Content-Type' => 'application/json']
                ]
            );
            $data = json_decode($response->getBody(), true);
            $reply = $data['candidates'][0]['content']['parts'][0]['text'] ?? 'Không có phản hồi.';
        } catch (Exception $e) {
            $reply = 'Lỗi: ' . $e->getMessage();
        }

        $_SESSION['chat'][] = ['role' => 'gemini', 'text' => $reply];
    }
}

// Trả lại phần nội dung chat
if (!empty($_SESSION['chat'])) {
    foreach ($_SESSION['chat'] as $msg) {
        $class = $msg['role'] === 'user' ? 'user' : 'gemini';
        echo '<div class="message ' . $class . '">' . nl2br(htmlspecialchars($msg['text'])) . '</div>';
    }
} else {
    echo '<div class="message gemini">Chào bạn! Hãy hỏi tôi điều gì đó.</div>';
}
exit;
