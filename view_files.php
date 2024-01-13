<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "file";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve selected course
    $selectedCourse = isset($_POST["SelectCourse"]) ? $_POST["SelectCourse"] : "";

    // Fetch files based on the selected course from the database
    $sql = "SELECT f.title, f.file_path FROM files f
            INNER JOIN courses c ON f.course_id = c.course_id
            WHERE c.course_name = '$selectedCourse'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $title = $row['title'];
            $file_path = $row['file_path'];

            // Display the file information
            echo "<p>Title: $title</p>";
            echo "<p>File Path: $file_path</p>";
            echo "<a href='$file_path' target='_blank'>View File</a>";
            echo "<hr>";
        }
    } else {
        echo "No files found for the selected course.";
    }
}

$conn->close();
?>
