<?php

include 'database.php';
$pdo = Database::connect();

$sql = 'SELECT data from data_atualizacao where id=1';
$date_table = array();
foreach ($pdo->query($sql) as $row) {
	array_push($date_table, $row['data']);
}

Database::disconnect();
echo json_encode($date_table);

?>