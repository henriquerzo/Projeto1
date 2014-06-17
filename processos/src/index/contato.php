<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="../../assets/ico/favicon.ico">
  <link   href="../css/bootstrap.min.css" rel="stylesheet">
  <script language="JavaScript" type="text/javascript" src="../js/jquery.js"></script>
  <script src="../js/bootstrap.min.js"></script>

  <script src="../model/database.php"></script>

   <script src="../controller/mensagem_controller.js"></script>
  <title>Gerenciador de Processos</title>
</head>
<body>



  <!-- Menu topo -->
  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a href="../index.php">Inicio</a></li>
          <li><a href="sobre.php">Sobre</a></li>
          <li class="active"><a class="active" href="contato.php">Contato</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>


  <!-- Logo -->
  <div class="jumbotron">
    <div class="container">
      <h1>Gerenciador de Processos</h1>
      <p>Contato</p>
    </div>
  </div>


  <div class="container theme-showcase" role="main">

   <div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">

      <h2>Deixe uma mensagem</h2>
      <hr class="colorgraph">
      <div class="row">

      <div class="form-group">
        <input type="text" name="email" id="email" class="form-control input-lg" placeholder="Email" tabindex="1">
      </div>

      <div class="form-group">
        <textarea class="input-xlarge span5 form-control input-lg" id="mensagem" name="mensagem" rows="10" type="text" placeholder="Mensagem" tabindex="2"></textarea>
      </div>
      
      <hr class="colorgraph">
      <div class="row">
        <div class="col-xs-12 col-md-6"><a href="../index.php" value="Cancelar" class="btn btn-default btn-block btn-lg">Cancelar</a></div>
        <div class="col-xs-12 col-md-6"><button type="submit" onclick="registra_mensagem();" class="btn btn-success btn-block btn-lg">Enviar</button></div>
      </div>
      <hr>

      <footer>
        <p>© UFCG 2014</p>
      </footer>
    </div>

  </div>


</div>
</body>
</html>
