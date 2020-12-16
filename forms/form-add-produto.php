<form action="../database/produtos/create.php" class="row" method="POST">
    <div class="input-field col s12 m8 l8">
        <input type="text" name="nome" maxlength="255" required autofocus>
        <label for="nome">Digite o nome do produto</label>
    </div>
    <div class="input-field col s12 m4 l4">
        <input type="number" name="estoque" required>
        <label for="nome">Digite o estoque inicial</label>
    </div>
    <div class="input-field col s12 m4 l4">
        <input type="number" name="valor" step="0.10" required>
        <label for="nome">Digite o valor do produto</label>
    </div>
    <div class="input-field col s12 m8 l8">
        <input type="text" name="categoria" maxlength="255" required>
        <label for="nome">Digite a categoria do produto</label>
    </div>
    <div class="input-field col s12">
        <input type="submit" name="cadastrar" id="cadastrar" value="cadastrar" class="btn">
        <a href="produto.php" type="reset" name="limpar" class="btn red">limpar</a>
    </div>

    <input type="hidden" name="pasta" value="<?=$pasta?>">
</form>