<?php
    require 'model/database.php';
    $id = 0;
     
     
    if ( !empty($_POST)) {
        // keep track post values
        $id = $_POST['id'];
         
        // delete data
        $pdo = Database::connect();
        $sql = 'DELETE FROM processos  WHERE id=' . "'" . $id . "'";
        $pdo->query($sql);
        Database::disconnect();
        //header("Location: home.php");
         
    }
?>