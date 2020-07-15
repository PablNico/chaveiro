<form action="../database/clientes/create.php" method="post" class="row">
    <div class="input-field col s12 l6">
        <input type="text" name="nome" id="nome" maxlength="255" required autofocus>
        <label for="nome">Digite o nome do cliente</label>
    </div>
    <div class="input-field col s12 l6">
        <input type="text" name="telefone" id="telefone" maxlength="255" required>
        <label for="telefone">Digite o Telefone do cliente</label>
    </div>
    <div class="input-field col s12 l6">
        <input type="text" name="cpf" id="cpf" maxlength="255" required>
        <label for="cpf">Digite o CPF/CNPJ do cliente</label>
    </div>
    <div class="input-field col s12 l6">
        <input type="email" name="email" id="email" maxlength="255" required>
        <label for="email">Digite o E-mail do cliente</label>
    </div>
    <div class="input-field col s12">
        <label for="observacoes">Digite as observações do cliente</label>
        <textarea type="text" name="observacoes" id="observacoes" class="materialize-textarea" required></textarea>
    </div>
    <div class="input-field col s12">
        <input type="submit" name="cadastrar" id="cadastrar" value="cadastrar" class="btn">
        <a href="clientes.php" type="reset" name="limpar" class="btn red">limpar</a>
    </div>
</form>