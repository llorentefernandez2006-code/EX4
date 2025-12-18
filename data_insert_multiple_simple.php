 <?php
 include "autenticacion.php";
 include "config.php";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully<br>";

// Prepare the multiple query
$sql = "INSERT INTO MyGuests (firstname, lastname, email, phone, codigo)
VALUES ('John', 'Doe', 'john@example.com', '653298624', 'u01526');";
$sql .= "INSERT INTO MyGuests (firstname, lastname, email, phone, codigo)
VALUES ('Mary', 'Moe', 'mary@example.com', '653225635', 'u01527');";
$sql .= "INSERT INTO MyGuests (firstname, lastname, email, phone, codigo)
VALUES ('Julie', 'Dooley', 'julie@example.com', '526893524', 'u01528')";

if (mysqli_multi_query($conn, $sql)) {
  echo "New records created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?> 

