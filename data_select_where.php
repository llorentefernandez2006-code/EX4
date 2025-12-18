<?php
include "autenticacion.php";
include "recoge.php";
include "config.php";

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Comprobar conexión
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully<br>";

// Valor del apellido (ejemplo fijo o desde formulario)
$lastname = "Doe";

// Consulta preparada correcta
$stmt = $conn->prepare(
    "SELECT id, firstname, lastname, email, phone, codigo 
     FROM MyGuests 
     WHERE lastname = ?"
);

$stmt->bind_param("s", $lastname);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>phone</th>
            <th>Código</th>
          </tr>";

    while ($row = $result->fetch_assoc()) {
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
    echo "No se encontraron resultados para el apellido '$lastname'.";
}

$stmt->close();
$conn->close();
?>
