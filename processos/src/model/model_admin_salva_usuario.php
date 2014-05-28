<?php

include 'database.php';
include("../seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePaginaAdmin(); // Chama a função que protege a página

    if ( !empty($_POST)) {
        // keep track validation errors
        $numeroProcessoError = null;
        $clienteError = null;

        // keep track post values
        $nome = $_POST['nome'];
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
        $email = $_POST['email'];
        $nivel = $_POST['nivel'];
        $ativo = $_POST['ativo'];

        $valid = true;
        $array_saida = array();

        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO usuarios (id, nome, usuario, senha, email, nivel, ativo, cadastro) values(NULL, ?, ?, ?, ?, ?, ?, NOW())";
            $q = $pdo->prepare($sql);
            $q->execute(array($nome, $usuario, sha1($senha), $email, $nivel, $ativo));
            Database::disconnect();
            array_push($array_saida, "Usuário cadastrado!");
        }
    }

    echo json_encode($array_saida);
    ?>