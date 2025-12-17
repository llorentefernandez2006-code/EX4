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

//Lanzamos la consulta
$sql = "SELECT COUNT(*) AS total_records FROM MyGuests";

$result = mysqli_query($conn, $sql);
if ($result==false) {
    echo "Error in the query: " . mysqli_error($conn);
}
else {

// Obtener la única fila de resultados
$row = mysqli_fetch_assoc($result);

// Acceder al valor contado
$records_count = $row["total_records"];

echo "The table consists of **" . $records_count . "** records.";

}

// Close connection
mysqli_close($conn);

?>

