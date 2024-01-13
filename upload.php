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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];

    $targetDirectory = 'uploads/';
    $targetFile = $targetDirectory . basename($_FILES['file']['name']);
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Create the target directory if it doesn't exist
    if (!file_exists($targetDirectory)) {
        mkdir($targetDirectory, 0777, true);
    }

    if (in_array($fileType, ['pdf', 'PDF'])) {
        if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
            $file_path = $targetFile;

            $stmt = $conn->prepare("INSERT INTO files (title, file_path) VALUES (?, ?)") or die($conn->error);
            $stmt->bind_param("ss", $title, $file_path);
            $stmt->execute();
            $stmt->close();

            $response = ['message' => 'File uploaded successfully.'];
        } else {
            $response = ['message' => 'Error uploading the file.'];
        }
    } else {
        $response = ['message' => 'Only PDF files are allowed.'];
    }

    echo json_encode($response);
} else {
    header('Location: index.html');
    exit();
}
?>
