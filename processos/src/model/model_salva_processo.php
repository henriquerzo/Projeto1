<?php
     
    include 'database.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $numeroProcessoError = null;
        $clienteError = null;
         
        // keep track post values
        $numeroProcesso = $_POST['campo_numero_processo'];
        $tribunal = $_POST['tribunal'];
        $cliente = $_POST['cliente'];
        $observacoes = $_POST['observacoes'];
        $lista_processos_pull = array();

        switch ($tribunal) {
            case 'T. Superior Eleitoral':
                include '../classes_pull/TSE_PULL.php';
                $obj = new TSE_PULL($numeroProcesso);
                $obj->pull();
                $lista_processos_pull = $obj->getListaFases();
                $situacao = $lista_processos_pull[0]->getNome();
                break;
            case 'TJ-PB':
                include '../classes_pull/TJPB_PULL.php';
                $obj = new TJPB_PULL($numeroProcesso);
                $obj->pull();
                $lista_processos_pull = $obj->getListaFases();
                
                break;
            case 'S. Tribunal Federal':
                include '../classes_pull/STF_PULL.php';
                $obj = new STF_PULL($numeroProcesso);
                $obj->pull();
                $lista_processos_pull = $obj->getListaFases();
                
                break;
            case 'T. Regional Federal':
                include '../classes_pull/TRF_PULL.php';
                $obj = new TRF_PULL($numeroProcesso);
                $obj->pull();
                $lista_processos_pull = $obj->getListaFases();
                
                break;
            case 'T. Regional Eleitoral':
                include '../classes_pull/TRE_PULL.php';
                $obj = new TRE_PULL($numeroProcesso);
                $obj->pull();
                $lista_processos_pull = $obj->getListaFases();
                
                break;
            case 'T. Regional Federal 5º Regiao':
                include '../classes_pull/TRF_REGIAO5_PULL.php';
                $obj = new TRF_REGIAO5_PULL($numeroProcesso);
                $obj->pull();
                $lista_processos_pull = $obj->getListaFases();
                
                break;
            default:
                # code...
                break;
        }

        $array_saida = array();
        if (count($lista_processos_pull)==0) {
            array_push($array_saida, "Processo nao cadastrado!"); 
            
        }else{
            $situacao = $lista_processos_pull[0]->getNome();
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
                $q->execute(array($numeroProcesso, $tribunal, utf8_encode($situacao), $cliente, $observacoes));
                Database::disconnect();
                array_push($array_saida, "Processo cadastrado!");
            }
        }
    }

    echo json_encode($array_saida);
?>