<?php
 
 include 'database.php';
 include("../seguranca.php"); // Inclui o arquivo com o sistema de segurança
 protegePagina(); // Chama a função que protege a página

 $pdo = Database::connect();
 
 //$sql = 'SELECT p.id ,p.numeroProcesso,p.tribunal,p.cliente,p.observacoes,s.fase as situacao FROM processos p,fases s where p.id=1 and p.numeroProcesso=s.id_processo';
 $sql = "SELECT p.id ,p.numeroProcesso,p.tribunal,p.data,p.situacao,p.cliente,p.observacoes,p.status from processos p where p.usuario_id = " . $_SESSION['usuarioID'];
 $all_table = array();

 foreach ($pdo->query($sql) as $row) {
 	array_push($all_table, $row);
 }

 Database::disconnect();
 echo json_encode(array("table" => $all_table));

?>