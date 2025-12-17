 <?php
 include "autenticacion.php";
 include "recoge.php";
$servername = "localhost";
$username = "DLF";
$password = "DLF";
$dbname = "bd_w3_DLF2";

$firstname = recoge('firstname');
$lastname = recoge('lastname');
$email = recoge('email');
$codigo = recoge('codigo');

if (!$firstname || !$lastname || !$email || !$codigo) { 
  die("Todos los campos son obligatorios."); } // Crear conexión 
$conn = mysqli_connect($servername, $username, $password, $dbname); 
if (!$conn) { 
  die("Connection failed: " . mysqli_connect_error()); 
} 
echo "Connected successfully<br>";
$sql = "INSERT INTO MyGuests (firstname, lastname, email, codigo) VALUES (?, ?, ?, ?)"; 
$stmt = $conn->prepare($sql);

if ($stmt === false) { 
  die("Error al preparar la consulta: " . $conn->error); 
  } 
  // Asociar parámetros 
  $stmt->bind_param("ssss", $firstname, $lastname, $email, $codigo); 

  // Ejecutar 
  if ($stmt->execute()) { 
    echo "Nuevo registro creado correctamente."; 
    } else { 
      echo "Error al insertar: " . $stmt->error; 
      } 
      $stmt->close(); $conn->close(); ?> 