<!DOCTYPE html>
<html lang="pt-br">
<head>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/index.css" rel="stylesheet">


  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script src="../libs/bootstrap/js/bootstrap.js"></script>

  <script src="controller/javascriptfunctions.js"></script>
  
  

  <meta charset="UTF-8">
  <title>Consulta Processos</title>

</head>
<?php
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página

?>

<body>
  <!-- Menu topo -->
  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a href="index.php">Inicio</a></li>
          <li class="active"><a href="sobre.php">Sobre</a></li>
          <li><a href="contato/feedbackMail.php">Contato</a></li>
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
    <h1>Sobre</h1>
    <hr>

    <p class="lead text-left"><b>O sistema tem como função auxiliar advogados e afins a gerenciar seus processos de maneira fácil e intuitiva. </b></p>

    <p class="text-left"><b>Algumas funcionalidades:</b></p>
    <ul>
      <li><b>Acesse seus processos de qualquer lugar com acesso a internet;</b></li>
      <li><b>Acompanhe o andamento dos seus processos em tempo real;</b></li>
      <li><b>Receba alertas quando alguma movimentação importante ocorrer.</b></li>
    </ul>

    <hr>

    <p class="text-left"><b>Esse sistema foi densenvolvido por alunos da UFCG para a disciplina Projeto 1</b></p>
    <p class="text-left"><b>Alunos desenvolvedores:</b></p>

    <ul>
      <li><p>Elias Paulino Medeiros</p></li>
      <li><p>Henrique César Florêncio</p></li>
      <li><p>Rodolfo Moraes Martins</p></li>
    </ul>
    
    <p class="text-left"><b>Professor responsável:</b></p>

    <ul>
      <li><p>Kyller Costa Gorgônio</p></li>
    </ul>

    <p class="text-left"><b>Cliente:</b></p>

    <ul>
      <li><p>José Gildo Araújo</p></li>
    </ul>

      <hr>

      <footer>
        <p>© UFCG 2014</p>
      </footer>
    </div> <!-- /container -->


  </body></html>
