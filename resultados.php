<?php    
session_start();
$_SESSION['faculdade'] = $_POST['faculdade'];
$_SESSION['campus'] = $_POST['campus'];
$_SESSION['predio'] = $_POST['predio'];
$_SESSION['sala'] = $_POST['sala'];
$_SESSION['data'] = $_POST['data'];



?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8"></head>
<form method="post" action="index.php" id="form1">
    Faculdade:<input type="text" name="faculdade" value=<?php echo $_SESSION['faculdade'] ?> readonly><br>
    Campus:<input type="text" name="campus" value=<?php echo $_SESSION['campus'] ?> readonly><br>
    Prédio:<input type="text" name="predio" value=<?php echo $_SESSION['predio'] ?> readonly><br>
    Sala:<input type="text" name="sala" value=<?php echo $_SESSION['sala'] ?> readonly><br>
    Data:<input type="text" name="sala" value=<?php echo $_SESSION['data'] ?> readonly><br>
    Nome do Aluno:<input type="text" name="nome" required><br>
    CPF:<input type="text" name="cpf" onBlur="ValidarCPF(form1.cpf);" 
onKeyPress="MascaraCPF(form1.cpf);" maxlength="14" required><br>
    <button type="submit">Enviar</button>
</form>



    <script type="text/javascript">
    //adiciona mascara ao CPF
function MascaraCPF(cpf){
        if(mascaraInteiro(cpf)==false){
                event.returnValue = false;
        }       
        return formataCampo(cpf, '000.000.000-00', event);
}

//valida o CPF digitado
function ValidarCPF(Objcpf){
        var cpf = Objcpf.value;
        exp = /\.|\-/g
        cpf = cpf.toString().replace( exp, "" ); 
        var digitoDigitado = eval(cpf.charAt(9)+cpf.charAt(10));
        var soma1=0, soma2=0;
        var vlr =11;

        for(i=0;i<9;i++){
                soma1+=eval(cpf.charAt(i)*(vlr-1));
                soma2+=eval(cpf.charAt(i)*vlr);
                vlr--;
        }       
        soma1 = (((soma1*10)%11)==10 ? 0:((soma1*10)%11));
        soma2=(((soma2+(2*soma1))*10)%11);

        var digitoGerado=(soma1*10)+soma2;
        if(digitoGerado!=digitoDigitado)        
                alert('CPF Invalido!');         
}

//valida numero inteiro com mascara
function mascaraInteiro(){
        if (event.keyCode < 48 || event.keyCode > 57){
                event.returnValue = false;
                return false;
        }
        return true;
}


    </script>
</html>