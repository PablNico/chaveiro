<?php
    require_once "crudServico.php";
    class Servico extends Connection implements crudServico
    {
        private $id, $descricao, $status, $prioridade,
                $dataInicio, $dataFim, $plantao, $usuario, $cliente, $endereco;

                
        //Getters
            public function getId()
            {
                return $this->id;
            }
            public function getDescricao()
            {
                return $this->descricao;
            }

            public function getPlantao()
            {
                return $this->plantao;
            }

            public function getStatus()
            {
                    return $this->status;
            }

            public function getPrioridade()
            {
                    return $this->prioridade;
            }
    
            public function getDataInicio()
            {
                return $this->dataInicio;
            }

            
            public function getDataFim()
            {
                return $this->dataFim;
            }
            
            public function getUsuario()
            {
                            return $this->usuario;
            }
            
            public function getCliente()
            {
                            return $this->cliente;
            }

            public function getEndereco()
            {
                            return $this->endereco;
            }
        
                
        //Setters
            public function setId($id)
            {
                $this->id = $id;
                
                return $this;
            }
            
            public function setDescricao($descricao)
            {
                $this->descricao = $descricao;
                
                return $this;
            }

            public function setPlantao($plantao)
            {
                $this->plantao = $plantao;
                
                return $this;
            }

              
            public function setStatus($status)
            {
                    $this->status = $status;
    
                    return $this;
            }
            
            public function setPrioridade($prioridade)
            {
                $this->prioridade = $prioridade;

                return $this;
            }

            public function setDataInicio($dataInicio)
            {
                $this->dataInicio = $dataInicio;
                
                return $this;
            }
            
            public function setDataFim($dataFim)
            {
                $this->dataFim = $dataFim;

                return $this;
            }

            public function setUsuario($usuario)
            {
                            $this->usuario = $usuario;

                            return $this;
            }
            
            public function setCliente($cliente)
            {
                $this->cliente = $cliente;
                
                return $this;
            }
            
            
            public function setEndereco($endereco)
            {
                $this->endereco = $endereco;
                
                return $this;
            }

        //Interface
            public function create()
            {
                $_descricao = $this->getDescricao();
                $_plantao = $this->getPlantao();
                $_prioridade = $this->getPrioridade();
                $_dataInicio = $this->getDataInicio();
                $_usuario = $this->getUsuario();
                $_cliente = $this->getCliente();
                $_endereco = $this->getEndereco();

                $conn = $this->connect();
                
                // DEFAULT = ID, Status, Data Fim, Comanda
                if($this->getUsuario() == 0)
                {
                    $sql = "INSERT INTO servicos VALUES 
                    (DEFAULT, :descricao, :plantao, DEFAULT, :prioridade, :dataInicio, DEFAULT, DEFAULT, DEFAULT, :cliente, :endereco)"; 
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(":descricao", $_descricao);
                    $stmt->bindParam(":plantao", $_plantao);
                    $stmt->bindParam(":prioridade", $_prioridade);
                    $stmt->bindParam(":dataInicio", $_dataInicio);
                    $stmt->bindParam(":cliente", $_cliente);
                    $stmt->bindParam(":endereco", $_endereco);
                }
                else
                {
                    $sql = "INSERT INTO servicos VALUES 
                    (DEFAULT, :descricao, :plantao, DEFAULT, :prioridade, :dataInicio, DEFAULT, DEFAULT, :usuario, :cliente, :endereco)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(":descricao", $_descricao);
                    $stmt->bindParam(":plantao", $_plantao);
                    $stmt->bindParam(":prioridade", $_prioridade);
                    $stmt->bindParam(":dataInicio", $_dataInicio);
                    $stmt->bindParam(":usuario", $_usuario);
                    $stmt->bindParam(":cliente", $_cliente);
                    $stmt->bindParam(":endereco", $_endereco);
                }
                
                

                if($stmt->execute())
                {
                    $_SESSION['sucesso'] = "Serviço cadastrado com sucesso!";
                    // echo __DIR__;
                    $destino = header("Location: ../../public/consulta-servicos.php");
                    
                }
                else
                {
                    print_r($stmt->errorInfo());
                }
            }

            public function read($search)
            {
                $conn = $this->connect();
                
                $search = "%{$search}%";
                $sql = "SELECT servicos.id,
                               servicos.descricao,
                               servicos.status,
                               servicos.prioridade,
                               servicos.dataInicio,
                               servicos.dataFim,
                               servicos.idComanda AS comanda,
                               usuario.nome AS usuario,
                               clientes.nome AS cliente,
                               endereco.logradouro AS logradouro,
                               endereco.nome AS endereco,
                               endereco.numero AS numero
                        FROM 
                            servicos 
                        JOIN 
                            usuario ON usuario.id = servicos.idUsuario
                        JOIN 
                            clientes ON clientes.id = servicos.idCliente
                        JOIN
                            endereco ON endereco.id = servicos.idEndereco

                        WHERE
                            (servicos.descricao LIKE :search) OR
                            (endereco.nome LIKE :search) OR
                            (usuario.nome LIKE :search) OR

                            (clientes.nome LIKE :search)";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":search", $search);
                $stmt->execute();
                
                $result = $stmt->fetchAll();
                foreach ($result as $values) 
                {
                    echo "<tr>
                            <td><a href='detalhes-servico.php?id={$values['id']}'> {$values['descricao']}</a></td>
                            <td>{$values['cliente']}</td>
                            <td>{$values['logradouro']} {$values['endereco']} - N° {$values['numero']}</td>
                            <td>{$values['usuario']}</td>";

                 echo   "<td>
                            <a class='btn-floating btn-small waves-effect waves-light red' href='../database/servicos/delete.php?id={$values['id']}'><i class='material-icons left'>delete</i>Deletar</a>
                        </td>
                    
                        </tr>";
                }

            }

            public function update($id, $descricao, $plantao, $dataInicio, $valorTotal, $valorPago, $cliente, $idEndereco)
            {
                
            }

            public function delete($id)
            {
                $conn = $this->connect();

                $this->setId($id);
                $_id = $this->getId();

                $sql = "DELETE FROM servicos WHERE id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":id", $_id);

                if($stmt->execute())
                {
                    $_SESSION['sucesso'] = "Serviço excluído com sucesso!";
                    $destino = header("Location: ../../public/consulta-servicos.php");
                }
                else
                {
                    $_SESSION['erro'] = "Erro ao excluir serviço!";
                    print_r($stmt->errorInfo());
                    // $destino = header("Location: ../../public/consulta-servicos.php");
                }
            }

        //Específicios
            public function dadosDoFormulario($descricao, $plantao, $status, $prioridade, $dataInicio, $usuario, $cliente, $endereco)
            {
                $this->setDescricao($descricao);
                $this->setPlantao($plantao);
                $this->setStatus($status);
                $this->setPrioridade($prioridade);
                $this->setDataInicio($dataInicio);
                $this->setUsuario($usuario);
                $this->setCliente($cliente);
                $this->setEndereco($endereco);
            }

            public function dadosDaTabela($id)
            {
                $this->setId($id);
                $_id = $this->getId();

                $conn = $this->connect();
                $sql = "SELECT * FROM servico WHERE id = :id";
                
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id', $_id);

                $stmt->execute();

                $result = $stmt->fetchAll();

                foreach($result as $values)
                {
                    require_once "../forms/form-edit-servico.php";
                }
            }

            public function detalhesServico($id)
            {
                $this->setId($id);
                $_id = $this->getId();

                $conn = $this->connect();

                $sql = "SELECT  servicos.id,
                                servicos.descricao,
                                servicos.plantao,
                                servicos.status,
                                servicos.prioridade,
                                servicos.dataInicio,
                                servicos.dataFim,
                                clientes.nome,
                                clientes.id as clienteId,
                                endereco.logradouro,
                                endereco.nome as rua,
                                endereco.numero,
                                endereco.edificio,
                                endereco.complemento,
                                endereco.cidade,
                                endereco.uf
                        FROM servicos 
                        JOIN clientes ON servicos.idCliente = clientes.id 
                        JOIN endereco ON servicos.idEndereco = endereco.id
                        WHERE servicos.id = :id";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":id", $_id);

                $stmt->execute();

                $result = $stmt->fetchAll();
                
                foreach($result as $values)
                {
                    echo "<blockquote class='light'>Cliente: <span class='badge'><a href='detalhes-cliente.php?id={$values['clienteId']}'> {$values['nome']}</a></span></blockquote><hr>
                          <blockquote class='light'>Descrição: <span class='badge'>{$values['descricao']}</span></blockquote><hr>
                          <blockquote class='light'>Tipo de serviço: <span class='badge'>{$this->traduzirPlantao($values['plantao'])}</span></blockquote><hr>
                          <blockquote class='light'>Status: <span class='badge'>{$this->traduzirStatus($values['status'])}</span></blockquote><hr>
                          <blockquote class='light'>Prioridade: <span class='badge'>{$this->traduzirPrioridade($values['prioridade'])}</span></blockquote><hr>
                          <blockquote class='light'>Endereço: <span class='badge'>{$values['logradouro']} {$values['rua']} Nº{$values['numero']}, {$values['edificio']} {$values['complemento']} {$values['cidade']} - {$values['uf']}</span></blockquote><hr>
                          <blockquote class='light'>Data de início: <span class='badge'>{$this->traduzirData($values['dataInicio'])}</span></blockquote><hr>
                          <blockquote class='light'>Data de finalização: <span class='badge'>{$this->traduzirData($values['dataFim'])}</span></blockquote><hr>";
                }

                $this->mostrarBotoes($values['id'], $values['status']);
               
            }

            public function mostrarBotoes($id, $status)
            {
                echo "<a href='#' class='btn orange'>Visualizar produtos </a> ";
                echo "<a href='pagar-servico.php?id={$id}' class='btn blue'>Pagar valor</a> ";
                
                if($status == 1)
                {
                    echo "<a href='../database/servicos/finalizar.php?id={$id}' class='btn green'>Finalizar</a> ";
                }
                else
                {
                    echo "<a href='../database/servicos/reativar.php?id={$id}' class='btn green'>Reativar</a> ";
                }
                if($status != 4)
                {
                    echo "<a href='../database/servicos/cancelar.php?id={$id}' class='btn red'>Cancelar</a>";
                }
            }
            public function traduzirStatus($status)
            {
                if($status == 1)
                {
                    return "Andamento";
                }
                elseif($status == 2)
                {
                    return "Finalizado";
                }
                elseif($status == 3)
                {
                    return "Quitado";
                }
                elseif($status == 4)
                {
                    return "Cancelado";
                }
            }

            public function traduzirPlantao($plantao)
            {
                if($plantao == 0)
                {
                    return "Serviço normal";
                }
                elseif($plantao == 1)
                {
                    return "Serviço plantão";
                }
            }
            
            private function traduzirPrioridade($prioridade)
            {
                if($prioridade == 0)
                {
                    return "Baixa";
                }
                elseif($prioridade == 1)
                {
                    return "Média";
                }
                elseif($prioridade == 2)
                {
                    return "Alta";
                }
                elseif($prioridade == 3)
                {
                    return "Urgente";
                }
            }

            public function traduzirData($data)
            {
                if($data != null)
                {
                    return date('d/m/Y H:m:s', strtotime($data));
                }
                else {
                    return "<i>Não finalizado</i>";
                }
            }


            public function reativarServico($id)
            {
                $this->setId($id);
                $_id = $this->getId();
                
                $conn = $this->connect();
                
                $sql = "UPDATE servicos SET status = 1 WHERE id = :id";



                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":id", $_id);
                if($stmt->execute())
                {
                    $_SESSION['sucesso'] = "Serviço reativado!";
                    $destino = header("location: ../../public/detalhes-servico.php?id={$_id}");
                }
                
            }

            public function cancelarServico($id)
            {
                $this->setId($id);
                $_id = $this->getId();

                $conn = $this->connect();

                $sql = "UPDATE servicos SET status = 4 WHERE id = :id";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":id", $_id);
                if($stmt->execute())
                {
                    $_SESSION['sucesso'] = "Serviço cancelado!";
                    $destino = header("location: ../../public/detalhes-servico.php?id={$_id}");
                }

                
            }

            public function finalizarServico($id)
            {
                $this->setId($id);
                $_id = $this->getId();

                $conn = $this->connect();

                $sql = "UPDATE servicos SET status = 2, dataFim = CURDATE() WHERE id = :id";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":id", $_id);

                if($stmt->execute())
                {
                    $_SESSION['sucesso'] = "Valor creditado com sucesso!";
                    $destino = header("location: ../../public/detalhes-servico.php?id={$_id}");
                }
            }

            public function pagarServico($id, $valor)
            {
                $this->setId($id);
                $_id = $this->getId();

                $conn = $this->connect();

                $sql = "SELECT valorPago, valorTotal FROM servicos WHERE id = :id";
                
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":id", $id);
                $stmt->execute();

                $result = $stmt->fetch();
                $valorPago = $result['valorPago'] + $valor;
                
                $sql = "UPDATE servicos SET valorPago = :valorPago WHERE id = :id";
                
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":id", $_id);
                $stmt->bindParam(":valorPago", $valorPago);
                if($stmt->execute())
                {
                    $_SESSION['sucesso'] = "Valor creditado com sucesso!";
                    $destino = header("location: ../../public/detalhes-servico.php?id={$_id}");
                }

            }

            public function optionPrioridade()
            {
                $prioridade = ["Baixa", "Média", "Alta", "Urgente"];

                foreach($prioridade as $key => $values)
                {
                    echo "<option value='{$key}'>{$values}</option>";
                }

            }
        //Notificações Home.php    
            public function meusServicos($id)
            {
                $this->setId($id);
                $_id = $this->getId();

                $conn = $this->connect();
                $sql = "SELECT  servicos.id,
                                servicos.descricao,
                                clientes.nome
                        FROM `servicos` JOIN clientes 
                        ON servicos.idCliente = clientes.id
                        WHERE idUsuario = :id AND status = 1";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":id", $_id);
                $stmt->execute();
                $result = $stmt->fetchAll();
                foreach($result as $values)
                {
                    echo "<a href='detalhes-servico.php?id={$values['id']}'>{$values['descricao']} - {$values['nome']}</a><hr> ";
                }
            }

            public function servicosUrgentes($id)
            {
                $this->setId($id);
                $_id = $this->getId();

                $conn = $this->connect();
                $sql = "SELECT  servicos.id,
                                servicos.descricao,
                                clientes.nome
                        FROM `servicos` JOIN clientes 
                        ON servicos.idCliente = clientes.id
                        WHERE idUsuario = :id AND status = 1 AND prioridade = 3";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":id", $_id);
                $stmt->execute();
                $result = $stmt->fetchAll();
                foreach($result as $values)
                {
                    echo "<a href='detalhes-servico.php?id={$values['id']}'>{$values['descricao']} - {$values['nome']}</a><hr> ";
                }
            }

            public function proximosServicos($id)
            {

            }

            public function servicosAbertos()
            {
                $conn = $this->connect();
                $sql = "SELECT  servicos.id,
                                servicos.descricao,
                                clientes.nome
                        FROM `servicos` JOIN clientes 
                        ON servicos.idCliente = clientes.id  
                        WHERE idUsuario is null AND status = 1";

                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll();
                foreach($result as $values)
                {
                    echo "<a href='detalhes-servico.php?id={$values['id']}'>{$values['descricao']} - {$values['nome']} </a><hr/>";
                }
            }

          

            public function meusServicosFinalizados($id)
            {
                $this->setId($id);
                $_id = $this->getId();

                $conn = $this->connect();
                $sql = "SELECT  servicos.id,
                                servicos.descricao,
                                clientes.nome
                        FROM `servicos` JOIN clientes 
                        ON servicos.idCliente = clientes.id
                        WHERE idUsuario = :id AND status = 2 ";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":id", $_id);
                $stmt->execute();
                $result = $stmt->fetchAll();
                foreach($result as $values)
                {
                    echo "<a href='detalhes-servico.php?id={$values['id']}'>{$values['descricao']} - {$values['nome']}</a><hr> ";
                }
            }

                        
            public function servicosQuitados($id)
            {
                $this->setId($id);
                $_id = $this->getId();

                $conn = $this->connect();
                $sql = "SELECT  servicos.id,
                                servicos.descricao,
                                clientes.nome
                        FROM `servicos` JOIN clientes 
                        ON servicos.idCliente = clientes.id
                        WHERE status = 3 ";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":id", $_id);
                $stmt->execute();
                $result = $stmt->fetchAll();
                foreach($result as $values)
                {
                    echo "<a href='detalhes-servico.php?id={$values['id']}'>{$values['descricao']} - {$values['nome']}</a><hr> ";
                }
            }
            
            public function meusServicosCancelados($id)
            {
                $this->setId($id);
                $_id = $this->getId();

                $conn = $this->connect();
                $sql = "SELECT  servicos.id,
                                servicos.descricao,
                                clientes.nome
                        FROM `servicos` JOIN clientes 
                        ON servicos.idCliente = clientes.id
                        WHERE idUsuario = :id AND status = 4";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":id", $_id);
                $stmt->execute();
                $result = $stmt->fetchAll();
                foreach($result as $values)
                {
                    echo "<a href='detalhes-servico.php?id={$values['id']}'>{$values['descricao']} - {$values['nome']}</a><hr> ";
                }
            }

    
  


    } 


?>