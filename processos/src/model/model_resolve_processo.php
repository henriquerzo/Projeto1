<?php

	include 'database.php';
    

    $pdo = Database::connect(); 
 
    $numeroProcesso = $_POST['numeroProcesso'];
    $sql2 = 'UPDATE processos set status=' . "'". "0" . "'" . 'where numeroProcesso=' . "'" . $numeroProcesso. "'";
    $pdo->query($sql2);

    echo 'response';

?>