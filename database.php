<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["phoneNumber"];
    $address = $_POST["address"];
    $state = $_POST["state"];
    $pincode = $_POST["pincode"];
    $password = $_POST["password"];
    $SelectCourse = isset($_POST["SelectCourse"]) ? $_POST["SelectCourse"] : "";


     
    // SQL query to insert data into the 'details' table
    $sql = "INSERT INTO details (firstName, lastName, email, phoneNumber, address, state, pincode,password,SelectCourse) 
            VALUES ('$firstName', '$lastName', '$email', '$phoneNumber', '$address', '$state', '$pincode', '$password','$SelectCourse')";

    if ($conn->query($sql) === TRUE) {
        header("location:login.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
