<?php
session_start();
session_destroy(); // End the session
header("Location: admin_login.php"); // Redirect to login page
exit();
?>