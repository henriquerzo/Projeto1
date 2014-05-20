

<html lang="pt-br">
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="../../assets/ico/favicon.ico">
	<script type="text/javascript" language="javascript" src="view/home_view.js"></script>

	<title>Detalhes</title>
</head>

<body>
	<!-- Menu topo -->
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="home.php">Home</a></li>
					<li><a href="sobreHome.php">Sobre</a></li>
					<li><a href="contato/feedbackMail.php">Contato</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="../../control/logout.php">Sair</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div>

	<div class="jumbotron">
		<div class="container">
			<h1>Gerenciador de Processos</h1>
			<p>Gerencie e acompanhe a situação dos seus processos</p>
		</div>
	</div>

	<div class="container theme-showcase" role="main">

		<div>
			<form role="form">
				<h2>Detalhes</h2>
				<hr class="colorgraph">
			</form>
		</div>

		<table class="table table-striped table-bordered">
			<thead>
				<tr>                
					<th>Data</th>
					<th>Fase</th>
				</tr>
			</thead>
			<tbody>
				<?php
				
					$lista_processos_pull = array();
					$numeroProcesso = $_REQUEST['numeroProcesso'];
					$tribunal = $_REQUEST['tribunal'];
			switch ($tribunal) {
            case 'T. Superior Eleitoral':
                include 'classes_pull/TSE_PULL.php';
                $obj = new TSE_PULL($numeroProcesso);
                $obj->pull();
                $lista_processos_pull = $obj->getListaFases();
                
                break;
            case 'TJ-PB':
                include 'classes_pull/TJPB_PULL.php';
                $obj = new TJPB_PULL($numeroProcesso);
                $obj->pull();
                $lista_processos_pull = $obj->getListaFases();
                
                break;
            case 'S. Tribunal Federal':
                include 'classes_pull/STF_PULL.php';
                $obj = new STF_PULL($numeroProcesso);
                $obj->pull();
                $lista_processos_pull = $obj->getListaFases();
                
                break;
            case 'T. Regional Federal':
                include 'classes_pull/TRF_PULL.php';
                $obj = new TRF_PULL($numeroProcesso);
                $obj->pull();
                $lista_processos_pull = $obj->getListaFases();
                
                break;
            case 'T. Regional Eleitoral':
                include 'classes_pull/TRE_PULL.php';
                $obj = new TRE_PULL($numeroProcesso);
                $obj->pull();
                $lista_processos_pull = $obj->getListaFases();
                
                break;
            case 'T. Regional Federal 5º Regiao':
                include 'classes_pull/TRF_REGIAO5_PULL.php';
                $obj = new TRF_REGIAO5_PULL($numeroProcesso);
                $obj->pull();
                $lista_processos_pull = $obj->getListaFases();
                
                break;
            default:
                # code...
                break;
        }

					for ($i=0; $i < count($lista_processos_pull); $i++) { 
						echo '<tr>';
						echo '<td>'. $lista_processos_pull[$i]->getDate() . '</td>';
						echo '<td>'. $lista_processos_pull[$i]->getNome() . '</td>';
						echo '</tr>';
					}	
				
				

				?>



			</tbody>

		</table>

		<hr class="colorgraph"> </hr>

		<table class="table table-striped table-bordered">
			<thead>
				<tr>                
					<th>Observações</th>
				</tr>
			</thead>
			<tbody>
				<?php
				require 'model/database.php';
				$numeroProcesso = null;
				if ( !empty($_GET['numeroProcesso'])) {
					$numeroProcesso = $_REQUEST['numeroProcesso'];
				}

				if ( null==$numeroProcesso ) {
					header("Location: index.php");
				} 
				else {
					$pdo = Database::connect();
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "SELECT * FROM processos where numeroProcesso = ?";
					$q = $pdo->prepare($sql);
					$q->execute(array($numeroProcesso));
					$data = $q->fetch(PDO::FETCH_ASSOC);
					Database::disconnect();
				}

				echo '<tr>';
				echo '<td nowrap=true> <p>' . str_replace("\n", "<br />", $data['observacoes']) . '</p></td>';
				echo '</tr>';
				?>


			</tbody>
		</table> 
		<hr class="colorgraph">

		<footer>
			<p>© UFCG 2014</p>
		</footer>
	</div>



</body>
</html>
