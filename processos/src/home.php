
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

  <script src="controller/home_controller.js"></script>
  <script type="text/javascript" language="javascript" src="js/jquery.js"></script>
  <script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script> 

  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  
  <script type="text/javascript" language="javascript" src="controller/home_controller.js"></script>
  <script type="text/javascript" language="javascript" src="view/home_view.js"></script>
  <title>Gerenciador de Processos</title>
</head>

<body onload="run_search_processos_usuario()">
  <!-- Menu topo -->
  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="home.php">Home</a></li>
          <li><a href="#about">Sobre</a></li>
          <li><a href="#contact">Contato</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="controller/logout.php">Sair</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>



  <!-- Logo -->
  <div class="jumbotron">
    <div class="container">
      <h1>Gerenciador de Processos</h1>
      <p>Gerencie e acompanhe a situação dos seus processos</p>
    </div>
  </div>

  <div class="container theme-showcase" role="main">

    <!-- Botoes de pesquisar e cadastrar -->
    <div class="page-header container theme-showcase">
      <form class="navbar-form navbar-left">
       <a href="#" class="btn btn-warning">Atualizar Processos</a>
     </form>
     <form class="navbar-form navbar-right">
      <input type="text" class="form-control" placeholder="Pesquisar..." id="seach_field">
      <a href="create.php" class="btn btn-success">+ Adicionar Processo</a>
    </form>
  </div>


  <div class="container">
    <!-- Lista de processos -->
    <div class="container">
      <div id="data_ultima_atualizacao"> </div>
      <div id="tabela_processos_usuario" class="row">  
          <table class="table table-striped table-bordered" cellpadding="0" cellspacing="0" border="0" class="display" id="tab_processos" width="100%">  
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
 