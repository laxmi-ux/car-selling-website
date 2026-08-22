<?php
session_start();
if ($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == "admin" && $password == "admin123") {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin.php");
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Body Styling */
        body {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }

        /* Login Container */
        form {
            background: #fff;
            padding: 40px 35px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            max-width: 350px;
            width: 100%;
            text-align: center;
            transition: transform 0.3s ease-in-out;
        }

        form:hover {
            transform: translateY(-10px);
        }

        /* Heading */
        h2 {
            margin-bottom: 20px;
            color: #333;
            font-weight: bold;
            letter-spacing: 1px;
        }

        /* Input Fields */
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 14px;
            margin: 12px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            outline: none;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #6a11cb;
            box-shadow: 0 0 8px rgba(106, 17, 203, 0.6);
        }

        /* Submit Button */
        button {
            width: 100%;
            padding: 14px;
            background: #6a11cb;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
            font-size: 16px;
            font-weight: bold;
        }

        button:hover {
            background: #2575fc;
            transform: scale(1.05);
        }

        /* Error Message */
        p {
            color: #e74c3c;
            margin-top: 10px;
            font-weight: bold;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <form method="post">
        <h2>Admin Login</h2>
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Login</button>
        <?php if (isset($error)) echo "<p>$error</p>"; ?>
    </form>
</body>
</html>
