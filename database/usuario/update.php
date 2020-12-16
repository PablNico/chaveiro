<?php
    require_once "../../classes/autoload.php";

    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_SPECIAL_CHARS);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
    $tipoConta = filter_input(INPUT_POST, 'tipoConta', FILTER_SANITIZE_NUMBER_INT);

    $atualizaUsuario = new Usuario();
    $atualizaUsuario->update($id, $nome, $login, $senha, $tipoConta);

?>