<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    echo "Hello, " . $name . "!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Form</title>
</head>
<body>
    <form method="post">
        <label>Enter your name:</label>
        <input type="text" name="name" required>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
