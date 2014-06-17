<?php
//  Configurações do Script
// ==============================
$_SG['conectaServidor'] = true;    // Abre uma conexão com o servidor MySQL?
$_SG['abreSessao'] = true;         // Inicia a sessão com um session_start()?

$_SG['caseSensitive'] = false;     // Usar case-sensitive? Onde 'thiago' é diferente de 'THIAGO'

$_SG['validaSempre'] = true;       // Deseja validar o usuário e a senha a cada carregamento de página?
// Evita que, ao mudar os dados do usuário no banco de dado o mesmo contiue logado.

$_SG['servidor'] = '127.0.0.1';    // Servidor MySQL
$_SG['usuario'] = 'root';          // Usuário MySQL
$_SG['senha'] = '';            // Senha MySQL
$_SG['banco'] = 'projeto1bd';      // Banco de dados MySQL

$_SG['paginaLogin'] = 'index.php'; // Página de login

$_SG['tabela'] = 'usuarios';       // Nome da tabela onde os usuários são salvos
// ==============================
//include 'model/database.php';

//$pdo = Database::connect();

// ======================================
//   ~ Não edite a partir deste ponto ~
// ======================================

// Verifica se precisa fazer a conexão com o MySQL
if ($_SG['conectaServidor'] == true) {
	$_SG['link'] = mysqli_connect($_SG['servidor'], $_SG['usuario'], $_SG['senha'], $_SG['banco']);
}

//if (mysqli_connect_errno()){
  //exit("Script parou!!");
//}



// Verifica se precisa iniciar a sessão
if ($_SG['abreSessao'] == true) {
	session_start();
}

/**
* Função que valida um usuário e senha
*
* @param string $usuario - O usuário a ser validado
* @param string $senha - A senha a ser validada
*
* @return bool - Se o usuário foi validado ou não (true/false)
*/
function validaUsuario($usuario, $senha) {
	global $_SG;

	$cS = ($_SG['caseSensitive']) ? 'BINARY' : '';

// Usa a função addslashes para escapar as aspas
	$nusuario = addslashes($usuario);
	$nsenha = addslashes($senha);

// Monta uma consulta SQL (query) para procurar um usuário
	$sql = "SELECT `id`, `nome`, `nivel` FROM `usuarios` WHERE (`usuario` = '". $nusuario ."') AND (`senha` = '". sha1($nsenha) ."') AND (`ativo` = 1) LIMIT 1";
	$query = mysqli_query($_SG['link'], $sql);
/*$date_table = array();
foreach ($query as $row) {
	array_push($date_table, $row);
}

echo json_encode($date_table);
*/

$resultado = mysqli_fetch_assoc($query);

// Verifica se encontrou algum registro
if (empty($resultado)) {
// Nenhum registro foi encontrado => o usuário é inválido
	return 0;

} else {
// O registro foi encontrado => o usuário é valido

// Definimos dois valores na sessão com os dados do usuário
$_SESSION['usuarioID'] = $resultado['id']; // Pega o valor da coluna 'id do registro encontrado no MySQL
$_SESSION['usuarioNome'] = $resultado['nome']; // Pega o valor da coluna 'nome' do registro encontrado no MySQL
$_SESSION['usuarioNivel'] = $resultado['nivel']; // Pega o valor da coluna 'nivel' do registro encontrado no MySQL

// Verifica a opção se sempre validar o login
if ($_SG['validaSempre'] == true) {
// Definimos dois valores na sessão com os dados do login
	$_SESSION['usuarioLogin'] = $usuario;
	$_SESSION['usuarioSenha'] = $senha; 
}

//Retorna o nivel do usuario para indicar qual pagina ele tem acesso
return $_SESSION['usuarioNivel'];
}
}

/**
* Função que protege uma página
*/
function protegePagina() {
	global $_SG;

	if (!isset($_SESSION['usuarioID']) OR !isset($_SESSION['usuarioNome'])) {
// Não há usuário logado, manda pra página de login
		expulsaVisitante();
	} else if (!isset($_SESSION['usuarioID']) OR !isset($_SESSION['usuarioNome'])) {
// Há usuário logado, verifica se precisa validar o login novamente
		if ($_SG['validaSempre'] == true) {
// Verifica se os dados salvos na sessão batem com os dados do banco de dados
			if (!validaUsuario($_SESSION['usuarioLogin'], $_SESSION['usuarioSenha'])) {
// Os dados não batem, manda pra tela de login
				expulsaVisitante();
			}
		}
	}
}

/**
* Função que protege uma página do admin
*/
function protegePaginaAdmin() {
	protegePagina();
	if ($_SESSION['usuarioNivel'] != 2) {
		expulsaVisitante();
	}
}



/**
* Função para expulsar um visitante
*/
function expulsaVisitante() {
	global $_SG;

// Remove as variáveis da sessão (caso elas existam)
	unset($_SESSION['usuarioID'], $_SESSION['usuarioNome'], $_SESSION['usuarioLogin'], $_SESSION['usuarioSenha'], $_SESSION['usuarioNivel']);

// Manda pra tela de login
	header("Location: ".$_SG['paginaLogin']);
}
?>