<?php
    require_once "../../classes/autoload.php";
    
    $search = filter_input(INPUT_POST, "searchFuncionario", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $usuario = new Usuario;
    $usuario->optionFuncionario($search);