<form action="../database/clientes/update.php" method="post" class="row">
    <!-- Input ID -->
    <input type="hidden" name="id" value="<?php echo $values['id']?>">
    
    <!-- Form Edit PF -->
        <?php if($_GET['tipo'] == '1') : ?>
            <!-- Input nome -->
                <div class="input-field col s12 l6">
                    <input type="text" name="nome" id="nome" value="<?php echo $values['nome']?>" maxlength="255" required autofocus>
                    <label for="nome">Digite o nome do cliente</label>
                </div>
        
            <!-- Input condominio  -->  
                <input type="hidden" name="nomeCondominio" id="nome" value="">

            <!-- Input Telefone -->
                <div class="input-field col s12 l6">
                    <input type="text" name="telefone" id="telefone" value="<?php echo $values['telefone']?>" maxlength="255" required>
                    <label for="telefone">Digite o Telefone do cliente</label>
                </div>

            <!-- Input opcional CPF -->
                <div class="input-field col s12 l6">
                    <input type="text" name="cpf" id="cpf" value="<?php echo $values['cpf']?>" maxlength="11">
                    <label for="cpf">Digite o CPF do cliente (Opcional)</label>
                </div>

            <!-- Input Opcional Email -->
                <div class="input-field col s12 l6">
                    <input type="email" name="email" id="email" value="<?php echo $values['email']?>" maxlength="255">
                    <label for="email">Digite o E-mail do cliente (Opcional)</label>
                </div>

            <!-- Input observações -->
                <div class="input-field col s12">
                    <label for="observacoes">Digite as observações do cliente (Opcional)</label>
                    <textarea type="text" name="observacoes" id="observacoes" class="materialize-textarea"><?php echo $values['observacoes'];?></textarea>
                </div>
                
            <!-- Input tipoCliente -->
                <input type="hidden" value="1" name="tipoCliente">
    <!-- Fim Form edit PF -->
        
    <!-- Form Edit PJ -->
        <?php elseif($_GET['tipo'] == '2') : ?>
            <!-- Input Nome responsável -->
            <div class="input-field col s12 l6">
                <input type="text" name="nome" id="nome" value="<?= $values['nome'] ?>" maxlength="255" required autofocus>
                <label for="nome">Digite o nome do responsável</label>
            </div>
            
            <!-- Input Nome Condominio -->
            <div class="input-field col s12 l6">
                <input type="text" name="nomeCondominio" id="nome" value="<?= $values['nomeCondominio'] ?>" maxlength="255" required>
                <label for="nomeCondominio">Digite o nome do condomínio/Edifício</label>
            </div>
            
            
            <!-- Input Telefone -->
            <div class="input-field col s12 l6">
                <input type="text" name="telefone" id="telefone" value="<?= $values['telefone'] ?>" maxlength="255" required>
                <label for="telefone">Digite o Telefone do cliente</label>
            </div>
            
            <!-- Input CNPJ -->
            <div class="input-field col s12 l6">
                <input type="text" name="cpf" id="cpf" value="<?= $values['cpf'] ?>" maxlength="255" required>
                <label for="cpf">Digite o CNPJ do cliente</label>
            </div>
            
            <!-- Input e-mail -->
            <div class="input-field col s12 l12">
                <input type="email" name="email" id="email" value="<?= $values['email'] ?>" maxlength="255">
                <label for="email">Digite o E-mail do cliente (Opcional)</label>
            </div>
            
            <!-- Input Observações -->
            <div class="input-field col s12">
                <label for="observacoes">Digite as observações do cliente (Opcional)</label>
                <textarea type="text" name="observacoes" id="observacoes" class="materialize-textarea"><?= $values['observacoes'] ?></textarea>
            </div>
            
            <input type="hidden" value="2" name="tipoCliente"> 
    <!-- Fim Form edit PJ -->
        <?php endif?>

<!-- Botão submit -->
    <div class="input-field col s12">
        <input type="submit" name="cadastrar" id="cadastrar" value="atualizar" class="btn green">
    </div>
</form>