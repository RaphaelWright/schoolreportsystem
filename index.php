<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "school_db"; 
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['signin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM teachers WHERE username='$username'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            echo "<script>window.location.href='tdashboard.php'</script>";
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
    <title>Teacher Sign In</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="form">
        <h2>Sign In</h2>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required><br><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <a href="signup.php">Don't have an account?</a><br><br>
            <input type="submit" name="signin" value="Sign In">
        </form>
    </div>
</body>
</html>



