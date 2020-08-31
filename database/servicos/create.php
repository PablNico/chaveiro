<?php
   if(!isset($_SESSION)) 
   { 
       session_start(); 
   } 
    require_once "../../classes/autoload.php";

    $descricao = filter_input(INPUT_POST, "descricao", FILTER_SANITIZE_SPECIAL_CHARS);
    $status = filter_input(INPUT_POST, "status", FILTER_SANITIZE_SPECIAL_CHARS);
    $prioridade = filter_input(INPUT_POST, "prioridade", FILTER_SANITIZE_SPECIAL_CHARS);
    $dataInicio = filter_input(INPUT_POST, "data", FILTER_SANITIZE_SPECIAL_CHARS);
    $hora = filter_input(INPUT_POST, "hora", FILTER_SANITIZE_STRING);
    $usuario = filter_input(INPUT_POST, "funcionario", FILTER_SANITIZE_STRING);
    $cliente = filter_input(INPUT_POST, "cliente", FILTER_SANITIZE_SPECIAL_CHARS);
    $endereco = filter_input(INPUT_POST, "endereco", FILTER_SANITIZE_STRING);
  


    
    $servico = new Servico;

    $dataInicio .= " {$hora}:00";
    $servico->dadosDoFormulario($descricao, $status, $prioridade, $dataInicio, $usuario, $cliente, $endereco);
    $servico->create();


?>