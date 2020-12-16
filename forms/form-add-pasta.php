<form action="../database/produtos/addPasta.php" class="row" method="post">
    <div class="input-field col s10">
        <input type="text" name="nome" id="">
        <label for="nome">Informe o nome da pasta</label>
    </div>
    <input type="hidden" name="subpasta" value="<?= $subpasta?>">

    <div class="input-field col s12">
        <input type="submit" class="btn green" value="enviar">
        <input type="reset" class="btn red" value="limpar">
    </div>

</form>