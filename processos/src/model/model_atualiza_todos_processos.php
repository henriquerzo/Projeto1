<?php

include 'database.php';
include '../classes_pull/TSE_PULL.php';
$pdo = Database::connect();

$sql = 'SELECT p.numeroProcesso,p.tribunal,p.situacao from processos p';
$all_table = array();
foreach ($pdo->query($sql) as $row) {

 $tribunal = $row['tribunal'];
 $numeroProcesso = $row['numeroProcesso'];

 switch ($tribunal) {
 	case 'T. Superior Eleitoral':

 		$obj = new TSE_PULL($numeroProcesso);
        $obj->pull();
        $lista_processos_pull = $obj->getListaFases();
        $situacao = $lista_processos_pull[0]->getNome();
 		break;

 	case 'T. Regional Eleitoral':

 		$obj = new TRE_PULL($numeroProcesso);
        $obj->pull();
        $lista_processos_pull = $obj->getListaFases();
        $situacao = $lista_processos_pull[0]->getNome();
 		break;

 	case 'T. Superior Federal':

 		break;
 	
 	default:
 		# code...
 		break;
 }

 $sql2 = 'UPDATE processos set situacao=' . $situacao . 'where numeroProcesso=' . $numeroProcesso;
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

