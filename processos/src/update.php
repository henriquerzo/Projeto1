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
  <script src="model/database.php"></script>
  <title>Gerenciador de Processos</title>
</head>

<?php
require 'model/database.php';

$id = null;
if ( !empty($_GET['id'])) {
  $id = $_REQUEST['id'];
}

if ( null==$id ) {
  header("Location: home.php");
}

if ( !empty($_POST)) {
 
        // keep track post values
  $observacoes = $_POST['observacoes'];
  
        // validate input
  $valid = true;         
        // update data
  if ($valid) {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE processos  set observacoes = ? WHERE id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($observacoes,$id));
    Database::disconnect();
    header("Location: home.php");
  }
} else {
  $pdo = Database::connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "SELECT * FROM processos where id = ?";
  $q = $pdo->prepare($sql);
  $q->execute(array($id));
  $data = $q->fetch(PDO::FETCH_ASSOC);
  $numeroProcesso = $data['numeroProcesso'];
  $tribunal = $data['tribunal'];
  $situacao = $data['situacao'];
  $cliente = $data['cliente'];
  $observacoes = $data['observacoes'];
  Database::disconnect();
}
?>

<body>

  

  <!-- Menu topo -->
  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class=""><a href="home.php">Home</a></li>
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
   
   <div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
      <form role="form" action="update.php?id=<?php echo $id?>" method="post">
        <h2>Edite um processo</h2>
        <hr class="colorgraph">
        <div class="row">

          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
              <input type="text" name="numeroProcesso" disabled="disabled" id="numeroProcesso" class="form-control input-lg" placeholder="Número do Processo" tabindex="1" value="<?php echo !empty($numeroProcesso)?$numeroProcesso:'';?>">
            </div>
          </div>

          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
              <select name="tribunal" type="text" disabled="disabled" id="tribunal_selected" class="form-control input-lg" placeholder="Número do Processo" tabindex="2">
                <option value="<?php echo !empty($tribunal)?$tribunal:'';?>"> T. Superior Eleitoral</option>
                <option>T. Regional Eleitoral</option>
                <option>T. Superior Federal</option>
              </select>
            </div>
          </div>
        </div>

        <div class="form-group">
          <input type="text" name="cliente" id="cliente" disabled="disabled" class="form-control input-lg" placeholder="Nome do Cliente" tabindex="3"
          value="<?php echo !empty($cliente)?$cliente:'';?>">
        </div>

        <div class="form-group">
          <textarea class="input-xlarge span5 form-control input-lg" id="observacoes" name="observacoes" rows="10" type="text" placeholder="Observações" tabindex="4"><?php echo !empty($observacoes)?$observacoes:'';?> </textarea>
        </div>
        
        <hr class="colorgraph">
        <div class="row">
          <div class="col-xs-12 col-md-6"><a href="home.php" value="Cancelar" class="btn btn-default btn-block btn-lg">Cancelar</a></div>
          <div class="col-xs-12 col-md-6"><button type="submit" class="btn btn-success btn-block btn-lg">Registrar</button></div>
        </div>
      </form>
      <hr>

      <footer>
        <p>© UFCG 2014</p>
      </footer>
    </div>
  </div>
  


</div>
</body>
</html>


