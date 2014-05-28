<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="../../assets/ico/favicon.ico">
  <link   href="css/bootstrap.min.css" rel="stylesheet">
  <script src="controller/admin_create_controller.js"></script>
  <script src="view/create_view.js"></script>
  <script language="JavaScript" type="text/javascript" src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="model/database.php"></script>
  <script type="text/javascript" src="js/jquery-1.2.6.pack.js"></script>
  <script type="text/javascript" src="js/jquery.maskedinput-1.1.4.pack.js"/></script>
  <title>Gerenciador de Processos</title>
</head>
<?php
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePaginaAdmin(); // Chama a função que protege a página

?>


<body>



  <!-- Menu topo -->
  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a href="admin-home.php">Home</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a>
            <?php
            echo "Olá, " . utf8_encode($_SESSION['usuarioNome']);
            ?>
          </a></li>
          <li><a href="logout.php">Sair</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>


  <!-- Logo -->
  <div class="jumbotron">
    <div class="container">
      <h1>Gerenciador de Processos</h1>
      <p>Gerencie os usuários do sistema</p>
    </div>
  </div>


  <div class="container theme-showcase" role="main">

   <div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">

      <h2>Registre um novo usuário</h2>
      <hr class="colorgraph">
      <div class="row">

        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <input id="usuario" type="text" name="usuario" class="form-control input-lg" placeholder="Login" tabindex="1">
          </div>

        </div>

        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <input id="senha" type="text" name="campo_senha" class="form-control input-lg" placeholder="Senha" tabindex="2">
          </div>
        </div>
      </div>

      <div class="form-group">
        <input type="text" name="nome" id="nome" class="form-control input-lg" placeholder="Nome do Usuário" tabindex="3">
      </div>

      <div class="form-group">
        <input type="text" name="email" id="email" class="form-control input-lg" placeholder="Email" tabindex="4">
      </div>

      <div class="row">

        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
             <select name="nivel" type="text" id="nivel" class="form-control input-lg" placeholder="Número do Processo" tabindex="5">
              <option value="-1">Nível</option>
              <option value="1">Usuário</option>
              <option value="2">Admin</option>
            </select>
          </div>
          
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <select name="ativo" type="text" id="ativo" class="form-control input-lg" placeholder="Número do Processo" tabindex="6">
              <option value="-1">Status</option>
              <option value="1">Ativo</option>
              <option value="0">Inativo</option>
            </select>
          </div>
        </div>
      </div>
      
      <hr class="colorgraph">
      <div class="row">
        <div class="col-xs-12 col-md-6"><a href="admin-home.php" value="Cancelar" class="btn btn-default btn-block btn-lg">Cancelar</a></div>
        <div class="col-xs-12 col-md-6"><button type="submit" onclick="registra_usuario();" class="btn btn-success btn-block btn-lg">Registrar</button></div>
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
