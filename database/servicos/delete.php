<?php
    require_once "../../classes/autoload.php";

    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $delete = new Servico;
    $delete->delete($id); 
?>