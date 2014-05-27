<?php
 
 include 'database.php';

 $pdo = Database::connect();
 //$sql = 'SELECT p.id ,p.numeroProcesso,p.tribunal,p.cliente,p.observacoes,s.fase as situacao FROM processos p,fases s where p.id=1 and p.numeroProcesso=s.id_processo';
 $sql = "SELECT u.id, u.nome, u.usuario, u.email, u.nivel, u.ativo from usuarios u";
 $all_table = array();

 foreach ($pdo->query($sql) as $row) {
 	array_push($all_table, $row);
 }

 Database::disconnect();
 echo json_encode(array("table" => $all_table));

?>