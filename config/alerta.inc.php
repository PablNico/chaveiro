<?php 
    if (isset($_SESSION['sucesso'])) 
    {
        echo "<p class='center green lighten-2 white-text' style='border-radius:20px; padding:10px'>"; 
            echo $_SESSION['sucesso'];
            unset($_SESSION['sucesso']);
        echo "</p>";
    }
    elseif (isset($_SESSION['erro'])) 
    {
        echo "<p class='center red lighten-2 white-text' style='border-radius:20px; padding:10px'>"; 
            echo $_SESSION['erro'];
            unset($_SESSION['erro']);
        echo "</p>";
    }
?>