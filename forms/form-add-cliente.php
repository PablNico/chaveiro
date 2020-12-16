<?php 
    if (!isset($_SESSION['autenticado'])):
        $destino = header("Location: login.php");
    else:
?>
<form action="../database/clientes/create.php" method="post" class="row">
<!-- Form PF -->
    <?php if($_SESSION['tipoCliente'] == "pessoaFisica"): ?>

        
        <!-- Input nome -->
        <div class="input-field col s12 l6">
            <input type="text" name="nome" id="nome" maxlength="255" required autofocus>
            <label for="nome">Digite o nome do cliente</label>
        </div>
        
        <input type="hidden" name="nomeCondominio" id="nome" value="">

        <!-- Input Telefone -->
        <div class="input-field col s12 l6">
            <input type="text" name="telefone" id="telefone" maxlength="255" required>
            <label for="telefone">Digite o Telefone do cliente</label>
        </div>

        <!-- Input opcional CPF -->
        <div class="input-field col s12 l6">
            <input type="text" name="cpf" id="cpf" value="" data-mask="000.000.000-42" maxlength="11">
            <label for="cpf">Digite o CPF do cliente (Opcional)</label>
        </div>

        <!-- Input Opcional Email -->
        <div class="input-field col s12 l6">
            <input type="email" name="email" id="email" value="" maxlength="255">
            <label for="email">Digite o E-mail do cliente (Opcional)</label>
        </div>

        <!-- Input observações -->
        <div class="input-field col s12">
            <label for="observacoes">Digite as observações do cliente (Opcional)</label>
            <textarea type="text" name="observacoes" id="observacoes" class="materialize-textarea"></textarea>
        </div>
        <input type="hidden" value="1" name="tipoCliente">
        
<!-- Form PJ -->
        <?php elseif($_SESSION['tipoCliente'] == "pessoaJuridica"): ?>

            <!-- Input Nome responsável -->
            <div class="input-field col s12 l6">
                <input type="text" name="nome" id="nome" maxlength="255" required autofocus>
                <label for="nome">Digite o nome do responsável</label>
            </div>

            <!-- Input Nome Condominio -->
            <div class="input-field col s12 l6">
                <input type="text" name="nomeCondominio" id="nome" maxlength="255" required>
                <label for="nomeCondominio">Digite o nome do condomínio/Edifício</label>
            </div>


            <!-- Input Telefone -->
            <div class="input-field col s12 l6">
                <input type="text" name="telefone" id="telefone" maxlength="255" required>
                <label for="telefone">Digite o Telefone do cliente</label>
            </div>

            <!-- Input CNPJ -->
            <div class="input-field col s12 l6">
                <input type="text" name="cpf" id="cpf" maxlength="255" required>
                <label for="cpf">Digite o CNPJ do cliente</label>
            </div>

            <!-- Input e-mail -->
            <div class="input-field col s12 l12">
                <input type="email" name="email" id="email" maxlength="255">
                <label for="email">Digite o E-mail do cliente (Opcional)</label>
            </div>
            
            <!-- Input Observações -->
            <div class="input-field col s12">
                <label for="observacoes">Digite as observações do cliente (Opcional)</label>
                <textarea type="text" name="observacoes" id="observacoes" class="materialize-textarea"></textarea>
            </div>

            <input type="hidden" value="2" name="tipoCliente"> 
        
<!-- Fim if -->
        <?php endif; ?>

<!-- Botões Enviar e Limpar -->
        <div class="input-field col s12">
            <input type="submit" name="cadastrar" id="cadastrar" value="cadastrar" class="btn">
            <a href="clientes.php" type="reset" name="limpar" class="btn red">limpar</a><br><br>
            <a href="clientes.php?recomecar=1" type="reset" name="limpar" class="btn yellow darken-4">Mudar tipo cliente</a>
        </div>
</form>
        <?php endif;?>