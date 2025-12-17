<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = $_POST["usuario"] ?? "";
    $clave = $_POST["clave"] ?? "";

    if ($usuario === "admin" && $clave === "P4ssw0rd") {
        $_SESSION["autenticado"] = true;
        header("Location: index.php");
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>

<form method="post">
    <label>Usuario: <input type="text" name="usuario"></label><br>
    <label>Contraseña: <input type="password" name="clave"></label><br>
    <input type="submit" value="Identificar">
    <input type="reset" value="Borrar">
</form>

<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>