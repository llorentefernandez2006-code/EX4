<?php
include "autenticacion.php";
include "recoge.php";
include "config.php";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully<br>";

// Valores a actualizar
$lastname = "Sanchez";
$id = 2;

// Prepared statement correcto
$stmt = $conn->prepare(
    "UPDATE MyGuests SET lastname = ? WHERE id = ?"
);
$stmt->bind_param("si", $lastname, $id);

if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        echo "Apellido actualizado correctamente para el usuario con ID $id.";
    } else {
        echo "No se realizaron cambios. El ID puede no existir o el apellido ya era '$lastname'.";
    }
} else {
    echo "Error al actualizar: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
