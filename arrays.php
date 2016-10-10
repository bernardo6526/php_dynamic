<?php


    $file = fopen("nomes.txt", "r"); 

    $i = 0;
    while (!feof($file)) {
        $nomes[] = fgets($file);
    }
    fclose($file);

    $file3 = fopen("cpf.txt", "r");

    $i = 0;
    while (!feof($file3)) {
        $cpf[] = fgets($file3);
    }
    fclose($file3);

    $alunos = array_combine($nomes, $cpf);
    $cont = 0;
    foreach($alunos as $key => $value){
        //echo $key.', '.$value.'<br /><br />';
       // if($cont == 0){ECHO "<br>";}
       // $cont++;
        
    }

?>