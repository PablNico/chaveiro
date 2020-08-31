<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, nofollow">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="../materialize/css/materialize.min.css">
    <link rel="stylesheet" href="../materialize/css/materialize.min.css">
    <link rel="stylesheet" href="../materialize/css/style.css">
    <link rel="stylesheet" href="../materialize/font-awesome/css/font-awesome.min.css">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon"> 
            
    <title>Sistema Chaveiro</title>

    <script type="text/javascript">
        function getValor(valor)
        {
            $("#endereco").html("<option value='0'>Carregando...</option>");
            $("#endereco").load("../database/enderecos/optionEndereco.php", {cliente:valor})
        }
    </script>
</head>
<body>
  <?php if(isset($_SESSION['autenticado'])):?>
    <nav class="blue">
        <a href="home.php" class="brand-logo light left">&nbspCHAVEIRO</a>         
        <a class='red right' href='../database/usuario/logout.php' style="padding: 0px 20px 0px 20px;">SAIR</a>
        <h5 class="light right">
            <?= "Bem vindo, {$_SESSION['username']}&nbsp&nbsp"?> 
        </h5>          

            
    </nav>
    <nav class="blue darken-1 center-align">
        <div class="nav-wrapper">
            <!-- Trigger menu dropdown -->
                <ul class="center-align" style="margin-left: 30%;">
                    <li><a class="dropdown-trigger" href="#!" data-target="clientes">Clientes<i class="material-icons right">arrow_drop_down</i></a></li>
                    <li><a class="dropdown-trigger" href="#!" data-target="servicos">Serviços<i class="material-icons right">arrow_drop_down</i></a></li>
                    <li><a class="dropdown-trigger" href="#!" data-target="produtos">Produtos<i class="material-icons right">arrow_drop_down</i></a></li>
                    <li><a class="dropdown-trigger" href="#!" data-target="funcionarios">Funcionarios<i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
            <!-- Fim Trigger menu dropdown -->
            
            <!-- Estrutura dropdown -->
                <!-- Dropdown Clientes -->
                    <ul id="clientes" class="dropdown-content">
                        <li><a href="clientes.php?CPF">Cadastrar (CPF)</a></li>
                        <li><a href="clientes.php?CNPJ">Cadastrar (CNPJ)</a></li>
                        <li class="divider"></li>
                        <li><a href="consulta-cliente.php">Consultar</a></li>
                    </ul>

                <!-- Dropdown Serviços -->
                    <ul id="servicos" class="dropdown-content">
                        <li><a href="servico.php">Novo Serviço</a></li>
                        <li><a href="consulta-servicos.php">Consultar</a></li>
                    </ul>

                <!-- Dropdown Produtos -->
                    <ul id="produtos" class="dropdown-content">
                        <li><a href="produtos.php">Novo Produto</a></li>
                        <li><a href="consulta-produtos.php">Consultar</a></li>
                        <li><a href="#!">Abastecer estoque</a></li>
                    </ul>
                    
                <!-- Dropdown Funcionarios -->
                    <ul id="funcionarios" class="dropdown-content">
                        <li><a href="usuario.php?tipo=1">Novo Funcionário (Normal)</a></li>
                        <li><a href="usuario.php?tipo=2">Novo Funcionário (Administrador)</a></li>
                        <li><a href="consulta-usuario.php">Consultar</a></li>
                    </ul>

            <!-- Fim Estrutura dropdown -->

        </div>
    </nav>
  <?php endif;?>

