<?php
include "autenticacion.php";
include "config.php";

// Create connection (procedural)
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully<br>";
// Prepare statement
$stmt = mysqli_prepare($conn, "INSERT INTO MyGuests (firstname, lastname, email, phone, codigo) VALUES (?, ?, ?, ?, ?)");

// Bind parameters
mysqli_stmt_bind_param($stmt, "sssss", $firstname, $lastname, $email, $phone, $codigo);

// Set parameters and execute first record
$firstname = "John";
$lastname = "Doe";
$email = "john@example.com";
$phone = "65932985";
$codigo = "u01256";
mysqli_stmt_execute($stmt);

// Second record
$firstname = "Mary";
$lastname = "Moe";
$email = "mary@example.com";
$phone = "65932568";
$codigo = "u01257";
mysqli_stmt_execute($stmt);

// Third record
$firstname = "Julie";
$lastname = "Dooley";
$email = "julie@example.com";
$phone= "6595689";
$codigo = "u01258";
mysqli_stmt_execute($stmt);

echo "New records created successfully";

// Close statement and connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>

