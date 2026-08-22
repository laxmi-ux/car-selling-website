<?php
$conn = new mysqli("localhost", "root", "", "car_sales");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action == 'get_models') {
        $brand = $conn->real_escape_string($_POST['brand']);
        $query = "SELECT model FROM cars WHERE brand = '$brand'";
        $result = $conn->query($query);

        $models = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $models[] = $row['model'];
            }
        } else {
            $models[] = "No models found";
        }
        echo json_encode($models);
    }
}
?>
