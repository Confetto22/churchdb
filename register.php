<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "homchapeldb";
$dbname = "church_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$occupation = $_POST['occupation'];
$marital_status = $_POST['marital_status'];
$category = $_POST['category'];
$church_worker = isset($_POST['church_worker']) ? 1 : 0;

// Insert data into database
$sql = "INSERT INTO members (name, email, phone, address, gender, occupation, marital_status, category, church_worker) VALUES ('$name', '$email', '$phone', '$address', '$gender', '$occupation', '$marital_status', '$category', '$church_worker')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>