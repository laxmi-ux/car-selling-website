<?php
include 'db_connect.php';

$booking_id = $_POST['booking_id'];
$status = $_POST['status'];

$query = "UPDATE book_inspection SET status='$status' WHERE id=$booking_id";
if (mysqli_query($conn, $query)) {
    echo "";
} else {
    echo "Error updating booking: " . mysqli_error($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Status</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e9f7ef;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .message-box {
            background: #ffffff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            gap: 10px;
            color: #2d2d2d;
            font-size: 16px;
            transition: transform 0.2s ease-in-out;
        }

        .message-box:hover {
            transform: translateY(-5px);
        }

        .check-icon {
            color: #28a745;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="message-box">
        <span class="check-icon">✔</span>
        <span>Booking updated successfully</span>
        <a href="index.html">Go to Home</a>
    </div>
</body>
</html>
