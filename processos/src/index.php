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

<body>
  <!-- Menu topo -->
  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a href="#about">Sobre</a></li>
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

    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
          <h1 class="text-center login-title">Entre para acessar seus processos</h1>
          <div class="account-wall">
            <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
            alt="">
            <div class="form-signin">
              <div id="login_content">
                <input type="text" class="form-control" placeholder="Usuário" name="usuario" required autofocus>
                <input type="password" class="form-control" placeholder="Senha" name="senha" required>
                <button class="btn btn-lg btn-primary btn-block" id="btn_login" onclick="validarSenha();">Entrar</button>
                </div>
                <label class="checkbox pull-left">
                  <input type="checkbox" value="lembrar">
                  Lembrar
                </label>
                <span class="clearfix"></span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <hr>

      <footer>
        <p>© UFCG 2014</p>
      </footer>
    </div> <!-- /container -->


  </body></html>
