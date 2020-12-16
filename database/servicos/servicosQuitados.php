<?php 
    require_once "../classes/autoload.php";
    $userId = $_SESSION['userId'];
    $servicosQuitados = new Servico;
    $servicosQuitados->servicosQuitados($userId);
?>