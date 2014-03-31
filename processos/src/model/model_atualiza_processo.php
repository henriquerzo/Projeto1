<?php
     
    include 'database.php';
    include '../classes_pull/TSE_PULL.php';
 
    $numeroProcesso = $_POST['numeroProcesso'];
    $tribunal = $_POST['tribunal'];
    
    switch ($tribunal) {
    case 'T. Superior Eleitoral':
        $obj = new TSE_PULL($numeroProcesso);
        $obj->pull();
        $lista_processos_pull = $obj->getListaFases();
        $situacao = $lista_processos_pull[0]->getNome();
        break;
    case 1:
        echo "i equals 1";
        break;
    case 2:
        echo "i equals 2";
        break;
    }
        
 
 echo utf8_encode($situacao);    
        
        
    }
?>