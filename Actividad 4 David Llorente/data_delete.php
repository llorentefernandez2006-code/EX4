 <?php
 include "autenticacion.php";
 include "recoge.php";

 $id = recoge('id');
if (!$id) {
    die("Debes indicar un ID válido.");
}

$servername = "localhost";
$username = "DLF";
$password = "DLF";
$dbname = "bd_w3_DLF2";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Usamos prepared statement para mayor seguridad
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