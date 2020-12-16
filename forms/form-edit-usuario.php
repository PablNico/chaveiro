<form action="../database/usuario/update.php" method="post" class="row">
    <input type="hidden" name="id" value="<?php echo $values['id']; ?>">
    <div class="input-field col s12">
        <input type="text" name="nome" id="nome" value="<?php echo $values['nome']?>" maxlength="255" required autofocus>
        <label for="nome">Digite o nome do usuário</label>
    </div>
    <div class="input-field col s12">
        <input type="text" name="login" id="login" value="<?php echo $values['login']?>" maxlength="55" required>
        <label for="login">Digite o login do usuário</label>
    </div>
    <div class="input-field col s12">
        <input type="text" name="senha" id="senha" value="<?php echo $values['senha']?>" maxlength="55" required>
        <label for="senha">Digite a senha do usuário</label>
    </div>
    <div class="input-field col s12 ">    
        <span class="light">Usuário administrador?</span>
        <?php if ($values['tipoConta'] == "1"):?>
            <p>
                <label>
                    <input name="tipoConta" type="radio" value="1" checked />
                    <span>Sim</span>
                </label>
            </p>
            <p>
            <label>
                <input name="tipoConta" type="radio" value="0" />
                <span>Não</span>
            </label>
        </p>
        
        <?php elseif ($values['tipoConta'] == "0"):?>
            <p>
                <label>
                    <input name="tipoConta" type="radio" value="1" />
                    <span>Sim</span>
                </label>
            </p>
            <p>
            <label>
                <input name="tipoConta" type="radio" value="0" checked/>
                <span>Não</span>
            </label>
        </p>
        <?php endif; ?>

    </div>
    <div class="input-field col s12">
        <input type="submit" name="cadastrar" id="cadastrar" value="atualizar" class="btn green">
        <a href="usuario.php" type="reset" name="limpar" class="btn red">limpar</a>
    </div>
</form>