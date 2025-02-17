<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);

    // Dummy authentication (replace with database check in real applications)
    if ($username == "admin" && $password == "password123") {
        echo "Login successful! Welcome, " . $username . ".";
    } else {
        echo "Invalid username or password!";
    }
}
?>
