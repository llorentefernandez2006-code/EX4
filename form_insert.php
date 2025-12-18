<form action="data_insert_single.php" method="post">
    Firstname: <input type="text" name="firstname" required><br>
    Lastname: <input type="text" name="lastname" required><br>
    Email: <input type="email" name="email" required><br>
    Código: <input type="text" name="codigo"  pattern="u[0-9]{5}" maxlength="6" required ><br>
    <input type="submit" value="Insertar">
</form>