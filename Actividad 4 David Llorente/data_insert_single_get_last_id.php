 <?php
 include "autenticacion.php";
$servername = "localhost";
$username = "DLF";
$password = "DLF";
$dbname = "bd_w3_DLF2";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully<br>";

//Insert data in the table MyGuests
$sql = "INSERT INTO MyGuests (firstname, lastname, email, phone, codigo)
VALUES ('John', 'Doe', 'john@example.com', '675893098', 'u02538')";

if (mysqli_query($conn, $sql)==false) {
   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  
} else {
 $last_id = mysqli_insert_id($conn);
  echo "New record created successfully. <br> Last inserted ID is: " . $last_id;
}

// Close connection
mysqli_close($conn);
?> 
