<?php 
    if(!isset($_SESSION)) 
    { 
      session_start(); 
    } 

    require_once "../config/header.inc.php";

    if (isset($_SESSION['autenticado'])):
        $destino = header("Location: home.php");
    else:
?>
    <div class="row">
        <div class="col s12 l4 offset-l4">
            <div class="card">
            <div class="card-action blue-grey white-text ">
                <h3 class="light">Login</h3>
            </div>
            <div class="card-content"  id="login">
                <div class="center-align">
                    <img src="../img/chaveiro-logo.png" alt="" width="75px">
                </div>
                <form action="../database/usuario/autentica.php" method="POST">
                <div class="input-field">
                    <label for="login">Digite seu usuário</label>
                    <input type="text" name="login" required autofocus>
                </div>
                <div class="input-field">
                    <label for="senha">Digite sua senha</label>
                    <input type="password" name="senha" required>
                </div>
                <div class="input-field">
                    <input type="submit" value="Entrar" class="btn" required>
                </div>
                </form>
                <?php
                    if (isset($_SESSION['mensagem'])) 
                        {
                            echo "<p class='center red lighten-2 white-text' style='border-radius:20px; padding:10px'>"; 
                                echo $_SESSION['mensagem'];
                                unset($_SESSION['mensgem']);
                            echo "</p>";
                        }
                ?>
            </div>
        </div>
        </div>
    </div>

<?php 
    endif;
    require_once "../config/footer.inc.php";
    ?>