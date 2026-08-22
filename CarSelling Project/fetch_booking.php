<?php
include 'db_connect.php';

$query = "SELECT * FROM book_inspection ORDER BY inspection_date DESC";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['user_name']}</td>
        <td>{$row['phone']}</td>
        <td>{$row['car_details']}</td>
        <td>{$row['inspection_date']}</td>
        <td>{$row['inspection_time']}</td>
        <td>{$row['brand']} {$row['model']} ({$row['year']})</td>
        <td>
            <form action='update_booking.php' method='POST'>
                <input type='hidden' name='booking_id' value='{$row['id']}'>
                <select name='status'>
                    <option ".($row['status'] == 'Pending' ? 'selected' : '').">Pending</option>
                    <option ".($row['status'] == 'Confirmed' ? 'selected' : '').">Confirmed</option>
                    <option ".($row['status'] == 'Completed' ? 'selected' : '').">Completed</option>
                    <option ".($row['status'] == 'Canceled' ? 'selected' : '').">Canceled</option>
                </select>
                <button type='submit'>Update</button>
            </form>
        </td>
    </tr>";
}
?>

<style>

   /* General Body Styling */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f0f2f5;
    margin: 0;
    padding: 20px;
    color: #333;
    line-height: 1.6;
}

/* Table Styling */
table {
    width: 100%;
    border-collapse: collapse;
    margin: 30px 0;
    background-color: #ffffff;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

table:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
}

/* Table Header Styling */
th {
    background: linear-gradient(90deg, #4CAF50, #81C784);
    color: white;
    text-align: center;
    padding: 16px 20px;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: bold;
    border-bottom: 2px solid #388E3C;
}

/* Table Data Styling */
td {
    padding: 14px 20px;
    text-align: center;
    border-bottom: 1px solid #ddd;
    font-size: 13px;
    transition: background-color 0.3s ease;
}

/* Hover Effect */
tr:hover {
    background-color: #f9fbe7;
    transition: background-color 0.3s ease;
}

/* Form and Button Styling */
form {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
    margin: 0 auto;
}

select {
    padding: 8px 12px;
    border: 2px solid #4CAF50;
    border-radius: 5px;
    outline: none;
    background-color: #f9fbe7;
    transition: background-color 0.3s ease, border-color 0.3s ease;
    font-size: 14px;
}

select:focus {
    border-color: #388E3C;
    background-color: #e8f5e9;
}

button {
    background: linear-gradient(90deg, #4CAF50, #66BB6A);
    color: white;
    border: none;
    padding: 10px 14px;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
    transition: background 0.3s ease, transform 0.2s ease;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
}

button:hover {
    background: linear-gradient(90deg, #66BB6A, #81C784);
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

/* Responsive Design */
@media (max-width: 768px) {
    table, thead, tbody, th, td, tr {
        display: block;
    }

    th {
        position: absolute;
        top: -9999px;
        left: -9999px;
    }

    tr {
        border: 1px solid #ccc;
        margin-bottom: 10px;
        background: #ffffff;
        border-radius: 8px;
        overflow: hidden;
    }

    td {
        border: none;
        position: relative;
        padding-left: 50%;
        text-align: left;
        font-size: 14px;
    }

    td::before {
        content: attr(data-label);
        position: absolute;
        left: 10px;
        font-weight: bold;
        color: #4CAF50;
    }
}


    </style>
