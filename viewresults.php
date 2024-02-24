<!DOCTYPE html>
<html>

<head>
    <title>Student Details</title>
    <link rel="stylesheet" href="viewresults.css" />
</head>

<body>
    <div class="search">
        <h2>Search Student Details</h2>
            <form method="post">
                <label for="search">Enter Student Number or Name:</label><br>
                <input type="text" id="search" name="search" required><br><br>
                <input type="submit" value="Search">
            </form>
    </div>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "school_db";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $search = $_POST['search'];
        $sql = "SELECT * FROM marks WHERE student_number = '$search' OR student_name = '$search'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // Output student number and name
            echo "<div class= 'reportbody'>";
            echo "<h2 class='title'>SAINT JUDE CATHOLIC BASIC SCHOOL</h2>";
            echo "<h4>Location: Kasoa Choice   Telephone: 0537137927,0555083859 Website: saintjude.edu</h4>";
            $row = $result->fetch_assoc();
            echo "<span>";
            echo "<p><strong>Student Number:</strong> {$row['student_number']}&nbsp&nbsp&nbsp&nbsp";
            echo "<strong>Student Name:</strong> {$row['student_name']}</p>";
            echo "</span>";
            echo "<p><span><b>Date of Resumption: </b>28th June, 2024 &nbsp&nbsp&nbsp&nbsp
            <b>Position: </b> Not Available</span></p>";

            // Output table header
            echo "<table border='1' cellspacing ='0' cellpadding = 10px>";
            echo "<tr><th>Subject</th><th>Class Score</th><th>Exam Score</th><th>Grade</th><th>Remarks</th></tr>";
            // Calculate grade and remarks for each subject
            $subjects = ['english', 'maths', 'science', 'owop', 'arts', 'history', 'french', 'ict', 'twiga'];
            foreach ($subjects as $subject) {
                $class_score = $row[$subject . '_cs'];
                $exam_score = $row[$subject . '_es'];
                // Calculate grade and remarks
                if ($exam_score >= 70) {
                    $grade = 'A';
                    $remarks = 'Distinction';
                } elseif ($exam_score >= 60) {
                    $grade = 'B';
                    $remarks = 'Excellent';
                } elseif ($exam_score >= 50) {
                    $grade = 'C';
                    $remarks = 'Very Good';
                } elseif ($exam_score >= 40) {
                    $grade = 'D';
                    $remarks = 'Good';
                } else {
                    $grade = 'F';
                    $remarks = 'Fail';
                }
                // Output row for each subject
                echo "<tr><td>" . ucfirst($subject) . "</td><td>{$class_score}</td><td>{$exam_score}</td><td>{$grade}</td><td>{$remarks}</td></tr>";
            }
            echo "</table>";

            //teachers remarks
            echo "<h4>TEACHER'S COMMENTS: The results are good but theres more room for improvement. Results can be better </h4>";
            
            
            echo " <script>
             function hideDiv(){
                document.querySelector('.search').style.display = 'none';
             }
             function printt(){
                window.print();
             }
             function combine(){
                hideDiv();
                printt();
             }
            </script>";
            // Print button
            echo "<button class='print-button' onclick='combine()'>Print Report</button>";
        } else {
            echo "No student found with the given ID or name.";
        }
    }
    echo "</div>";
    $conn->close();
    ?>
</body>

</html>