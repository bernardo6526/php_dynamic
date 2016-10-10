<?php
include('arrays.php');
?>
<!DOCTYPE html>
<head>

	<meta charset="utf-8">
</head>
<body>
<form action="index.php" method="get">
<?php

 $id = 0;

foreach($alunos as $key => $value)
	{
		
        echo "<br>".$key.', '.$value;
		ECHO "<input type='submit' name='botao' value='$id'>";
		ECHO "<input type='text name='campus'>'";
		ECHO "<input type='text name='predio'>'";
		ECHO "<input type='text name='sala'>'";
		ECHO "<input type='text name='data'>'";
		ECHO "<input type='text name='valor'>'";
		
		$id++;


    }
   

?>
</form>

</body>
</html>