<?php 
    require_once "../../classes/autoload.php";

    $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_SPECIAL_CHARS);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);

    $autentica = new Usuario;
    $autentica->login($login, $senha);

?>