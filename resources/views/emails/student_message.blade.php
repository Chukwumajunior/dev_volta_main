<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Voltademy Message Alert!</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f2f2f2; padding: 30px;">
    <div style="max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
        <div style="text-align: center; margin-bottom: 20px;">
            <img src="{{ asset('assets/img/voltademy-logo.png') }}" alt="Voltademy Logo" style="max-width: 150px;">
        </div>
        <h2 style="color: #333;">Hello from Voltademy Tech Academy!</h2>
        <p style="font-size: 16px; color: #555;">You have received a new message:</p>
        <div style="background-color: #f9f9f9; padding: 15px; border-radius: 5px; margin-top: 15px; font-size: 15px;">
            {{ $messageBody }}
        </div>
        <p style="margin-top: 20px; font-size: 14px; color: #777;">Please log in to your dashboard for more details.</p>
        <div style="text-align: center; margin-top: 30px;">
            <a href="https://voltafrik.com.ng/login" style="background-color: #007BFF; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Login to Dashboard</a>
        </div>
    </div>
</body>
</html>
