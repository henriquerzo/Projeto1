
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
  <link   href="css/home.css" rel="stylesheet">

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <!-- <script type="text/javascript" language="javascript" src="js/jquery.js"></script>
  <script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script> 
  -->

  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  
  <script type="text/javascript" language="javascript" src="controller/admin_home_controller.js"></script>
  <script type="text/javascript" language="javascript" src="view/admin_home_view.js"></script>
  <title>Gerenciador de Processos</title>
</head>
<?php
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePaginaAdmin(); // Chama a função que protege a página

?>

<body onload="run_search_usuarios()">
  <!-- Menu topo -->
  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="admin-home.php">Home</a></li>
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

    <!-- Botoes de pesquisar e cadastrar -->
    <div class="page-header container theme-showcase">
     <form class="navbar-form navbar-right">
      <input type="text" class="form-control" placeholder="Pesquisar..." id="seach_field">
      <a href="admin-create.php" class="btn btn-success">+ Adicionar Usuário</a>
    </form>
  </div>


  <div class="container">
    <!-- Lista de processos -->
    <div class="container">
      <div id="tabela_processos_usuario" class="row"> 
        <table class="table table-striped table-bordered pretty" cellpadding="0" cellspacing="0" border="0" class="display" id="tab_processos" width="100%">  
        </table>
      </div>
    </div> <!-- /container -->

    <hr>

    <footer>
      <p>© UFCG 2014</p>
    </footer>
  </div> <!-- /container -->

</div>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    
    

  </body></html>
 