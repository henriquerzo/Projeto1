<?php
require 'model/database.php';
$id = 0;
$ativo = 0;

if ( !empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if ( !empty($_POST)) {
        // keep track post values
    $id = $_POST['id'];
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE usuarios set ativo = 0 WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: admin-home.php");
}
?>