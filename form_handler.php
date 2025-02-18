<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    
    if (empty($name) || empty($email)) {
        echo "Please fill in all fields";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
    } else {
        echo "<h2>Thank you for submitting!</h2>";
        echo "<p>Name: $name</p>";
        echo "<p>Email: $email</p>";
    }
} else {
    header("Location: form_page.html");
    exit;
}
?>