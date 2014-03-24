<!DOCTYPE html>
<html lang="pt-br">
	<head>
		
		<link href="css/consulta.css" rel="stylesheet">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-responsive.css" rel="stylesheet">
		<link href="css/bootstrap-select.min.css" rel="stylesheet">

		
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/bootstrap-select.min.js"></script>

		
		<script src="controller/javascriptfunctions.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="../libs/bootstrap/js/bootstrap.js"></script>
 		
		<meta charset="UTF-8">
		<title>Consulta Processos</title>

	</head>

<body onload="run_search_processos_usuario()">
  <!-- Menu topo -->
  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a href="#contact">Conheça nossa empresa</a></li>
          <li><a href="contato/feedbackMail.php">Contato</a></li>
        </ul>

      </div><!--/.nav-collapse -->
    </div>
  </div>
			


  <!-- Logo -->
  <div class="jumbotron">
    <div class="container">
      <h1>MaisProcessos</h1>
      <p>Sistema de monitoramento e gerência de processos</p>
    </div>
  </div>	

	<div id="login_content">
		Usuario <input type="text" name="usuario" />
		Senha <input type="password" name="senha" />
		<button id="btn_login" onclick="validarSenha();" >Acessar</button> 
	</div>



    <hr>

    <footer>
      <p>© UFCG 2014</p>
    </footer>
  </div> <!-- /container -->

</div>
