<form action="../database/enderecos/update.php" class="row" method="post">

<input type="hidden" name="id" value="<?php echo $values['id']?>">

<div class="input-field col s6">
    <input type="text" name="logradouro" id="logradouro" value="<?= $values['logradouro']?>" required autofocus>
    <label for="logradouro">Digite o o logradouro (Rua, Avenida...)</label>
</div>

<div class="input-field col s6">
    <input type="text" name="nome" id="nome" value="<?= $values['nome']?>" required >
    <label for="nome">Digite o nome da rua</label>
</div>
<div class="input-field col s6">
    <input type="number" name="numero" id="numero" value="<?= $values['numero']?>">
    <label for="numero">Digite o número da casa (Opcional)</label>
</div>
<div class="input-field col s6">
    <input type="text" name="edificio" id="edificio" value="<?= $values['edificio']?>">
    <label for="edificio">Digite o nome do edifício ou condomínio (Opcional)</label>
</div>
<div class="input-field col s12">
    <input type="text" name="complemento" id="complemento" value="<?= $values['complemento']?>">
    <label for="complemento">Digite o complemento (Opcional)</label>
</div>
<div class="input-field col s8">
    <input type="text" name="cidade" id="cidade" value="<?= $values['cidade']?>" required>
    <label for="cidade">Digite sua cidade</label>
</div>
<div class="input-field col s4">
    <?php require_once "../database/enderecos/optionUf.php"; ?>
</div>

<input type="hidden" name="cliente" value="<?php echo $values['cliente']?>">

<div class="input-field col s12">
    <input type="submit" name="cadastrar" id="cadastrar" value="cadastrar" class="btn">
    <a href="clientes.php" type="reset" name="limpar" class="btn red">limpar</a>
</div>
    
</form>