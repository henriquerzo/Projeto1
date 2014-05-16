<?php

include 'database.php';

$pdo = Database::connect();

$sql = 'SELECT p.numeroProcesso,p.tribunal,p.situacao from processos p';
$all_table = array();
foreach ($pdo->query($sql) as $row) {

	$tribunal = $row['tribunal'];
	$numeroProcesso = $row['numeroProcesso'];
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
}

$date_table = array();
$sql3 = 'SELECT SYSDATE()';
foreach ($pdo->query($sql3) as $row){
	array_push($date_table, $row['SYSDATE()']);
}

$all_table = array();
$sql4 = 'SELECT * from data_atualizacao';
foreach ($pdo->query($sql4) as $row){
	array_push($all_table, $row['id']);
}

if(count($all_table) > 0){
	
	$sql5 = 'UPDATE data_atualizacao set data=' . "'".$date_table[0] ."'". 'where id=1';
	$pdo->query($sql5);
}else{
	
	$sql5 = 'INSERT INTO data_atualizacao values(1,' . "'".$date_table[0] 	."'" . ')	';
	$pdo->query($sql5);
}


Database::disconnect();

?>

