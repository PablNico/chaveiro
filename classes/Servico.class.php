<?php
    require_once "crudServico.php";
    class Servico extends Connection implements crudServico
    {
        private $id, $descricao, $status, $prioridade,
                $dataInicio, $dataFim, $valorTotal, 
                $valorPago,  $usuario, $cliente, $endereco;

                
        //Getters
            public function getId()
            {
                return $this->id;
            }
            public function getDescricao()
            {
                return $this->descricao;
            }
            public function getDataInicio()
            {
                return $this->dataInicio;
            }
            public function getValorTotal()
            {
                return $this->valorTotal;
            }
            public function getValorPago()
            {
                            return $this->valorPago;
            }
            public function getFinalizado()
            {
                            return $this->finalizado;
            }
            public function getCancelado()
            {
                            return $this->cancelado;
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
            
            public function setDataInicio($dataInicio)
            {
                $this->dataInicio = $dataInicio;
                
                return $this;
            }
            
            public function setValorTotal($valorTotal)
            {
                $this->valorTotal = $valorTotal;
                
                return $this;
            }
            
            public function setValorPago($valorPago)
            {
                $this->valorPago = $valorPago;
                
                return $this;
            }
            
            
            public function setFinalizado($finalizado)
            {
                $this->finalizado = $finalizado;
                
                return $this;
            }
            
            
            public function setCancelado($cancelado)
            {
                $this->cancelado = $cancelado;
                
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
                $_dataInicio = $this->getDataInicio();
                $_usuario = $this->getUsuario();
                $_cliente = $this->getCliente();
                $_endereco = $this->getEndereco();

                $conn = $this->connect();
                $sql = "INSERT INTO servicos VALUES 
                (DEFAULT, :descricao , :dataInicio, DEFAULT ,DEFAULT, DEFAULT, DEFAULT, :usuario, :cliente, :endereco)";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":descricao", $_descricao);
                $stmt->bindParam(":dataInicio", $_dataInicio);
                $stmt->bindParam(":usuario", $_usuario);
                $stmt->bindParam(":cliente", $_cliente);
                $stmt->bindParam(":endereco", $_endereco);

                if($stmt->execute())
                {
                    $_SESSION['sucesso'] = "Serviço cadastrado com sucesso!";

                    $ultimoServico = $conn->lastInsertId();
                    $sql = "INSERT INTO item VALUES (DEFAULT, DEFAULT, :servico)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(":servico", $ultimoServico);
                    if($stmt->execute())
                    {
                        $ultimoItem = $conn->lastInsertId();
                        $destino = header("Location: add-produto.php?id={$ultimoItem}");
                    }
                }
                else
                {
                    echo "{$_dataInicio} deu ruim";
                }
            }

            public function read($search)
            {
                $conn = $this->connect();
                
                $sql = "SELECT * FROM servicos";

                $stmt = $conn->prepare($sql);
                $stmt->execute();
                
                $result = $stmt->fetchAll();
                
                foreach ($result as $values) 
                {
                    echo "<tbody>
                            <th>{$values['id']}</th>
                            <th>{$values['id']}</th>
                         </tbody>";
                }

            }

            public function update($id, $descricao, $dataInicio, $valorTotal, $valorPago, $cliente, $idEndereco)
            {
                
            }

            public function delete($id)
            {
                
            }

        //Específicios
            public function dadosDoFormulario($descricao, $dataInicio, $usuario, $cliente, $endereco)
            {
                $this->setDescricao($descricao);
                $this->setDataInicio($dataInicio);
                $this->setCliente($cliente);
                $this->setEndereco($endereco);
                $this->setUsuario($usuario);
            }

            public function dadosDaTabela()
            {

            }

            public function detalhesServico($id)
            {
                $this->setId($id);
                $_id = $this->getId();

                $conn = $this->connect();

                $sql = "SELECT  servicos.id,
                                servicos.descricao,
                                servicos.dataInicio,
                                servicos.valorTotal,
                                servicos.valorPago,
                                servicos.finalizado,
                                servicos.cancelado,
                                clientes.nome,
                                clientes.id as clienteId
                        FROM servicos JOIN clientes 
                        ON  servicos.cliente = clientes.id WHERE servicos.id = :id";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":id", $_id);

                $stmt->execute();

                $result = $stmt->fetchAll();
                
                foreach($result as $values)
                {
                    echo "<blockquote class='light'>Cliente: <span class='badge'><a href='detalhes-cliente.php?id={$values['clienteId']}'> {$values['nome']}</a></span></blockquote><hr>";
                    echo "<blockquote class='light'>ID no Banco de dados: <span class='badge'>{$values['id']}</span></blockquote><hr>
                          <blockquote class='light'>Descrição: <span class='badge'>{$values['descricao']}</span></blockquote><hr>
                          <blockquote class='light'>Data de início: <span class='badge'>{$values['dataInicio']}</span></blockquote><hr>
                          <blockquote class='light'>Valor total (R$): <span class='badge'>R$ {$values['valorTotal']}</span></blockquote><hr>
                          <blockquote class='light'>Valor Pago (R$): <span class='badge'>R$ {$values['valorPago']}</span></blockquote><hr>";
                    
                    //Condicional Finalizado "sim" ou "Não"
                        if ($values['finalizado'] != 1)  
                        {
                            echo "<blockquote class='light'>Finalizado: <span class='badge'>Não</span></blockquote><hr>";
                        }
                        else
                        {
                            echo "<blockquote class='light'>Finalizado: <span class='badge'>Sim</span></blockquote><hr>";
                        }

                    //Condicional Finalizado "sim" ou "Não"
                        if ($values['cancelado'] != 1)  
                        {
                            echo "<blockquote class='light'>Cancelado: <span class='badge'>Não</span></blockquote><hr>";
                        }
                        else
                        {
                            echo "<blockquote class='light'>Cancelado: <span class='badge'>Sim</span></blockquote><hr>";
                        }
                    
                    //Botões
                        if ($values['cancelado'] != 0 )
                        {
                            echo "<a href='../database/servicos/reativar.php?id={$values['id']}' class='btn '>Reativar</a>";
                        }
                        elseif($values['finalizado'] != 0)
                        {
                            echo "<a href='../database/servicos/reativar.php?id={$values['id']}' class='btn '>Reativar</a>";  
                        }
                        else
                        {
                            echo "<td>
                                    <a href='pagar-servico.php?id={$values['id']}' class='btn '>Pagar</a>
                                </td>";
                            echo "<td>
                                    <a href='../database/servicos/finalizar.php?id={$values['id']}' class='btn green darken-2'>Finalizar</a>
                                </td>";
                            echo "<td>
                                    <a href='../database/servicos/cancelar.php?id={$values['id']}' class='btn red'>Cancelar</a>
                                </td>";
                        }
                      
                }
            }
            public function reativarServico($id)
            {
                $this->setId($id);
                $_id = $this->getId();
                
                $conn = $this->connect();
                
                $sql = "SELECT finalizado, cancelado FROM servicos WHERE id = :id";
                
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":id", $_id);
                $stmt->execute();

                $result = $stmt->fetch();
                if ($result['finalizado'] == 1) {
                    $sql = "UPDATE servicos SET finalizado = 0 WHERE id = :id";
                }
                elseif($result['cancelado'] == 1)
                {
                    $sql = "UPDATE servicos SET cancelado = 0 WHERE id = :id";
                }



                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":id", $_id);
                if($stmt->execute())
                {
                    $_SESSION['sucesso'] = "Valor creditado com sucesso!";
                    $destino = header("location: ../../public/detalhes-servico.php?id={$_id}");
                }
                
            }

            public function cancelarServico($id)
            {
                $this->setId($id);
                $_id = $this->getId();

                $conn = $this->connect();

                $sql = "UPDATE servicos SET cancelado = 1 WHERE id = :id";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":id", $_id);
                if($stmt->execute())
                {
                    $_SESSION['sucesso'] = "Valor creditado com sucesso!";
                    $destino = header("location: ../../public/detalhes-servico.php?id={$_id}");
                }

                
            }

            public function finalizarServico($id)
            {
                $this->setId($id);
                $_id = $this->getId();

                $conn = $this->connect();

                $sql = "UPDATE servicos SET finalizado = 1 WHERE id = :id";

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
            public function servicosAbertos()
            {
                $conn = $this->connect();
                $sql = "SELECT  servicos.id,
                                servicos.descricao,
                                clientes.nome
                        FROM `servicos` JOIN clientes 
                        ON servicos.cliente = clientes.id  
                        WHERE usuario is null";

                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll();
                foreach($result as $values)
                {
                    echo "<a href='detalhes-servico.php?id={$values['id']}'>{$values['descricao']} - {$values['nome']} </a><hr/>";
                }
            }

            public function meusServicos($id)
            {
                $this->setId($id);
                $_id = $this->getId();

                $conn = $this->connect();
                $sql = "SELECT  servicos.id,
                                servicos.descricao,
                                clientes.nome
                        FROM `servicos` JOIN clientes 
                        ON servicos.cliente = clientes.id
                        WHERE usuario = :id AND cancelado = 0 AND finalizado = 0";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":id", $_id);
                $stmt->execute();
                $result = $stmt->fetchAll();
                foreach($result as $values)
                {
                    echo "<a href='detalhes-servico.php?id={$values['id']}'>{$values['descricao']} - {$values['nome']}</a><hr> ";
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
                        ON servicos.cliente = clientes.id
                        WHERE usuario = :id AND cancelado = 0 AND finalizado = 1";

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
                        ON servicos.cliente = clientes.id
                        WHERE usuario = :id AND cancelado = 1 AND finalizado = 0";

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
                
                
                
                
                
                
                
                