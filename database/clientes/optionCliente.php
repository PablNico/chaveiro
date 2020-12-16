<?php 
    //$idCliente = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
    require_once "../../classes/autoload.php";

    $search = filter_input(INPUT_POST, "searchCliente", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $clientes = new Clientes();
    $clientes->optionCliente($search);


?>