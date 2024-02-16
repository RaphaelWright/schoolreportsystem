<?php
// Database connection
$servername = "localhost"; // Change this to your database server
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "school_db"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_number = $_POST['student_number'];
    $student_name = $_POST['student_name'];
    $english = $_POST['english'];
    $maths = $_POST['maths'];
    $science = $_POST['science'];
    $owop = $_POST['owop'];
    $arts = $_POST['arts'];
    $history = $_POST['history'];
    $french = $_POST['french'];
    $ict = $_POST['ict'];
    $twiga = $_POST['twiga'];

    // Insert into database
    $sql = "INSERT INTO student_marks (student_number, student_name, marks) 
    VALUES ('$student_number', '$student_name', '$english', '$maths', '$science', 
    '$owop', '$arts', '$history', '$french', '$ict', '$twiga)";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Student marks added successfully')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Marks Form</title>
</head>
<body>
    <h2>Enter Student Marks</h2>
    <form method="post">
        <label for="student_number">Student Number:</label><br>
        <input type="text" id="student_number" name="student_number" required><br><br>

        <label for="student_name">Student Name:</label><br>
        <input type="text" id="student_name" name="student_name" required><br><br>

        <label for="english">English:</label><br>
        <input type="text" id="english" name="english" required><br><br>

        <label for="maths">Maths:</label><br>
        <input type="text" id="maths" name="maths" required><br><br>

        <label for="science">Science:</label><br>
        <input type="text" id="science" name="science" required><br><br>    

        <label for="owop">Owop:</label><br>
        <input type="text" id="owop" name="owop" required><br><br>

        <label for="arts">Arts:</label><br>
        <input type="text" id="arts" name="arts" required><br><br>

        <label for="history">History:</label><br>
        <input type="text" id="history" name="history" required><br><br>

        <label for="french">French:</label><br>
        <input type="text" id="french" name="french" required><br><br>

        <label for="ict">ICT:</label><br>
        <input type="text" id="ict" name="ict" required><br><br>

        <label for="twiga">Twiga:</label><br>
        <input type="text" id="twiga" name="twiga" required><br><br>

        <input type="submit" value="Add Record">

        </form>
</body>
</html>
