<form action="../database/clientes/update.php" method="post" class="row">
    <input type="hidden" name="id" value="<?php echo $values['id']?>">
    <div class="input-field col s12">
        <input type="text" name="nome" id="nome" value="<?php echo $values['nome']?>" maxlength="255" required autofocus>
        <label for="nome">Digite o nome do cliente</label>
    </div>
    <div class="input-field col s12">
        <input type="text" name="telefone" id="telefone" value="<?php echo $values['telefone']?>" maxlength="255" required>
        <label for="telefone">Digite o Telefone do cliente</label>
    </div>
    <div class="input-field col s12">
        <input type="text" name="cpf" id="cpf" value="<?php echo $values['cpf']?>" maxlength="255" required>
        <label for="cpf">Digite o CPF/CNPJ do cliente</label>
    </div>
    <div class="input-field col s12">
        <input type="email" name="email" id="email" value="<?php echo $values['email']?>" maxlength="255" required>
        <label for="email">Digite o E-mail do cliente</label>
    </div>
    <div class="input-field col s12">
        <label for="observacoes">Digite as observações do cliente</label>
        <textarea type="text" name="observacoes" id="observacoes" class="materialize-textarea" required><?php echo $values['observacoes'];?></textarea>
    </div>
    <div class="input-field col s12">
        <input type="submit" name="cadastrar" id="cadastrar" value="atualizar" class="btn green">
        <a href="clientes.php" type="reset" name="limpar" class="btn red">limpar</a>
    </div>
</form>