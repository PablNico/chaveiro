<form action="" method="post" class="row">
    <div class="input-field col s12 m10">
        <input type="text" name="search">
        <label for="nome">Buscar por nome, condomínio, e-mail ou telefone</label>
    </div>
    <div>
        <p>
            <label>
                <input type="radio" name="tipoCliente" value="0" checked>
                <span>Todos</span>
            </label>
        </p>
        <p>
        <label>
            <input type="radio" name="tipoCliente" value="1" >
            <span>Pessoa física</span>
        </label>
        
        <p>
            <label>
                <input type="radio" name="tipoCliente" value="2">
                <span>Pessoa Jurídica</span>
            </label>
        </p>
     


    </div>
    <div class="input-field col s12">
        <input type="submit" name="cadastrar" id="cadastrar" value="Buscar" class="btn green">
        <a href="consulta-cliente.php" type="reset" name="limpar" class="btn red">limpar</a>
    </div>
</form>