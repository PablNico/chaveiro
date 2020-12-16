<?php 
    require_once "../classes/autoload.php";
    $userId = $_SESSION['userId'];
    $servicosUrgentes = new Servico;
    $servicosUrgentes->servicosUrgentes($userId);
?>