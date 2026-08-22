<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $carNumber = $_POST['carNumber'];
    $db = new mysqli("localhost", "root", "", "car_database");

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    $query = "SELECT price FROM cars WHERE number = '$carNumber'";
    $result = $db->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode(["price" => $row["price"]]);
    } else {
        echo json_encode(["price" => "Not found"]);
    }
    $db->close();
}
?>