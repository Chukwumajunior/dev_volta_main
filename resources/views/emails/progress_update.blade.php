<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Progress Update</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f2f2f2; margin: 0; padding: 30px;">
    <div style="max-width: 600px; margin: auto; background: #ffffff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
        
        <div style="text-align: center; margin-bottom: 20px;">
            <img src="https://voltafrik.com.ng/assets/img/voltademy-logo.png" alt="Voltademy Logo" style="max-width: 180px;">
        </div>
        <h2 style="text-align: center; color: #333;">Progress Update</h2>

        <p style="font-size: 16px; color: #555; line-height: 1.6;">
            Dear {{ $name }},
        </p>

        @if ($progress == 100)
            <p style="font-size: 16px; color: #555; line-height: 1.6;">
                Congratulations! You have successfully completed the <strong>{{ $career }}</strong> program.
            </p>
        @else
            <p style="font-size: 16px; color: #555; line-height: 1.6;">
                Your progress in the <strong>{{ $career }}</strong> program has been updated to <strong>{{ $progress }}%</strong>.
            </p>
        @endif

        <p style="font-size: 16px; color: #555; line-height: 1.6;">
            We are proud of your achievement and look forward to your continued success in the program.
        </p>

        <hr style="margin: 30px 0; border: none; border-top: 1px solid #eee;">

        <p style="font-size: 14px; color: #999; text-align: center;">
            Always check your email and dashboard inbox for important updates from Management.<br>
            Thank you for being part of Voltademy Tech Academy!
        </p>
    </div>
</body>
</html>
