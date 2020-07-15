<?php 
    //$idCliente = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
    require_once "../classes/autoload.php";
    $clientes = new Clientes();
    $clientes->optionCliente();


?>