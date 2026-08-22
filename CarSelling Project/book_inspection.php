<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $brand = $_POST['brand'] ?? '';
    $model = $_POST['model'] ?? '';
    $year = $_POST['year'] ?? '';

    if (empty($brand) || empty($model) || empty($year)) {
        die("Please fill in all fields.");
    }
} else {
    die("Form not submitted.");
}
?>



<?php
include 'db_connect.php'; // Connect to the database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name = $_POST['user_name'];
    $phone = $_POST['phone'];
    $car_brand = $_POST['brand'];
    $car_model = $_POST['model'];
    $car_year = $_POST['year'];
    $inspection_date = $_POST['inspection_date'];
    $inspection_time = $_POST['inspection_time'];

    // Insert booking into database
    $sql = "INSERT INTO book_inspection (user_name, phone, brand, model, year, inspection_date, inspection_time) 
            VALUES ('$user_name', '$phone', '$brand', '$model', '$year', '$inspection_date', '$inspection_time')";

    if ($conn->query($sql) === TRUE) {
        // WhatsApp Message
        $whatsapp_message =  "Your Car Inspection is Confirmed! 🚗\n\n"
        . "Hi $user_name,\n\n"
        . "Inspection for $car_brand $car_model is confirmed.\n\n"
        . "📅 Date: $inspection_date\n"
        . "⏰ Time: $inspection_time\n\n"
        . "Thank you for choosing us!";


        // Create WhatsApp API link
        $whatsapp_url = "https://api.whatsapp.com/send?phone=$phone&text=" . urlencode($whatsapp_message);

        // Redirect user to WhatsApp
      echo "<script>
            window.open('$whatsapp_url', '_blank');
            setTimeout(function() {
                window.location.href = 'success.php';
            }, 3000); // 3-second delay
        </script>";
        exit;   
    }
    
    $conn->close();
}
?>

<!-- After sending the message , the user will click "Back" in their browser and return to your site-->

