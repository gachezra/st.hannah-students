<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "st_hanahs_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get input data from form
$name = $_POST["name"];
$stream = $_POST["stream"];
$marks = $_POST["marks"];

// Insert data into database
$sql = "INSERT INTO student_records (student_name, student_stream, student_marks)
VALUES ('$name', '$stream', $marks)";

if ($conn->query($sql) === TRUE) {
    echo "Successfully Added <a href='students.php'>Click Here to Continue</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
