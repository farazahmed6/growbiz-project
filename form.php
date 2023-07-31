<?php
// Establish a database connection
$servername = "localhost";  // Replace with your database server name
$username = "root";  // Replace with your database username
$password = "";  // Replace with your database password
$dbname = "windland";  // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Prepare and execute the SQL statement
$stmt = $conn->prepare("INSERT INTO `emails`(`first_name`, `last_name`, `email`, `subject`, `message`, `phone`) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssi", $first_name, $last_name, $email, $subject, $message, $phone);
$stmt->execute();

// Check if the insertion was successful
if ($stmt->affected_rows > 0) {
    echo "Data inserted successfully.";
} else {
    echo "Error inserting data: " . $conn->error;
}

// Close the statement and the database connection
$stmt->close();
$conn->close();
?>
