<form action="../database/servicos/pagamento.php" class="row" method="POST">
    <div class="input-field col s12">
        <input type="number" name="valor" step="0.1">
        <label for="valor">Digite o valor a ser pago R$</label>
    </div>
    <div class="input-field col s12">
        <input type="hidden" name="id" value="<?php echo $id?>">
    </div>
    <div class="input-field col s12">
        <input type="submit" name="cadastrar" id="cadastrar" value="Realizar pagamento" class="btn green">
        <a href="servico.php" type="reset" name="limpar" class="btn red">limpar</a>
    </div>
</form>