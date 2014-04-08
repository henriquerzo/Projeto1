<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<!-- CSS -->
		<link href="css/consulta.css" rel="stylesheet">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-responsive.css" rel="stylesheet">
		<link href="css/bootstrap-select.min.css" rel="stylesheet">

		<!-- LIBRARIES -->
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/bootstrap-select.min.js"></script>

		<!-- VIEW -->
		<script src="controller/javascriptfunctions.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="../libs/bootstrap/js/bootstrap.js"></script>
 		
		<meta charset="UTF-8">
		<title>Consulta Processos</title>

	</head>
	<body >
		
		<div id= "main_content">

			<div id="top_bar"  style="text-align:center; padding: 10px !important;">
          		<h1>Consulta Processos</h1>
        	</div>

			<div id="login_content">
				Usuario <input type="text" name="usuario" />
				Senha <input type="password" name="senha" />
				<button id="btn_login" onclick="validarSenha();" >Acessar</button> 
			</div>

			<div id="content">
				<img src="images/Justice.jpg" alt="Justice" width="500" height="500">
			</div>
		</div>
	</body>

</html>
