<!DOCTYPE html>
<html lang="pt">
<head>
  <title>Validation</title>
  <meta charset="utf-8">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.js"></script>
  <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
  
  <script type="text/javascript">
  
jQuery.validator.addMethod("verificaCPF", function(value, element) {
    value = value.replace('.','');
    value = value.replace('.','');
    cpf = value.replace('-','');
    while(cpf.length < 11) cpf = "0"+ cpf;
    var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
    var a = [];
    var b = new Number;
    var c = 11;
    for (i=0; i<11; i++){
        a[i] = cpf.charAt(i);
        if (i < 9) b += (a[i] * --c);
    }
    if ((x = b % 11) < 2) { a[9] = 0 } else { a[9] = 11-x }
    b = 0;
    c = 11;
    for (y=0; y<10; y++) b += (a[y] * c--);
    if ((x = b % 11) < 2) { a[10] = 0; } else { a[10] = 11-x; }
    if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg)) return false;
	
	
	verifica = false;
		
	jQuery.ajax({
        url: 'verificacpf.php?cpf='+cpf,
        async: false,
        success: function(data) {
           if(data == 0) verifica = true; 
       }});


//	$.get( "verificacpf.php", {cpf : cpf}, function( data ) {
//		if ( data==0 )
// 			verifica = true;
//	});

    return verifica;
	
}, "Informe um CPF válido.");  



    function init()
    {
      $("#form").validate({
        rules:
        {
            cpf:{
				required: true, 
				minlength: 11,
				verificaCPF: true
			}
          	  
        },
		messages: {
            cpf: {
                required: "Digite o CPF",
                minlength: "CPF deve ter 11 digitos",
				verificaCPF: "CPF inválido ou já cadastrado",
            }
		}
      });
    }
    $(document).ready(init);
	
	
  </script>
</head>

<body>

  <form id="form">
    <p>
        <label for="cpf">CPF</label>
        <input type="text" name="cpf" id="cpf" />
    </p>
  </form>

</body>
</html>