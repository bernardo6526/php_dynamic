<html>

<head>
    <title>Form</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
            <form method="post" action="resultados.php">
            
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