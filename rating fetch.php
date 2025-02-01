<!-- 8)Display feedback and rating. -->
<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "feedback_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to retrieve rating and feedback data from the database
$sql = "SELECT rating, feedback FROM feedbacks";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedbacks</title>
</head>
<body>
    <h2>Feedback Ratings</h2>

    <?php
    if ($result->num_rows > 0) {
        // Display the table
        echo "<table border='1'>";
        echo "<thead><tr><th>Rating</th><th>Feedback</th></tr></thead>";
        echo "<tbody>";

        // Output each rating and feedback in a row
        while($row = $result->fetch_assoc()) {
            $rating = $row["rating"];
            $feedback = $row["feedback"];
            
            // Generate the stars based on rating
            $stars = "";
            for ($i = 1; $i <= $rating; $i++) {
                $stars .= "⭐"; // Append star emoji
            }

            echo "<tr>";
            echo "<td>" . $stars . "</td>";
            echo "<td>" . nl2br($feedback) . "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p>No feedback available.</p>";
    }

    $conn->close(); // Close the database connection
    ?>

</body>
</html>
