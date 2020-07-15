<?php 
    require_once "../classes/autoload.php";
    $userId = $_SESSION['userId'];
    $meusServicos = new Servico;
    $meusServicos->meusServicosFinalizados($userId);
?>