<?php
if(isset($_POST['enviar2']))
{


$campus = $_POST['campus'];
$predio = $_POST['predio'];
$sala = $_POST['sala'];
$data = $_POST['data'];
$valor = $_POST['valor'];
ECHO $campus;



} 
?>
<!DOCTYPE html>
<head>

	<meta charset="utf-8">
</head>
<body>
<form action="index.php" method="get">
<?php
		ECHO "Campus:<input type='text' name='campus' value='$campus' readonly><br>";
		ECHO "Predio:<input type='text' name='predio' value='$predio' readonly><br>";
		ECHO "Sala:<input type='text' name='sala' value='$sala' readonly><br>";
		ECHO "Data:<input type='text' name='data' value='$data' readonly><br>";
		ECHO "Valor:<input type='text' name='valor' value='$valor' readonly><br>";
		echo "<input type='submit' id='enviar' name='enviar' value='enviar'>";
		

   

?>
</form>

</body>
</html>