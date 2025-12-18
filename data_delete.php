<?php
include "autenticacion.php";
include "recoge.php";
include "config.php";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// ID a borrar (ejemplo)
$id = 3;

// Prepared statement correcto
$stmt = $conn->prepare("DELETE FROM MyGuests WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        echo "Usuario con ID $id borrado correctamente.";
    } else {
        echo "No existe ningún usuario con ese ID.";
    }
} else {
    echo "Error al borrar: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
