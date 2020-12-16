<?php 
    $step = filter_input(INPUT_GET, "step", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if($step == null):
?>
    <!-- Step 0 -->
        <form action="servico.php?step=1" class="row" method="POST">

            <!-- Descrição -->
                <div class="input-field col s9 m9">
                    <textarea class="materialize-textarea" type="text" name="descricao" required autofocus></textarea>
                    <label for="descricao">Digite a descrição do serviço</label>
                </div>
            <!-- Fim descrição -->

            <!-- Plantão  -->
                <div class="input-field col s3">
                    <p>
                        <label>
                            <input name="plantao" value="0" type="radio" checked />
                            <span>Serviço normal</span>
                        </label>
                    </p>
                    <p>
                        <label>
                            <input name="plantao" value="1" type="radio" />
                            <span>Plantão</span>
                        </label>
                    </p>
                </div>
            <!-- Fim Plantão  -->
            

            <!-- Prioridade -->
                <div class="input-field col s12 m6 ">    
                    <select name="prioridade" id="">
                        <?php require_once "../database/servicos/optionPrioridade.php";?>
                    </select>
                    <label for="prioridade">Selecione a prioridade</label>
                </div>
            <!-- Fim prioridade -->

            <!-- Data e hora -->
                <div class="input-field col s12 m6">
                    <input type="date" name="data" id="" required>
                    <input type="time" name="hora" id="" required>
                    <label for="dataInicio">Data e Hora de início</label>
                </div>
            <!-- Fim data e hora -->

            <!-- Botões step 0 -->
                <div class="input-field col s12">
                    <input type="submit" name="cadastrar" id="cadastrar" value="Continuar" class="btn">
                    <a href="servico.php" type="reset" name="limpar" class="btn red">limpar</a>
                </div>
            <!-- Fim Botões step 0 -->
            
        </form>
    <!-- Fim step 0 -->

<?php elseif($step == 1):
    // Recuperando dados do STEP 0 
        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $plantao = filter_input(INPUT_POST, 'plantao', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $prioridade = filter_input(INPUT_POST, 'prioridade', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
        $hora = filter_input(INPUT_POST, 'hora', FILTER_SANITIZE_STRING);   
    // Fim Recuperando dados do STEP 0 
?>
    <!-- Step 1 -->
        <form action="servico.php?step=2" method="POST" class="row">

            <!-- Passando valores do step 0 para step 1 -->
                <input type="hidden" name="descricao" value="<?= $descricao?>">
                <input type="hidden" name="plantao" value="<?= $plantao?>">
                <input type="hidden" name="prioridade" value="<?= $prioridade?>">
                <input type="hidden" name="data" value="<?= $data?>">
                <input type="hidden" name="hora" value="<?= $hora?>">
            <!-- Fim Passando valores do step 0 para step 1 -->

            <!-- Pesquisar Funcionário -->
                <div class="input-field col s9">
                    <input type="text" name="searchFuncionario" id="searchFuncionario">
                    <label for="searchFuncionario">Pesquise o funcionário responsável</label>
                </div>
                <div class="input-field col s2">
                    <button type="button" class="btn blue" id="btnFuncionario">Buscar</button>
                </div>
            <!-- Fim pesquisa funcionário -->

            <!-- Pesquisar Cliente -->
                <div class="input-field col s9">
                    <input type="text" name="searchCliente" id="searchCliente">
                    <label for="searchCliente">Pesquisar Cliente</label>
                </div>
                <div class="input-field col s2">
                    <button type="button" class="btn-small blue" id="btnCliente">Buscar</button>
                </div>
            <!-- Fim Pesquisar Cliente -->
                       
            <!-- Select Funcionario -->
                <div class="input-field col s12 m6">    
                    <select name="funcionario" id="funcionario">
                        
                    </select>
                    <label for="funcionario">Selecione o funcionário</label>
                </div>
            <!-- Fim Select Funcionario -->

            <!-- Select Cliente -->
                <div class="input-field col s12 m6 ">    
                    <select name="cliente" id="cliente">

                    </select>
                    <label for="cliente">Selecione o cliente</label>
                    <a class="" href="clientes.php?recomecar=1"><span class="badge new" data-badge-caption=""><i class="tiny material-icons">add</i> Criar cliente</span></a>
                </div>
            <!-- Fim Select Cliente -->

        
            <!-- Botões Step 1 -->
                <div class="input-field col s12">
                    <input type="submit" name="cadastrar" id="cadastrar" value="Continuar" class="btn">
                    <a href="servico.php?step=1" type="reset" name="limpar" class="btn red">limpar</a>
                </div>
            <!-- Fim Botões Step 1 -->
            
        </form>
    <!-- Fim Step 1 -->
     
<?php elseif($step==2): 
    // Recuperando dados do STEP 1 
        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $plantao = filter_input(INPUT_POST, 'plantao', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $prioridade = filter_input(INPUT_POST, 'prioridade', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
        $hora = filter_input(INPUT_POST, 'hora', FILTER_SANITIZE_STRING);   
        $funcionario = filter_input(INPUT_POST, 'funcionario', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $cliente = filter_input(INPUT_POST, 'cliente', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        require_once "../classes/autoload.php";
        $optionEndereco = new Endereco;
    // Fim Recuperando dados do STEP 1 
?>
    <!-- Step 2 -->
        <form action="../database/servicos/create.php" class="row" method="POST">
            <!-- Passando valores do step 1 para step 2 -->
                <input type="hidden" name="descricao" value="<?= $descricao?>">
                <input type="hidden" name="plantao" value="<?= $plantao?>">
                <input type="hidden" name="prioridade" value="<?= $prioridade?>">
                <input type="hidden" name="data" value="<?= $data?>">
                <input type="hidden" name="hora" value="<?= $hora?>">
                <input type="hidden" name="funcionario" value="<?= $funcionario?>">
                <input type="hidden" name="cliente" value="<?= $cliente?>">
            <!-- Fim Passando valores do step 1 para step 2 -->

            <!-- Seleciona endereço -->
                <?php $optionEndereco->optionEndereco($cliente); ?>
                <!-- Botão criar endereço -->
                    <a class="" href='<?php echo "endereco.php?id={$cliente}"?>' target="_blank"><span class="badge new" data-badge-caption=""><i class="tiny material-icons">add</i> Criar endereço</span></a><br>
                    <span class="badge">Após criar endereço, atualize a página</span>
                <!-- Fim Botão criar endereço -->
            <!-- Fim seleciona endereço -->

            <!-- Botão finalizar serviço -->
                <div class="input-field col s12">
                    <input type="submit" name="cadastrar" id="cadastrar" value="Finalizar Cadastro" class="btn">
                </div>
            <!-- Fim Botão finalizar serviço -->
            
        </form>
    <!-- Fim step 2 -->
    
<?php endif;?>