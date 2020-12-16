<form action="" method="post" class="row">
    <div class="input-field col s12 m10">
        <input type="text" name="search">
        <label for="nome">Buscar por produto, pasta ou categoria</label>
    </div>

    <div class="input-field col s12">
        <input type="submit" name="" id="" value="Buscar" class="btn green">
        <a href="consulta-produtos.php?pasta=<?= $pasta ;?>" type="reset" name="limpar" class="btn red">limpar</a>
    </div>
</form>