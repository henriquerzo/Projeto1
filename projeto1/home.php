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
  <script src="js/bootstrap.min.js"></script>
  <script src="database.php"></script>
  <title>Gerenciador de Processos</title>
</head>

<body>
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
          <li><a href="../navbar-fixed-top/">Sair</a></li>
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
      <input type="text" class="form-control" placeholder="Pesquisar...">
      <a href="create.php" class="btn btn-success">+ Adicionar Processo</a>
    </form>
  </div>


  <div class="container">
    <!-- Lista de processos -->
    <div class="container">
      <div class="row">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>                
              <th>Processo</th>
              <th>Tribunal</th>
              <th>Situação</th>
              <th>Cliente</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include 'database.php';
            $pdo = Database::connect();
            $sql = 'SELECT * FROM processos ORDER BY id';
            foreach ($pdo->query($sql) as $row) {
              echo '<tr>';
              echo '<td>'. $row['numeroProcesso'] . '</td>';
              echo '<td>'. $row['tribunal'] . '</td>';
              echo '<td>'. $row['situacao'] . '</td>';
              echo '<td>'. $row['cliente'] . '</td>';
              echo '<td width=250>';
              echo '<a class="btn btn-info btn-xs" href="#">Detalhes</a>';
              echo ' ';
              echo '<a class="btn btn-primary btn-xs" href="#">Editar</a>';
              echo ' ';
              echo '<a class="btn btn-danger btn-xs" href="delete.php?id='.$row['id'].'">Deletar</a>';
              echo '</td>';
              echo '</tr>';
            }
            Database::disconnect();
            ?>
          </tbody>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>


  </body></html>