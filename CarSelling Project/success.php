<!DOCTYPE html>
<html>
<head>
    <title>Success</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: rgba(0, 0, 0, 0.5); /* Dimmed background */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .popup-container {
            background: #fff;
            padding: 40px 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 350px;
            animation: fadeIn 0.5s ease-in-out;
        }

        h2 {
            color:rgb(118, 72, 130);
            font-size: 26px;
            margin: 0;
            margin-bottom: 10px;
        }

        p {
            color: #555;
            font-size: 16px;
            margin-bottom: 20px;
        }

        a {
            display: inline-block;
            background:rgb(95, 13, 111);
            color: #fff;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 8px;
            transition: background 0.3s ease;
            font-weight: bold;
        }

        a:hover {
            background:rgb(137, 29, 132);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
</head>
<body>
    <div class="popup-container">
        <h2>🎉 Booking Confirmed!</h2>
        <p>Your car inspection has been successfully booked.</p>
        <a href="index.html">Go to Home</a>
    </div>
</body>
</html>
