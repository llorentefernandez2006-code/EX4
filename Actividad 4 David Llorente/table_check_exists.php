 <?php include "autenticacion.php"; 
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


// 1. Consulta para verificar si la tabla existe
$sql = "SHOW TABLES LIKE 'MyGuests'";
$result = mysqli_query($conn, $sql);

// Verificar el resultado de la comprobación
if (mysqli_num_rows($result) == 0) {
    // 2. Si mysqli_num_rows devuelve 0, la tabla NO existe
    echo "Aviso: La tabla **MyGuests** no existe. No se puede visualizar.";
    // Puedes terminar aquí o simplemente omitir la consulta
}
else{
echo "Aviso: La tabla **MyGuests** existe.";
}


// Close connection
mysqli_close($conn);
?> 
