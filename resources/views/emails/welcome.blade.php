<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Congratulations on Your Enrollment</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f2f2f2; margin: 0; padding: 30px;">
    <div style="max-width: 600px; margin: auto; background: #ffffff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">

        <div style="text-align: center; margin-bottom: 20px;">
            <img src="https://voltafrik.com.ng/assets/img/voltademy-logo.png" alt="Voltademy Logo" style="max-width: 180px;">
        </div>
        <h2 style="text-align: center; color: #333;">Welcome to Voltademy Tech Academy!</h2>

        <p style="font-size: 16px; color: #555; line-height: 1.6;">
            Congratulations! Your profile has been successfully created.
            <br><br>
            Here are your login credentials:
        </p>

        <div style="background-color: #f9f9f9; padding: 15px 20px; border-left: 4px solid #007bff; margin-bottom: 20px;">
            <p style="font-size: 16px; color: #333;">
                <strong>Username:</strong> {{ $email }}<br>
                <strong>Default Password:</strong> {{ $lastName . $phoneNumber }}<br>
            </p>
        </div>

        <p style="font-size: 16px; color: #555;">
            Please <strong><a href="https://voltafrik.com.ng/login" style="color: #007bff; text-decoration: none;">log in</a></strong> immediately and change your password for security reasons.
        </p>

        <hr style="margin: 30px 0; border: none; border-top: 1px solid #eee;">

        <h3 style="color: #333;">Complete Your Enrollment</h3>

        <p style="font-size: 16px; color: #555; line-height: 1.6;">
            To be fully onboarded into Voltademy Tech Academy and gain access to your courses, please make your payment using the details below:
        </p>

        <div style="background-color: #f1f9f9; padding: 20px; border-radius: 6px; margin-bottom: 20px;">
            <ul style="list-style-type: none; padding: 0; font-size: 16px; color: #333;">
                <li><strong>Bank:</strong> Moniepoint</li>
                <li><strong>Account Name:</strong> VOLTAFRIK TECHNOLOGIES ENTERPRISES</li>
                <li><strong>Account Number:</strong> 6210666905</li>
            </ul>
        </div>

        <p style="font-size: 16px; color: #555;">
            After making your payment, kindly send your payment receipt to us on WhatsApp for confirmation:
        </p>

        <div style="text-align: center; margin: 20px 0;">
            <a href="https://wa.me/2349046282789" target="_blank" style="display: inline-block; background-color: #25D366; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; font-size: 16px;">
                WhatsApp +234 904 628 2789
            </a>
        </div>

        <p style="font-size: 14px; color: #999; text-align: center;">
            Always check your email and your dashboard inbox for important updates from Management.<br>
            Thank you for choosing Voltademy Tech Academy!
        </p>
    </div>
</body>
</html>
