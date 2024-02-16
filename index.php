<?php
// Database connection
$servername = "localhost"; // Change this to your database server
$username = "root"; // Change this to your database username
$password = " "; // Change this to your database password
$dbname = "teacher_db"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sign Up
if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password for security

    $sql = "INSERT INTO teachers (name, username, email, password) VALUES ('$name', '$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Sign up successful";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Sign In
if (isset($_POST['signin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM teachers WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            echo "Sign in successful";
            // Redirect to dashboard or any other page
        } else {
            echo "Invalid username or password";
        }
    } else {
        echo "Invalid username or password";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Teacher Signup and Signin</title>
</head>
<body>
    <h2>Sign Up</h2>
    <form method="post">
        <input type="text" name="name" placeholder="Name" required><br><br>
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <input type="submit" name="signup" value="Sign Up">
    </form>

    <h2>Sign In</h2>
    <form method="post">
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <input type="submit" name="signin" value="Sign In">
    </form>
</body>
</html>