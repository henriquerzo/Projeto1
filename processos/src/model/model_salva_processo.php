<?php
     
    include 'database.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $numeroProcessoError = null;
        $clienteError = null;
         
        // keep track post values
        $numeroProcesso = $_POST['numeroProcesso'];
        $tribunal = $_POST['tribunal'];
        $cliente = $_POST['cliente'];
        $observacoes = $_POST['observacoes'];

        include '../classes_pull/TSE_PULL.php';
    	$obj = new TSE_PULL($numeroProcesso);
    	$obj->pull();
    	$lista_processos_pull = $obj->getListaFases();
    	$situacao = utf8_encode($lista_processos_pull[0]->getNome());
    	
         
        // validate input
        $valid = true;
        if (empty($numeroProcesso)) {
            $numeroProcessoError = 'É preciso adicionar um número de processo';
            $valid = false;
        }

        $valid = true;
        if (empty($cliente)) {
            $clienteError = 'É preciso adicionar um cliente';
            $valid = false;
        }
         
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO processos (numeroProcesso, tribunal, situacao, cliente, observacoes) values(?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($numeroProcesso, $tribunal, $situacao, $cliente, $observacoes));
            Database::disconnect();
            header("Location: ../home.php");
        }
    }
?>