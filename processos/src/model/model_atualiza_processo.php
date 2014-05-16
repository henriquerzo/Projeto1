<?php
     
    include 'database.php';
    

    $pdo = Database::connect(); 
 
    $numeroProcesso = $_POST['numeroProcesso'];
    $tribunal = $_POST['tribunal'];
    $situacao2 = $_POST['situacao'];
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

        
    $situacao = $lista_processos_pull[0]->getNome();
    $sql2 = 'UPDATE processos set situacao=' . "'". utf8_encode($situacao) . "'" . 'where numeroProcesso=' . "'" . $numeroProcesso. "'";
    $pdo->query($sql2);

        
 
 echo utf8_encode($situacao)==$situacao2;    
     
        
    
?>