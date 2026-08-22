<?php
// estimate_price.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $brand = $_POST['brand'] ?? '';
    $model = $_POST['model'] ?? '';
    $car_id = $_POST['car_id'] ?? '';
    $year = $_POST['year'] ?? '';
    $owner = $_POST['owner'] ?? '';
    $fuel = $_POST['fuel'] ?? '';
    $km = $_POST['km'] ?? '';

    // Base price for estimation
    $base_price = 1500000;

    // Depreciation calculations
    $age_factor = (2025 - $year) * 100000; // Depreciation based on car's age
    $km_factor = $km * 7;                  // Depreciation based on mileage

    // Estimated price calculation
    $estimated_price = $base_price - $age_factor - $km_factor;
    $estimated_price = max($estimated_price, 0); // Ensure it's not negative
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Estimated Car Price</title>
    <style>
       /* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body Styling */
body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #6a11cb, #2575fc);
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

/* Container Styling */
.container {
    background: #ffffff;
    padding: 30px 40px;
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    max-width: 500px;
    width: 100%;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.container:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
}

/* Headings */
h1 {
    color: #333;
    font-size: 28px;
    margin-bottom: 20px;
    text-transform: uppercase;
    letter-spacing: 2px;
}

h2 {
    color: #2575fc;
    font-size: 22px;
    margin: 20px 0;
    text-transform: uppercase;
}

/* Paragraphs */
p {
    font-size: 16px;
    line-height: 1.6;
    color: #555;
    margin: 10px 0;
}

/* Price Box */
.price {
    background: linear-gradient(90deg, #00c6ff, #0072ff);
    color: #fff;
    padding: 20px;
    border-radius: 10px;
    font-size: 24px;
    font-weight: bold;
    margin: 15px 0;
    transition: background 0.3s ease;
}

.price:hover {
    background: linear-gradient(90deg, #0072ff, #00c6ff);
    cursor: pointer;
}

/* Links */
a {
    display: inline-block;
    background: #0072ff;
    color: #fff;
    text-decoration: none;
    padding: 12px 25px;
    border-radius: 30px;
    margin: 15px 10px;
    transition: background 0.3s ease, transform 0.2s ease;
    font-weight: bold;
    text-transform: uppercase;
}

a:hover {
    background: #005bb5;
    transform: scale(1.05);
}

/* No Data Message */
.no-data {
    color: #777;
    font-style: italic;
    font-size: 18px;
    margin-top: 20px;
}

/* Responsive Design */
@media (max-width: 600px) {
    .container {
        padding: 20px;
    }
    .price {
        font-size: 20px;
    }
    a {
        padding: 10px 20px;
        font-size: 14px;
    }
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Estimated Car Price</h1>

        <?php if (isset($estimated_price)): ?>
            <p><strong>Brand:</strong> <?= htmlspecialchars($brand) ?></p>
            <p><strong>Model:</strong> <?= htmlspecialchars($model) ?></p>
            <p><strong>Car ID:</strong> <?= htmlspecialchars($car_id) ?></p>
            <p><strong>Year:</strong> <?= htmlspecialchars($year) ?></p>
            <p><strong>Owner:</strong> <?= htmlspecialchars($owner) ?></p>
            <p><strong>Fuel Type:</strong> <?= htmlspecialchars($fuel) ?></p>
            <p><strong>Kilometers Driven:</strong> <?= htmlspecialchars($km) ?></p>
            <h2>Price Estimation</h2>
            <div class="price">₹<?= number_format($estimated_price, 2) ?></div>
        <?php else: ?>
            <p class="no-data">No data received.</p>
        <?php endif; ?>

        <center> <a href="book.html">Book Inspection</a></center>

       <center> <a href="index.html">Go Back</a></center>
    </div>
</body>
</html>

