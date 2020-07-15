<form action="../database/usuario/create.php" method="post" class="row">
    <div class="input-field col s4">
        <input type="text" name="nome" id="nome" maxlength="255" required autofocus>
        <label for="nome">Digite o nome do usuário</label>
    </div>
    <div class="input-field col s4">
        <input type="text" name="login" id="login" maxlength="55" required>
        <label for="login">Digite o login do usuário</label>
    </div>
    <div class="input-field col s4">
        <input type="text" name="senha" id="senha" maxlength="55" required>
        <label for="senha">Digite a senha do usuário</label>
    </div>
    <div class="input-field col s12 ">    
        <span class="light">Usuário administrador?</span>
        <p>
        <label>
            <input name="administrador" type="radio" value="1"  />
            <span>Sim</span>
        </label>
        </p>
        <p>
        <label>
            <input name="administrador" type="radio" value="0" checked/>
            <span>Não</span>
        </label>
        </p>
    </div>
    <div class="input-field col s12">
        <input type="submit" name="cadastrar" id="cadastrar" value="cadastrar" class="btn">
        <a href="usuario.php" type="reset" name="limpar" class="btn red">limpar</a>
    </div>
</form>