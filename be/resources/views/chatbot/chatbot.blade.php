<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Chatbot</title>
</head>

<body>
    <h2>Chatbot Test</h2>
    <input type="text" id="message" placeholder="Nhập tin nhắn..." />
    <button onclick="sendMessage()">Gửi</button>
    <p><strong>Trí Lê Minh Bot:</strong> <span id="reply"></span></p>

    <script>
        async function sendMessage() {
            const message = document.getElementById('message').value;
            const response = await fetch('/chatbot/send', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    message
                })
            });

            const data = await response.json();
            document.getElementById('reply').innerText = data.reply;
        }
    </script>
</body>

</html>