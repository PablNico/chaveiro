<?php

    require_once "../classes/autoload.php";

    $search = filter_input(INPUT_POST, "search", FILTER_SANITIZE_STRING);
    $tipoCliente = filter_input(INPUT_POST, "tipoCliente", FILTER_SANITIZE_STRING);
    $lerRegistro = new Clientes();
    $lerRegistro->read($search, $tipoCliente);

?>