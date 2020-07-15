
<form action="../database/enderecos/create.php" class="row" method="post">
<div class="input-field col s6">
    <input type="text" name="rua" id="rua" required autofocus>
    <label for="rua">Digite o nome da rua</label>
</div>
<div class="input-field col s6">
    <input type="number" name="numero" id="numero" required>
    <label for="numero">Digite o número da casa</label>
</div>
<div class="input-field col s12">
    <input type="text" name="complemento" id="complemento" required>
    <label for="complemento">Digite o complemento</label>
</div>
<div class="input-field col s8">
    <input type="text" name="cidade" id="cidade" required>
    <label for="cidade">Digite sua cidade</label>
</div>
<div class="input-field col s4">
    <?php require_once "../database/enderecos/optionUf.php"; ?>
</div>

<div class="input-field col s12">
    <?php require_once "../database/clientes/optionCliente.php"; ?>
</div>


<div class="input-field col s12">
    <input type="submit" name="cadastrar" id="cadastrar" value="cadastrar" class="btn">
    <a href="clientes.php" type="reset" name="limpar" class="btn red">limpar</a>
</div>
    
</form>

