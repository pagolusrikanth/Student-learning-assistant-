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

// Fetch files from the database
$sql = "SELECT title, file_path FROM files";
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
    echo "No files found.";
}

$conn->close();
?>
