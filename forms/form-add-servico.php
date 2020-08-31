<?php 
    if(!isset($_GET['step'])):
?>
    <form action="servico.php?step=1" class="row" method="POST">

        <!-- Descrição -->
        <div class="input-field col s12 m12">
            <textarea class="materialize-textarea" type="text" name="descricao" required autofocus></textarea>
            <label for="descricao">Digite a descrição do serviço</label>
        </div>

        <!-- Prioridade -->
        <div class="input-field col s12 m6 ">    
            <select name="prioridade" id="">
                <?php require_once "../database/servicos/optionPrioridade.php";?>
            </select>
            <label for="prioridade">Selecione a prioridade</label>
        </div>

        <!-- Funcionario -->
        <div class="input-field col s12 m6 ">    
            <select name="funcionario" id="">
                <?php require_once "../database/usuario/optionFuncionario.php";?>
            </select>
            <label for="funcionario">Selecione o funcionário</label>
        </div>

        <!-- Cliente -->
        <div class="input-field col s12 m6 ">    
            <select name="cliente" id="cliente" onchange="getValor(this.value, 0)" >
                <option value="0">Selecione um cliente</option>
                <?php require_once "../database/clientes/optionCliente.php";?>
            </select>
            <label for="cliente">Selecione o cliente</label>
        </div>

        <!-- Data e hora -->
        <div class="input-field col s12 m6">
            <input type="date" name="data" id="" required>
            <input type="time" name="hora" id="" required>
            <label for="dataInicio">Data e Hora de início</label>
        </div>
        
        
        <div class="input-field col s12">
            <input type="submit" name="cadastrar" id="cadastrar" value="Continuar" class="btn">
            <a href="servico.php" type="reset" name="limpar" class="btn red">limpar</a>
        </div>
    </form>
    <?php else:
        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $prioridade = filter_input(INPUT_POST, 'prioridade', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $funcionario = filter_input(INPUT_POST, 'funcionario', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $cliente = filter_input(INPUT_POST, 'cliente', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
        $hora = filter_input(INPUT_POST, 'hora', FILTER_SANITIZE_STRING);
        
        require_once "../classes/autoload.php";
        $optionEndereco = new Endereco;
       
    ?>

    <form action="../database/servicos/create.php" class="row" method="POST">
        <input type="hidden" name="descricao" value="<?= $descricao?>">
        <input type="hidden" name="prioridade" value="<?= $prioridade?>">
        <input type="hidden" name="funcionario" value="<?= $funcionario?>">
        <input type="hidden" name="cliente" value="<?= $cliente?>">
        <input type="hidden" name="data" value="<?= $data?>">
        <input type="hidden" name="hora" value="<?= $hora?>">
        <?php $optionEndereco->optionEndereco($cliente); ?>
        
        <div class="input-field col s12">
            <input type="submit" name="cadastrar" id="cadastrar" value="Finalizar Cadastro" class="btn">
            <a href="servico.php" type="reset" name="limpar" class="btn red">limpar</a>
        </div>
    </form>
    
    <?php endif;?>