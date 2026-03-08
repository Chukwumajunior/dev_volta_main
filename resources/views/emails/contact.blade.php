<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Contact Message</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            padding: 20px;
        }
        .email-container {
            max-width: 600px;
            background: #fff;
            margin: 0 auto;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #0069d9;
            border-bottom: 2px solid #0069d9;
            padding-bottom: 8px;
            margin-bottom: 20px;
        }
        .info {
            margin-bottom: 15px;
        }
        .info strong {
            width: 100px;
            display: inline-block;
            color: #444;
        }
        .message {
            background: #f1f3f5;
            padding: 15px;
            border-radius: 8px;
            white-space: pre-line;
        }
        footer {
            margin-top: 25px;
            font-size: 12px;
            color: #888;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="email-container">
    <h2>New Contact Message</h2>

    <div class="info"><strong>Name:</strong> {{ $data['name'] }}</div>
    <div class="info"><strong>Email:</strong> {{ $data['email'] }}</div>
    <div class="info"><strong>Phone:</strong> {{ $data['number'] }}</div>

    <div class="info"><strong>Message:</strong></div>
    <div class="message">{{ $data['message'] }}</div>

    <footer>
        This message was sent from your website’s contact form.
    </footer>
</div>
</body>
</html>
