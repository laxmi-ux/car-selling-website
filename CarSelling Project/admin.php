<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}
?>

<?php
$conn = new mysqli("localhost", "root", "", "car_sales");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, user_name, brand, model, year, phone, inspection_date, inspection_time FROM book_inspection";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Booked Inspections</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f4f7f9;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        h1, h2 {
            color: #333;
            margin-bottom: 10px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header a {
            text-decoration: none;
            padding: 10px 15px;
            background: #007BFF;
            color: white;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .header a:hover {
            background: #0056b3;
        }

        #searchBox {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #007BFF;
            color: white;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        button {
            padding: 8px 12px;
            margin: 3px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: background 0.3s;
        }

        .whatsapp-btn {
            background-color: #25D366;
            color: white;
        }

        .whatsapp-btn:hover {
            background-color: #128C7E;
        }

        .delete-btn {
            background-color: #DC3545;
            color: white;
        }

        .delete-btn:hover {
            background-color: #C82333;
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Welcome to the Admin Dashboard!</h1>
        
        <a href="fetch_booking.php">Ftech Data</a>
        <a href="logout.php">Logout</a>
       
       

    </div>

    <h2>Booked Inspections</h2>
    <input type="text" id="searchBox" placeholder="Search by car brand, model, or user name" onkeyup="searchTable()">

    <table>
        <tr>
            <th>ID</th>
            <th>Car</th>
            <th>Username</th>
            <th>Phone</th>
            <th>Inspection Date</th>
            <th>Time</th>
            <th>Actions</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['brand'] . " " . $row['model'] . " (" . $row['year'] . ")"; ?></td>
            <td><?php echo $row['user_name']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['inspection_date']; ?></td>
            <td><?php echo $row['inspection_time']; ?></td>
            <td>
                <button class="whatsapp-btn" onclick="sendWhatsApp('<?php echo $row['phone']; ?>', '<?php echo $row['brand']; ?>', '<?php echo $row['model']; ?>', '<?php echo $row['inspection_date']; ?>', '<?php echo $row['inspection_time']; ?>')">Send WhatsApp</button>
                <button class="delete-btn" onclick="deleteInspection(<?php echo $row['id']; ?>)">Delete</button>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

<script>
    function sendWhatsApp(phone, brand, model, date, time) {
        let message = `✅ Reminder: Your Car Inspection is Scheduled!\n\n🚗 Car: ${brand} ${model}\n📅 Date: ${date}\n⏰ Time: ${time}\n📍 Location: Our Inspection Center\n\nThank you!`;
        let whatsapp_url = `https://api.whatsapp.com/send?phone=${phone}&text=${encodeURIComponent(message)}`;
        window.open(whatsapp_url, "_blank");
    }

    function deleteInspection(id) {
        if (confirm("Are you sure you want to delete this inspection?")) {
            window.location.href = `delete_inspection.php?id=${id}`;
        }
    }

    function searchTable() {
        let input = document.getElementById("searchBox").value.toLowerCase();
        let rows = document.querySelectorAll("table tr");

        for (let i = 1; i < rows.length; i++) {
            let text = rows[i].innerText.toLowerCase();
            rows[i].style.display = text.includes(input) ? "" : "none";
        }
    }
</script>

</body>
</html>

<?php $conn->close(); ?>
