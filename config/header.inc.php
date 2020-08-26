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
    <nav class="blue ">
        <div class="nav-wrapper">
            
            <a href="home.php" class="brand-logo light left">&nbsp&nbsp<img src="../img/chaveiro-logo.png" width="40px"></a>
            <a class='red right' href='../database/usuario/logout.php' style="padding: 0px 20px 0px 20px;">SAIR</a>
            <h5 class="light right">
              <?= "Bem vindo, {$_SESSION['username']}&nbsp&nbsp"?> 
            </h5>          
        </div>
    </nav>
    <!-- <div class="indigo center-align" style="margin-bottom: 15px;">
      <span style="font-size: 15px; font-weight: 450; color: white">
  
         •<a href="#" class="waves-effect waves-teal btn-flat white-text">Consultar Serviço</a>•
          <a href="#" class="waves-effect waves-teal btn-flat white-text">Consultar Cliente</a>•
          <a href="#" class="waves-effect waves-teal btn-flat white-text">Consultar Produto</a>•
      

      </span>
    </div> -->
  <?php endif;?>

