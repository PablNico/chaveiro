<form action="../database/enderecos/update.php" class="row" method="post">

<input type="hidden" name="id" value="<?php echo $values['id']?>">

<div class="input-field col s6">
    <input type="text" name="rua" value="<?php echo $values['rua']?>" id="rua" required autofocus>
    <label for="rua">Digite o nome da rua</label>
</div>
<div class="input-field col s6">
    <input type="number" name="numero" value="<?php echo $values['numero']?>" id="numero" required>
    <label for="numero">Digite o número da casa</label>
</div>
<div class="input-field col s12">
    <input type="text" name="complemento" value="<?php echo $values['complemento']?>" id="complemento" required>
    <label for="complemento">Digite o complemento</label>
</div>
<div class="input-field col s8">
    <input type="text" name="cidade" value="<?php echo $values['cidade']?>" id="cidade" required>
    <label for="cidade">Digite sua cidade</label>
</div>
<div class="input-field col s4">
    <?php require_once "../database/enderecos/optionUf.php"; ?>
</div>

<input type="hidden" name="cliente" value="<?php echo $values['cliente']?>">

<div class="input-field col s12">
    <input type="submit" name="cadastrar" id="cadastrar" value="Atualizar" class="btn green">
    <a href="clientes.php" type="reset" name="limpar" class="btn red">limpar</a>
</div>
    
</form>