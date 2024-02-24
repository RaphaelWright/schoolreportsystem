<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_number = $_POST['student_number'];
    $student_name = $_POST['student_name'];

    $english_cs = $_POST['english_cs'];
    $english_es = $_POST['english_es'];

    $maths_cs = $_POST['maths_cs'];
    $maths_es = $_POST['maths_es'];

    $science_cs = $_POST['science_cs'];
    $science_es = $_POST['science_es'];

    $owop_cs = $_POST['owop_cs'];
    $owop_es = $_POST['owop_es'];

    $arts_cs = $_POST['arts_cs'];
    $arts_es = $_POST['arts_es'];

    $history_cs = $_POST['history_cs'];
    $history_es = $_POST['history_es'];

    $french_cs = $_POST['french_cs'];
    $french_es = $_POST['french_es'];

    $ict_cs = $_POST['ict_cs'];
    $ict_es = $_POST['ict_es'];

    $twiga_cs = $_POST['twiga_cs'];
    $twiga_es = $_POST['twiga_es'];


    // Insert into database
    $sql = "INSERT INTO marks (student_number, student_name, english_cs, english_es, maths_cs, maths_es, 
    science_cs, science_es, owop_cs, owop_es, arts_cs, arts_es, history_cs, history_es, french_cs,
    french_es, ict_cs, ict_es, twiga_cs, twiga_es) 
    VALUES ('$student_number', '$student_name', '$english_cs',$english_es, '$maths_cs',$maths_es, '$science_cs', 
    '$science_es','$owop_cs','$owop_es', '$arts_cs',$arts_es,'$history_cs', '$history_es', '$french_cs','$french_es' ,
    '$ict_cs','$ict_es','$twiga_cs', '$twiga_es')";

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
    <link rel="stylesheet" href="marks.css" />
</head>

<body>
    <div class="form">
        <h2>Enter Student Marks</h2>
        <form method="post">

            <label for="student_number">Student Number</label>
            <input type="text" id="student_number" name="student_number" required>  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

            <label for="student_name">Student Name</label>
            <input type="text" id="student_name" name="student_name" required><br><br>

            <p>
                <span>
                    <label for="english">English</label>
                    <input type="text" id="english" name="english_cs" placeholder="Class Score">
                    <input type="text" id="english" name="english_es" placeholder="Exam Score"><br>
                </span>
            </p>

            <p>
                <span>
                    <label for="maths">Maths</label>
                    <input type="text" id="maths" name="maths_cs" placeholder="Class Score">
                    <input type="text" id="maths" name="maths_es" placeholder="Exam Score"><br>
                </span>
            </p>

            <p>
                <span>
                    <label for="science">Science</label>
                    <input type="text" id="science" name="science_cs" placeholder="Class Score">
                    <input type="text" id="science" name="science_es" placeholder="Exam Score"><br>
                </span>
            </p>

            <p>
                <span>
                    <label for="owop">OWOP</label>
                    <input type="text" id="owop" name="owop_cs" placeholder="Class Score">
                    <input type="text" id="owop" name="owop_es" placeholder="Exam Score"><br>
                </span>
            </p>
            <p>
                <span>
                    <label for="arts">Arts</label>
                    <input type="text" id="arts" name="arts_cs" placeholder="Class Score">
                    <input type="text" id="arts" name="arts_es" placeholder="Exam Score"><br>
                </span>
            </p>

            <p>
                <span>
                    <label for="history">History</label>
                    <input type="text" id="history" name="history_cs" placeholder="Class Score">
                    <input type="text" id="history" name="history_es" placeholder="Exam Score"><br>
                </span>
            </p>

            <p>
                <span>
                    <label for="french">French</label>
                    <input type="text" id="french" name="french_cs" placeholder="Class Score">
                    <input type="text" id="french" name="french_es" placeholder="Exam Score"><br>
                </span>
            </p>

            <p>
                <span>
                    <label for="ict">ICT</label>
                    <input type="text" id="ict" name="ict_cs" placeholder="Class Score">
                    <input type="text" id="ict" name="ict_es" placeholder="Exam Score"><br>
                </span>
            </p>

            <p>
                <span>
                    <label for="twiga">Twi/Ga</label>
                    <input type="text" id="twiga" name="twiga_cs" placeholder="Class Score">
                    <input type="text" id="twiga" name="twiga_es" placeholder="Exam Score"><br>
                </span>
            </p>

            <input type="submit" value="Add Record">

        </form>
    </div>
</body>

</html>