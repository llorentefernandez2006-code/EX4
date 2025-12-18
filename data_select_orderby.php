<?php
include "autenticacion.php";
include "recoge.php";
include "config.php";





// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully<br>";

//Lanzamos la consulta
$sql = "SELECT id, firstname, lastname, email, phone, codigo FROM MyGuests ORDER BY lastname";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>Email</th><th>phone</th><th>Código</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['firstname']}</td>
                <td>{$row['lastname']}</td>
                <td>{$row['email']}</td>
                <td>{$row['phone']}</td>
                <td>{$row['codigo']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No hay datos.";
}

mysqli_close($conn);
?>

