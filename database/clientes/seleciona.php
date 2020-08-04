<?php
        require_once "../../classes/autoload.php";

        $tipoCliente = filter_input(INPUT_POST, 'tipoCliente', FILTER_SANITIZE_SPECIAL_CHARS);

        $cliente = new Clientes();
        $cliente->tipoCliente($tipoCliente);

?>
