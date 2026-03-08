<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Acknowledgment</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f2f2f2; margin: 0; padding: 30px;">
    <div style="max-width: 600px; margin: auto; background: #ffffff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
        
        <div style="text-align: center; margin-bottom: 20px;">
            <img src="https://voltafrik.com.ng/assets/img/voltademy-logo.png" alt="Voltademy Logo" style="max-width: 180px;">
        </div>
        <h2 style="text-align: center; color: #333;">Congratulations on Your Enrollment!</h2>

        <p style="font-size: 16px; color: #555; line-height: 1.6;">
            We are pleased to inform you that your payment for the <strong>{{ $career }}</strong> course has been successfully acknowledged.
            <br><br>
            <strong>Payment Status:</strong> {{ $payment_status }}<br>
            <strong>Payment Date:</strong> {{ \Carbon\Carbon::parse($payment_date)->format('d M Y') }}
        </p>

        <p style="font-size: 16px; color: #555; line-height: 1.6;">
            Congratulations! You are now officially enrolled in the program. Expect an email from Mercatura School of Technology with detailed information about your onboarding process.
        </p>

        <p style="font-size: 16px; color: #555; line-height: 1.6;">
            We are excited to have you join us and look forward to supporting you throughout your journey!
        </p>

        <hr style="margin: 30px 0; border: none; border-top: 1px solid #eee;">

        <p style="font-size: 14px; color: #999; text-align: center;">
            Always check your email and dashboard inbox for important updates from Management.<br>
            Thank you for choosing Voltademy Tech Academy!
        </p>
    </div>
</body>
</html>
