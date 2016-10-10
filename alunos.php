
<!DOCTYPE html>
<head>

	<meta charset="utf-8">
</head>
<body>

<?php

	echo "<form method='POST' action='oficial.php'>";
		
        //echo "<br>".$key.', '.$value;
		//ECHO "<input type='submit' name='botao' value='$id'>";
		ECHO "<input type='text name='campus' required>";
		ECHO "<input type='text name='predio' required>";
		ECHO "<input type='text name='sala' required>";
		ECHO "<input type='text name='data' required>";
		ECHO "<input type='text name='valor' required>";
		echo "<input type='submit' id='enviar' name='enviar2' value='enviar'>";
		echo "</form>";
   

?>


</body>
</html>