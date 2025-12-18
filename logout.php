<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

if ($_POST["confirmar"] === "sí") {
    session_destroy();
    header("Location: login.php");
    exit;
}

if ($_POST["confirmar"] === "no") {
    header("Location: index.php");
    exit;
}
}
?>

<form method="post">
<p>¿Seguro que quiere desconectarse?</p>
<button type="submit" name="confirmar" value="sí">Sí</button>
<button type="submit" name="confirmar" value="no">No</button>
</form>
