<?php

include 'database.php';

    if ( !empty($_POST)) {
        // keep track validation errors
        $numeroProcessoError = null;
        $clienteError = null;

        // keep track post values
        $email = $_POST['email'];
        $mensagem = $_POST['mensagem'];

        $valid = true;
        $array_saida = array();

        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO mensagem (id, email, mensagem) values(NULL, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($email, $mensagem));
            Database::disconnect();
            array_push($array_saida, "Mensagem Enviada!");
        }
    }

    echo json_encode($array_saida);
    ?>