<?php
include "autenticacion.php";
include "recoge.php";

$lastname = recoge('lastname');
if (!$lastname) {
    die("Debes indicar un apellido.");
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

$stmt = $conn->prepare("SELECT id, firstname, lastname, email, codigo FROM MyGuests WHERE lastname = ?");
$stmt->bind_param("s", $lastname);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>Email</th><th>Código</th></tr>";
    while($row = $result->fetch_assoc()) {
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
    echo "No se encontraron resultados para el apellido '$lastname'.";
}

$stmt->close();
$conn->close();
?>