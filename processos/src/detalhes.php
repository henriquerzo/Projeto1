

<html lang="pt-br">
	<head>
		  <link href="css/bootstrap.min.css" rel="stylesheet">
		  <meta charset="utf-8">
		  <meta http-equiv="X-UA-Compatible" content="IE=edge">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <meta name="description" content="">
		  <meta name="author" content="">
		  <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

		  <title>Detalhes</title>
	</head>

<body>
  <!-- Menu topo -->
  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="home.php">Home</a></li>
          <li><a href="#about">Sobre</a></li>
          <li><a href="contato/feedbackMail.php">Contato</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="../../control/logout.php">Sair</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>

  <div id="detalhes" class="jumbotron">
    <div class="container">
      <h1>Detalhes</h1>
      <p>Acompanhe a situação dos seus processos</p>
    </div>
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
	            include "classes_pull/TSE_PULL.php";
	            	$numeroProcesso = 0;
     				$array = array();
    				if ( !empty($_GET['numeroProcesso'])) {
        				$numeroProcesso = $_REQUEST['numeroProcesso'];
        				$obj = new TSE_PULL($numeroProcesso);
						$obj->pull();
						$GLOBALS['array'] = $obj->getListaFases();
						for ($i=0; $i < count($array); $i++) { 
							echo '<tr>';
	              			echo '<td>'. $array[$i]->getDate() . '</td>';
	              			echo '<td>'. $array[$i]->getNome() . '</td>';
	              			echo '</tr>';
						}	
   					 }
	            	function getFase(){
	            		return $GLOBALS['array'];
	            	}
	            
	            ?>
	          </tbody>
	        </table>
	</body>
</html>
