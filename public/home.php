<!-- Include de check -->
    <?php 
    if(!isset($_SESSION)) 
    { 
        session_start();
    } 
        require_once "../config/header.inc.php";
        if (!isset($_SESSION['autenticado'])):
            $destino = header("Location: login.php");
        else:
    ?>
<!-- Fim Include Check -->

<!-- main Container -->
    <div class="row container">

        <!-- Mensagens ao logar -->
            <?php
                require_once "../config/alerta.inc.php";
            ?>
        <!-- Fim Mensagens Logar -->
    </div>
    <div class="row">

        <!-- Mensagens ao logar -->
            <?php
                require_once "../config/alerta.inc.php";
            ?>
        <!-- Fim Mensagens Logar -->

        <!-- Atalhos do sistema -->
            <div class="col s12">
                <div class="card">
                    <div class="card-action deep-orange darken-3 white-text">
                        <h5 class="light">
                            Atalhos do sistema
                        </h5>
                    </div>
                    <div class="card-content">
                        <!-- Banners -->
                            <div class="carousel carousel-slider center" >
                                
                                <!-- 1º Banner -->
                                    <div class="carousel-item blue white-text" href="#one!">
                                        <h2>Serviços</h2>
                                        <p class="white-text">
                                            <b> Serviços são parte fundamental do sistema.</b> <br>
                                            Através deles selecionar um cliente, endereço e os informar detalhes do serviço. <br>
                                            Podemos criar, consultar, visualizar e editar os serviços de acordo com a necessídade. <br>
                                            Cada serviço possui um Status de progresso e também um nível de prioridade. <br>

                                            Clique no botão "Serviços" no menu abaixo e utilize essa funcionalizades.
                                        </p>
                                    </div>

                                <!-- Fim 1º Banner -->

                                <!-- 2º Banner -->
                                    <div class="carousel-item amber dark-text" href="#two!">
                                        <h2>Clientes</h2>
                                        <p class="black-text">
                                            Você pode criar dois tipos de clientes no sistema: <b>Pessoa Física</b> e <b>Pessoa Jurídica</b>. <br>
                                            Sendo que o <b>CPF</b> é opcional no primeiro caso e o <b>CNPJ</b> obrigatório no segundo. <br>
                                            Cada cliente pode possuir mais de um endereço, selecionanado o local do serviço no momento da criação do mesmo. <br>
                                            Explore as funcionalidades no botão "Clientes" no menu abaiaxo.
                                        </p>
                                    </div>
                                <!-- Fim 2° Banner -->

                                <!-- 3º Banner -->
                                    <div class="carousel-item green white-text" href="#three!">
                                        <h2>Produtos</h2>
                                        <p class="white-text">
                                            Utilize produtos nos serviços! <br>
                                            Você pode criar novos produtos, editar os valores, abastecer o estoque através do menu abaixo. <br>
                                            Consulte seus produtos cadastrados no menu abaixo para editar seus detalhes.
                                        </p>
                                    </div>
                                <!-- Fim 3º Banner -->
                                
                                <!-- 4º Banner -->   
                                    <div class="carousel-item indigo white-text" href="#four!">
                                        <h2>Adicionar usuário</h2>
                                        <p class="white-text">
                                            Os usuários serão os utilizadores do sistema, funcionários, eles quem vão aceitar e criar os serviços dos clientes. <br>
                                            Apenas o <b>Administrador</b> pode criar novos usuários, alterar senhas e finalizar serviços. <br>
                                            Altere o nível de permissão dos usuários, caso necessário, ao editar seus dados!
                                        </p>
                                    </div>
                                <!-- Fim 4º Banner -->
                            </div>
                        <!-- Fim Banners -->

                      
                    </div>
                </div>
            </div>
        <!-- Fim Atalhos do sistema -->    
    
    </div>
<!-- Fim main Container -->

<!-- Dashboard Container -->
    <div class="row">
        <!-- Meus Serviços (Em andamento) -->
            <div class="col s12 l6">
                <div class="card">
                    <div class="card-action green darken-3 white-text">
                       <i class="tiny material-icons">person</i> Meus Serviços (Em andamento)
                    </div>
                    <div class="card-content">
                        <?php require_once "../database/servicos/meusServicos.php"; ?> 
                    </div>
                </div>
            </div>
        <!-- Fim Meus Serviços (Em andamento)  -->

        <!-- Serviços urgentes -->
            <div class="col s12 l6">
                <div class="card">
                    <div class="card-action yellow darken-4 white-text">
                       <i class="tiny material-icons">warning</i> Serviços Urgentes
                    </div>
                    <div class="card-content">
                        <?php require_once "../database/servicos/servicosUrgentes.php"; ?>
                    </div>
                </div>
            </div>
        <!-- Fim Serviços Urgentes -->

        <!-- Serviços nos Próximos dias -->
            <!-- <div class="col s12 l6">
                <div class="card">
                    <div class="card-action green darken-3 white-text">
                       <i class="tiny material-icons">date_range</i> Serviços nos Próximos dias
                    </div>
                    <div class="card-content">
                        <?= "Inserir Serviços nos Próximos dias"?> 
                    </div>
                </div>
            </div> -->
        <!-- Fim Serviços nos Próximos dias -->
        
        <!-- Serviços disponíveis -->
            <div class="col s12 l6">
                <div class="card">
                    <div class="card-action yellow darken-4 white-text">
                       <i class="tiny material-icons">notifications_active</i> Serviços disponíveis
                    </div>
                    <div class="card-content">
                        <?php require_once "../database/servicos/servicosAbertos.php"; ?>
                    </div>
                </div>
            </div>
        <!-- Fim Serviços disponíveis -->

        <!-- Serviços Finalizados (Pagamento Pendente)-->
            <div class="col s12 l6">
                <div class="card">
                    <div class="card-action blue darken-3 white-text">
                       <i class="tiny material-icons">money_off</i> Serviços Finalizados (Pagamento Pendente)
                    </div>
                    <div class="card-content">
                        <?php require_once "../database/servicos/servicosFinalizados.php"; ?> 
                    </div>
                </div>
            </div>
        <!-- Fim Serviços Finalizados (Pagamento Pendente) -->
        
        <!-- Serviços quitados (admin) -->
            <div class="col s12 l6">
                <div class="card">
                    <div class="card-action red white-text">
                       <i class="tiny material-icons">attach_money</i> Serviços quitados
                    </div>
                    <div class="card-content">
                        <?php require_once "../database/servicos/servicosQuitados.php"; ?>
                    </div>
                </div>
            </div>
        <!-- Fim Serviços quitados (admin) -->
        
        <!-- Serviços Cancelados -->
            <div class="col s12 l6">
                <div class="card">
                    <div class="card-action red white-text">
                       <i class="tiny material-icons">cancel</i> Serviços Cancelados
                    </div>
                    <div class="card-content">
                        <?php require_once "../database/servicos/servicosCancelados.php"; ?> 
                    </div>
                </div>
            </div>
        <!-- Fim Serviços Cancelados -->    
    </div>
<!-- Fim Dashboard Container-->

<!-- Include Footer -->
    <?php 
        endif;
        require_once "../config/footer.inc.php";
    ?>
<!-- Fim Include Footer -->