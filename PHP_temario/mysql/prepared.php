<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "dwes";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// prepare and bind
$stmt = $conn->prepare("INSERT INTO usuarios (firstname, lastname) VALUES (?, ?)");
$stmt->bind_param("ss", $firstname, $lastname);

// set parameters and execute
$firstname = "John";
$lastname = "Doe";
$stmt->execute();

$firstname = "Mary";
$lastname = "Moe";
$stmt->execute();

$firstname = "Julie";
$lastname = "Dooley";
$stmt->execute();

echo "New records created successfully";

$stmt->close();
$conn->close();
?>