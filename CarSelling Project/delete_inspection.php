<?php
$conn = new mysqli("localhost", "root", "", "car_sales");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "DELETE FROM book_inspection WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Inspection deleted successfully!'); window.location.href='admin.php';</script>";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>