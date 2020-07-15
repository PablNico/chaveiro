<?php
    //Registra o Load das classes na pasta em que o arquivo se encontra
    $autoload = spl_autoload_register(function($classes)
        { 
            require "$classes.class.php";
        });
?>