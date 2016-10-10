<?php    
session_start();
$_SESSION['faculdade'] = $_POST['faculdade'];
$_SESSION['campus'] = $_POST['campus'];
$_SESSION['predio'] = $_POST['predio'];
$_SESSION['sala'] = $_POST['sala'];
$_SESSION['data'] = $_POST['data'];



?>

<html>
<head><meta charset="utf-8"></head>
<form method="post" action="index.php">
    Faculdade:<input type="text" name="faculdade" value=<?php echo $_SESSION['faculdade'] ?> readonly><br>
    Campus:<input type="text" name="campus" value=<?php echo $_SESSION['campus'] ?> readonly><br>
    Prédio:<input type="text" name="predio" value=<?php echo $_SESSION['predio'] ?> readonly><br>
    Sala:<input type="text" name="sala" value=<?php echo $_SESSION['sala'] ?> readonly><br>
    Data:<input type="text" name="sala" value=<?php echo $_SESSION['data'] ?> readonly><br>
    Nome do Aluno:<input type="text" name="nome" required><br>
    CPF:<input type="text" name="cpf" required><br>
    <button type="submit">Enviar</button>
</form>

</html>