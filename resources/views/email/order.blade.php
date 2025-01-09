<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .email-header {
            background-color: #4A90E2;
            color: #ffffff;
            text-align: center;
            padding: 20px 0;
        }

        .email-header h1 {
            margin: 0;
            font-size: 24px;
        }

        .email-content {
            padding: 20px;
        }

        .email-content ul {
            list-style: none;
            padding: 0;
        }

        .email-content ul li {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>Order Confirmation</h1>
        </div>
        <div class="email-content">
            <p>Thank you for your order! Below are your transaction details:</p>
            <ul>
                <li><strong>Amount:</strong> {{ $details['amount'] }}</li>
                <li><strong>Coach ID:</strong> {{ $details['coach_id'] }}</li>
                <li><strong>Session Date:</strong> {{ $details['session_date'] }}</li>
                <li><strong>Session ID:</strong> {{ $details['session_id'] }}</li>
                <li><strong>Game ID:</strong> {{ $details['game_id'] }}</li>
                <li><strong>Status:</strong> {{ $details['status'] }}</li>
                <li><strong>Transaction Date:</strong> {{ $details['transaction_date'] }}</li>
            </ul>
        </div>
    </div>
</body>
</html>
