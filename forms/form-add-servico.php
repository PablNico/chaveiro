<form action="../database/servicos/create.php" class="row" method="POST">

    <!-- Descrição -->
    <div class="input-field col s12 m12">
        <textarea class="materialize-textarea" type="text" name="descricao" required autofocus></textarea>
        <label for="descricao">Digite a descrição do serviço</label>
    </div>

    <!-- Funcionario -->
    <div class="input-field col s12 m6 ">    
        <select name="funcionario" id="">
            <?php require_once "../database/usuario/optionFuncionario.php";?>
        </select>
        <label for="funcionario">Selecione o funcionário</label>
    </div>

    <!-- Prioridade -->
    <div class="input-field col s12 m6 ">    
        <select name="prioridade" id="">
            <?php require_once "../database/servicos/optionPrioridade.php";?>
        </select>
        <label for="prioridade">Selecione a prioridade</label>
    </div>

    <!-- Cliente -->
    <div class="input-field col s12 m6 ">    
        <select name="cliente" id="cliente" onchange="getValor(this.value, 0)" >
            <option value="0">Selecione um cliente primeiro</option>
            <?php require_once "../database/clientes/optionCliente.php";?>
        </select>
        <label for="cliente">Selecione o cliente</label>
    </div>

    <!-- Endereco -->
    <div class="input-field col s12 m6 ">    
        <select name="endereco" id="endereco">
            <option value="0">Selecione um cliente primeiro</option>
        </select>
        <label for="endereco">Selecione o endereco</label>
    </div>

    <!-- Data e hora -->
    <div class="input-field col s12 m6">
        <input type="date" name="data" id="" required>
        <input type="time" name="hora" id="" required>
        <label for="dataInicio">Data e Hora de início</label>
    </div>
    
    
    <div class="input-field col s12">
        <input type="submit" name="cadastrar" id="cadastrar" value="cadastrar" class="btn">
        <a href="servico.php" type="reset" name="limpar" class="btn red">limpar</a>
    </div>
</form>