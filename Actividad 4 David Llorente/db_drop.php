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

// sql to delete table
$sql = "DROP DATABASE IF EXISTS $dbname";


if (mysqli_query($conn, $sql)==false) {
  echo "Error deleting database: " . mysqli_error($conn);
} else {
  echo "Database (if it existed) deleted successfully";
}

// Close connection
mysqli_close($conn);
?> 
