<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_sales";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM register WHERE username = ?");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result->num_rows === 0) {
        // Invalid Username
        echo "<script>
                alert('Invalid username or password.');
                window.location.href = 'login.php'; // Redirect to login page
              </script>";
        exit();
    } else {
        $user = $result->fetch_assoc();
        if ($user && password_verify($password, $user['password'])) {
            // Successful Login
            echo "<script>
                    alert('Login successful!');
                    window.location.href = 'index.html'; // Redirect to your dashboard or homepage
                  </script>";
            exit();
        } else {
            // Invalid Password
            echo "<script>
                    alert('Invalid username or password.');
                    window.location.href = 'login.php'; // Redirect to login page
                  </script>";
            exit();
        }
    }
}
?>

<!-- HTML Login Form -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <style>
      body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f1f3f5; /* Light gray background */
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    color: #333;
}

.login-container {
    background-color: #fff;
    padding: 40px 50px;
    border-radius: 20px;
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
    text-align: center;
    transition: transform 0.3s ease-out, box-shadow 0.3s ease-out;
}

.login-container:hover {
    transform: translateY(-5px); /* Subtle hover effect */
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
}

h2 {
    font-size: 30px;
    color: #333;
    font-weight: 600;
    margin-bottom: 25px;
}

label {
    font-size: 16px;
    color: #555;
    text-align: left;
    margin-bottom: 8px;
    display: block;
}

input[type="text"], input[type="password"] {
    width: 100%;
    padding: 12px 18px;
    margin-bottom: 20px;
    border-radius: 12px;
    border: 1px solid #ddd;
    background-color: #f9f9f9;
    font-size: 16px;
    color: #333;
    transition: border-color 0.3s ease, background-color 0.3s ease;
}

input[type="text"]:focus, input[type="password"]:focus {
    border-color: #007bff;
    background-color: #fff;
    outline: none;
}

input[type="submit"] {
    width: 100%;
    padding: 12px 0;
    background-color: #007bff; /* Primary blue */
    color: white;
    border: none;
    border-radius: 12px;
    font-size: 18px;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

input[type="submit"]:hover {
    background-color: #0056b3;
    transform: translateY(-2px); /* Button hover effect */
}

a {
    text-decoration: none;
    color: #007bff;
    font-size: 14px;
    display: inline-block;
    margin-top: 20px;
}

a:hover {
    color: #0056b3;
}

    </style>
</head>
<body>

<div class="login-container">
    <h2>Login</h2>
    <form action="" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>
</div>

</body>
</html>
