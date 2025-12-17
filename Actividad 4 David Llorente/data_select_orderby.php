<?php
include "autenticacion.php";
include "recoge.php";

$orden = strtoupper(recoge('orden'));
if ($orden !== 'ASC' && $orden !== 'DESC') {
    die("Orden inválido. Usa ASC o DESC.");
}

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
$sql = "SELECT id, firstname, lastname, email, codigo FROM MyGuests ORDER BY lastname $orden";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>Email</th><th>Código</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['firstname']}</td>
                <td>{$row['lastname']}</td>
                <td>{$row['email']}</td>
                <td>{$row['codigo']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No hay datos.";
}

mysqli_close($conn);
?>

