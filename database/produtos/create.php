<?php
    require_once '../../classes/autoload.php';

    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_SPECIAL_CHARS);
    $pasta = filter_input(INPUT_POST, 'pasta', FILTER_SANITIZE_SPECIAL_CHARS);
    $estoque = filter_input(INPUT_POST, 'estoque', FILTER_SANITIZE_SPECIAL_CHARS);
    $valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_SPECIAL_CHARS);

    $novoProduto = new Produtos;
    $novoProduto->dadosDoFormulario($nome, $categoria, $pasta, $estoque, $valor);
    $novoProduto->create();
?>