<?php
if(isset($_post['enviar2']))
{


$campus = $_post['campus'];
$predio = $_post['predio'];
$sala = $_post['sala'];
$data = $_post['data'];
$valor = $_post['valor'];
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
		ECHO "Campus:<input type='text' name='campus' value='$campus' readonly='readonly'><br>";
		ECHO "Predio:<input type='text' name='predio' value='$predio' readonly='readonly'><br>";
		ECHO "Sala:<input type='text' name='sala' value='$sala' readonly='readonly'><br>";
		ECHO "Data:<input type='text' name='data' value='$data' readonly='readonly'><br>";
		ECHO "Valor:<input type='text' name='valor' value='$valor' readonly='readonly'><br>";
		echo "<input type='submit' id='enviar' name='enviar' value='enviar'>";
		

   

?>
</form>

</body>
</html>