<?php
// Database connection
$servername = "localhost";
$username = "root";  // Change if using a different user
$password = "";      // Change if using a password
$dbname = "user_registration";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to validate username pattern
function isValidUsername($username) {
    return preg_match('/^[a-zA-Z]+[0-9]+$/', $username);
}

// Function to validate email format
function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Process form data if POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = trim($_POST["full_name"]);
    $email = trim($_POST["email"]);
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Validation
    $errors = [];

    // Full Name: Max 40 characters
    if (strlen($full_name) > 40) {
        $errors[] = "Full name must be up to 40 characters.";
    }

    // Email: Must be valid
    if (!isValidEmail($email)) {
        $errors[] = "Invalid email format.";
    }

    // Username: Must start with letters and end with numbers
    if (!isValidUsername($username)) {
        $errors[] = "Username must start with letters and end with numbers.";
    }

    // Password: Must be more than 8 characters
    if (strlen($password) < 8) {
        $errors[] = "Password must be more than 8 characters.";
    }

    // If there are validation errors, show them
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    } else {
        // Hashing password for security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert into database
        $stmt = $conn->prepare("INSERT INTO users (full_name, email, username, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $full_name, $email, $username, $hashed_password);

        if ($stmt->execute()) {
            echo "<p style='color: green;'>Registration successful!</p>";
        } else {
            echo "<p style='color: red;'>Error: " . $stmt->error . "</p>";
        }

        // Close statement
        $stmt->close();
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <script>
        function validateForm() {
            let fullName = document.getElementById("full_name").value;
            let email = document.getElementById("email").value;
            let username = document.getElementById("username").value;
            let password = document.getElementById("password").value;
            let error = "";

            // Full Name Validation (Max 40 characters)
            if (fullName.length > 40) {
                error += "Full name must be up to 40 characters.\n";
            }

            // Email Validation
            let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                error += "Invalid email format.\n";
            }

            // Username Validation (Starts with letters, followed by numbers)
            let usernamePattern = /^[a-zA-Z]+[0-9]+$/;
            if (!usernamePattern.test(username)) {
                error += "Username must start with letters and end with numbers.\n";
            }

            // Password Validation (Minimum 8 characters)
            if (password.length < 8) {
                error += "Password must be more than 8 characters.\n";
            }

            // Display errors if any
            if (error) {
                alert(error);
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <h2>User Registration</h2>
    <form action="" method="POST" onsubmit="return validateForm();">
        <label>Full Name:</label>
        <input type="text" name="full_name" id="full_name" required>
        <br><br>

        <label>Email:</label>
        <input type="email" name="email" id="email" required>
        <br><br>

        <label>Username:</label>
        <input type="text" name="username" id="username" required>
        <br><br>

        <label>Password:</label>
        <input type="password" name="password" id="password" required>
        <br><br>

        <button type="submit">Register</button>
    </form>
</body>
</html>

