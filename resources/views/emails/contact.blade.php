<!DOCTYPE html>
<html>
<head>
    <title>Contact Message</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #00796b;
            color: #ffffff;
            text-align: center;
            padding: 15px;
            border-radius: 10px 10px 0 0;
            font-size: 24px;
            font-weight: bold;
        }
        .content {
            padding: 20px;
            color: #333;
        }
        .content p {
            font-size: 16px;
            line-height: 1.6;
        }
        .content strong {
            color: #00796b;
        }
        .footer {
            text-align: center;
            padding: 15px;
            font-size: 14px;
            color: #777;
        }
        .footer a {
            color: #00796b;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            New Contact Message
        </div>
        <div class="content">
            <p><strong>Name:</strong> {{ $data['name'] }}</p>
            <p><strong>Email:</strong> {{ $data['email'] }}</p>
            <p><strong>Subject:</strong> {{ $data['subject'] }}</p>
            <p><strong>Message:</strong></p>
            <p>{{ $data['message'] }}</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} KLD Official | <a href="">Visit Website</a>
        </div>
    </div>
</body>
</html>
