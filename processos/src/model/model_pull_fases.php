<?php
 
	include 'database.php';
 	include "../classes_pull/TSE_PULL.php";
 	$pdo = Database::connect();
	$lista_processos_pull = array();
	//$numeroProcesso = $_REQUEST['numeroProcesso'];
 	$obj = new TSE_PULL("241092000");
 	$obj->pull();
 	$lista_processos_pull = $obj->getListaFases();

 	$sql = 'SELECT * FROM fases WHERE id_processo=241092000';
 	$lista_processos_bd = array();
	foreach ($pdo->query($sql) as $row) {
 		array_push($lista_processos_bd, $row);
 	}

 	
 	for ($i = count($lista_processos_pull) - 1; $i > count($lista_processos_bd) -1; $i--) {

 		$fase = "'".$lista_processos_pull[$i]->getNome()."'";
 		$fase = str_replace("\r\n","",$fase);
 		$fase = str_replace("\t","",$fase);
 		$time = explode(" ",$lista_processos_pull[$i]->getDate());
 		$date = data_convert($time[0]);
 		echo $date;
 		$sql2 = "INSERT INTO FASES VALUES(241092000,$fase,$date)";
		$pdo->query($sql2);						
 	}	
 	
 	$all_table = array();
 	$sql3 = 'SELECT * FROM fases WHERE id_processo=241092000';
 	foreach ($pdo->query($sql3) as $row) {
 		array_push($all_table, $row);
 	}
   					 
 
 Database::disconnect();

 echo json_encode(array("table" => $all_table));

 function data_convert($date){
 	$array_date = explode("/",$date);
 	$new_date = "'".$array_date[2] . "-" . $array_date[1] . "-" . $array_date[0]."'";
 	return $new_date;
 }

?>