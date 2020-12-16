<?php
    require_once '../../classes/autoload.php';

    $update = new Clientes();
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $nomeCondominio = filter_input(INPUT_POST, 'nomeCondominio', FILTER_SANITIZE_SPECIAL_CHARS);
    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
    $observacoes = filter_input(INPUT_POST, 'observacoes', FILTER_SANITIZE_SPECIAL_CHARS);
    $tipoCliente = filter_input(INPUT_POST, 'tipoCliente', FILTER_SANITIZE_SPECIAL_CHARS);
    
    $update->update($id, $nome, $nomeCondominio , $telefone, $cpf, $email, $observacoes, $tipoCliente);
?>