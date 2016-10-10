<html>

<head>
    <title>Form</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
    return true;
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
        verificaCPF: "CPF inválido" 
            }
    }
      });
    }
    $(document).ready(init);
  
  
    </script>

    <meta charset="UTF-8">

    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">

    <style>
        body {
            font: 400 15px Lato, sans-serif;
            line-height: 1.8;
            color: #818181;
        }

        .jumbotron {
            font-family: Montserrat, sans-serif;
        }
    </style>
</head>


<body>
        <div class="jumbotron text-center">
            <h1>Formulário</h1>
        </div>

    <div class="container">
        <div class="well well-lg">
            <form method="post" action="resultados.php" id="form">
            
              <div class="form-group">
                <label for="facul">Nome da faculdade:</label>
                <input type="text" class="form-control" id="facnome" name="faculdade">
              </div>
              <div class="form-group">
                <label for="camp">Campus:</label>
                <input type="text" class="form-control" id="camp" name="campus">
              </div>
              <div class="form-group">
                <label for="building">Prédio:</label>
                <input type="text" class="form-control" id="building" name="predio">
              </div>
              <div class="form-group">
                <label for="room">Sala:</label>
                <input type="text" class="form-control" id="room" name="sala">
              </div>
              <div class="form-group">
                <label for="room">Data:</label>
                <input type="date" class="form-control" id="room" name="data">
              </div>
              <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>
</body>

</html>