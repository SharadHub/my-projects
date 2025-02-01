<!-- 7) Design a feedback form name, email, rating and feedback and save data in MySQL table using PHP.-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
</head>
<body>
    <h2>Submit Your Feedback</h2>
    <form action="lab7B.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
 
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="rating">Rating:</label>
        <select id="rating" name="rating" required>
            <option value="1">⭐ - Poor</option>
            <option value="2">⭐⭐ - Fair</option>
            <option value="3">⭐⭐⭐ - Good</option>
            <option value="4">⭐⭐⭐⭐ - Very Good</option>
            <option value="5">⭐⭐⭐⭐⭐ - Excellent</option>
        </select><br><br>

        <label for="feedback">Feedback:</label><br>
        <textarea id="feedback" name="feedback" rows="4" cols="50" required></textarea><br><br>

        <input type="submit" value="Submit Feedback">
    </form>
</body>
</html>
