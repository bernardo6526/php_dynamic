<?php    
session_start();


print_r($_POST);


?>

<html>

<form method="post" action="resultados2.php">
    <input type="text" name="faculdade" value=<?php echo $_SESSION['faculdade'] ?> readonly>
    <input type="text" name="campus" value=<?php echo $_SESSION['campus'] ?> readonly>
    <input type="text" name="predio" value=<?php echo $_SESSION['predio'] ?> readonly>
    <input type="text" name="sala" value=<?php echo $_SESSION['sala'] ?> readonly>
    <input type="text" name="data" value=<?php echo $_SESSION['data'] ?> readonly>
    <button type="submit">Enviar</button>
</form>

</html>