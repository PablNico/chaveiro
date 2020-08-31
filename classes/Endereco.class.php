<?php 
    require_once 'crudEndereco.php';
    class Endereco extends Connection implements crudEndereco 
    {
        private $id, $logradouro, $nome, $numero, $edificio, $complemento, $cidade, $uf, $cliente;

        //Getters
            public function getId()
            {
                return $this->id;
            }
            
            public function getLogradouro()
            {
                    return $this->logradouro;
            }
    
            public function getNome()
            {
                return $this->nome;
            }
            
            public function getNumero()
            {
                return $this->numero;
            }

            public function getEdificio()
            {
                    return $this->edificio;
            }
            
            public function getComplemento()
            {
                return $this->complemento;
            }
            
            public function getCidade()
            {
                return $this->cidade;
            }
            
            public function getUf()
            {
                    return $this->uf;
            }

            public function getCliente()
            {
                    return $this->cliente;
            }


        //Setter
            public function setId($id)
            {
                    $this->id = $id;

                    return $this;
            }

            public function setLogradouro($logradouro)
            {
                    $this->logradouro = $logradouro;
    
                    return $this;
            }

            public function setNome($nome)
            {
                    $this->nome = $nome;

                    return $this;
            }

            public function setNumero($numero)
            {
                    $this->numero = $numero;

                    return $this;
            }
                        
            public function setEdificio($edificio)
            {
                    $this->edificio = $edificio;

                    return $this;
            }

            public function setCidade($cidade)
            {
                    $this->cidade = $cidade;

                    return $this;
            }

            public function setComplemento($complemento)
            {
                    $this->complemento = $complemento;

                    return $this;
            }

            public function setUf($uf)
            {
                    $this->uf = $uf;

                    return $this;
            }


            public function setCliente($cliente)
            {
                    $this->cliente = $cliente;

                    return $this;
            }
            
        //Interface
            public function create()
            {
                $conn = $this->connect();

                $logradouro = $this->getLogradouro();
                $nome = $this->getNome();
                $numero = $this->getNumero();
                $edificio = $this->getEdificio();
                $complemento = $this->getComplemento();
                $cidade = $this->getCidade();
                $uf = $this->getUf();
                $cliente = $this->getCliente();

                $sql = "INSERT INTO endereco VALUES
                (DEFAULT, :logradouro, :nome, :numero, :edificio, :complemento, :cidade, :uf, :cliente)";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":logradouro", $logradouro);
                $stmt->bindParam(":nome", $nome);
                $stmt->bindParam(":numero", $numero);
                $stmt->bindParam(":edificio", $edificio);
                $stmt->bindParam(":complemento", $complemento);
                $stmt->bindParam(":cidade", $cidade);
                $stmt->bindParam(":uf", $uf);
                $stmt->bindParam(":cliente", $cliente);

                if ($stmt->execute()) 
                {
                    $last_id = $conn->lastInsertId();
                    $_SESSION['sucesso'] = "Endereço cadastrado com sucesso!";
                    $destino = header("Location: ../../public/detalhes-cliente.php?id={$cliente}");
                }
                else
                {
                    $_SESSION['erro'] = "Erro ao cadastrar endereço!";
                    $destino = header("Location: ../../public/detalhes-cliente.php?id={$cliente}");
                }

            }

            public function read()
            {
                $conn = $this->connect();

                $search = "%";

                $sql = "SELECT  endereco.id,
                                endereco.nome,
                                endereco.numero,
                                endereco.complemento,
                                endereco.cidade,
                                endereco.uf,
                                clientes.id as clienteId,
                                clientes.nome
                                FROM endereco JOIN clientes 
                        ON endereco.cliente = clientes.id
                        WHERE endereco.id LIKE :search
                        ORDER BY clientes.id ASC";
                
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":search", $search);
                $stmt->execute();
                $result = $stmt->fetchAll();
                foreach ($result as $values) 
                {
                    $this->setId($values['id']);
                    $this->setNome($values['nome']);
                    $this->setNumero($values['numero']);
                    $this->setComplemento($values['complemento']);
                    $this->setCidade($values['cidade']);
                    $this->setUf($values['uf']);
                    $this->setCliente($values['clienteId']);

                    $_id = $this->getId(); 
                    $_nome = $this->getNome();
                    $_numero = $this->getNumero();
                    $_complemento = $this->getComplemento();
                    $_cidade = $this->getCidade();
                    $_uf = $this->getUf();
                    $_clienteId = $this->getCliente();
                    $_clienteNome = $values['nome'];

                    echo "<tr>";
                        echo "<td>{$_id}</td>";
                        echo "<td>{$_nome} - N° {$_numero} </td>";
                        echo "<td>{$_cidade}"."-"."{$_uf}</td>";
                        echo "<td><a href='detalhes-cliente.php?id={$_clienteId}'>{$_clienteNome}</a></td>";
                        echo "<td>
                                <a href='edit-endereco.php?id={$_id}'><i class='material-icons left'>edit</i>Editar</a>
                             </td>";
                        echo "<td>
                                <a href='../database/enderecos/delete.php?id={$_id}'><i class='material-icons left'>delete</i>Deletar</a>
                              </td>";
                    echo "</tr>";
                }

            }

            public function update($id, $nome, $numero, $edificio, $complemento, $cidade, $uf, $cliente)
            {
                $conn = $this->connect();

                $this->setId($id);
                $this->setNome($nome);
                $this->setNumero($numero);
                $this->setEdificio($edificio);
                $this->setComplemento($complemento);
                $this->setCidade($cidade);
                $this->setUf($uf);
                $this->setCliente($cliente);

                $_id = $this->getId();
                $_nome = $this->getNome();
                $_numero = $this->getNumero();
                $_edificio = $this->getEdificio();
                $_complemento = $this->getComplemento();
                $_cidade = $this->getCidade();
                $_uf = $this->getUf();
                $_cliente = $this->getCliente();

                $sql = "UPDATE endereco SET
                        nome = :nome, 
                        numero = :numero, 
                        complemento = :complemento, 
                        cidade = :cidade, 
                        uf = :uf, 
                        cliente = :cliente
                        WHERE id = :id";

                $stmt = $conn->prepare($sql);

                $stmt->bindParam(":id", $_id);
                $stmt->bindParam(":nome", $_nome);
                $stmt->bindParam(":numero", $_numero);
                $stmt->bindParam(":edificio", $_edificio);
                $stmt->bindParam(":complemento", $_complemento);
                $stmt->bindParam(":cidade", $_cidade);
                $stmt->bindParam(":uf", $_uf);
                $stmt->bindParam(":cliente", $_cliente);
                if ($stmt->execute()) 
                {
                    $last_id = $conn->lastInsertId();
                    $_SESSION['sucesso'] = "Cliente cadastrado com sucesso!";
                    $destino = header("Location: ../../public/endereco.php");
                }
                else
                {
                    $_SESSION['erro'] = "Cliente já cadastrado!";
                    $destino = header("Location: ../../public/clientes.php");
                }

            }

            public function delete($id)
            {
                $conn = $this->connect();

                $this->setId($id);
                $_id = $this->getId();

                $sql = "DELETE FROM endereco WHERE id = :id";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":id", $_id);

                if ($stmt->execute()) 
                {
                    $last_id = $conn->lastInsertId();
                    $_SESSION['sucesso'] = "Endereço removido com sucesso!";
                    $destino = header("Location: ../../public/consulta-cliente.php");
                }
                else
                {
                    $_SESSION['erro'] = "Erro ao remover endereço!";
                    $destino = header("Location: ../../public/consulta-cliente.php");
                }

            }

        //Específicos
            public function dadosDoFormulario($logradouro, $nome, $numero, $edificio, $complemento, $cidade, $uf, $cliente)
            {
                $this->setLogradouro($logradouro);
                $this->setNome($nome);
                $this->setNumero($numero);
                $this->setEdificio($edificio);
                $this->setComplemento($complemento);
                $this->setCidade($cidade);
                $this->setUf($uf);
                $this->setCliente($cliente);
            }

            public function dadosDaTabela($id)
            {
                $this->setCliente($id);
                $id = $this->getCliente();

                $conn = $this->connect();

                $sql = "SELECT endereco.id,
                               endereco.logradouro,
                               endereco.nome AS nomenome,
                               endereco.numero,
                               endereco.edificio,
                               endereco.complemento,
                               endereco.cidade,
                               endereco.uf,
                               clientes.nome 
                        FROM endereco JOIN clientes 
                        ON clientes.id = endereco.cliente
                        WHERE endereco.cliente = :cliente ";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":cliente", $id);
                $stmt->execute();

                $result = $stmt->fetchAll();

               
                foreach ($result as $values) 
                {
                    $nomeCompleto = "{$values['logradouro']} {$values['nomenome']}, N° {$values['numero']},{$values['edificio']} {$values['complemento']} - {$values['cidade']} - {$values['uf']} ";
                    echo "<tr>
                            <td>
                                {$values['id']}
                            </td>
                            <td>
                                <span class='new badge blue' data-badge-caption=''>{$nomeCompleto}</span>
                            </td>
                            <td>
                            <a class='btn-floating btn-small waves-effect blue' href='edit-endereco.php?id={$values['id']}'><i class='material-icons left'>edit</i>Editar</a>
                            <a class='btn-floating btn-small waves-effect blue' href='../database/enderecos/delete.php?id={$values['id']}'><i class='material-icons left'>delete</i>Deletar</a>
                            </td>
                          </tr>";
                }
                // <a href='edit-endereco.php?id={$values['id']}'>{$nomeCompleto}</a>

            }


            public function optionEndereco($idCliente)
            {
                $this->setCliente($idCliente);
                $id = $this->getCliente();

                $conn = $this->connect();

                $sql = "SELECT endereco.id,
                               endereco.logradouro,
                               endereco.nome AS nomenome,
                               endereco.numero,
                               endereco.edificio,
                               endereco.complemento,
                               endereco.cidade,
                               endereco.uf,
                               clientes.nome 
                        FROM endereco JOIN clientes 
                        ON clientes.id = endereco.cliente
                        WHERE endereco.cliente = :cliente ";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":cliente", $id);
                $stmt->execute();

                $result = $stmt->fetchAll();

                echo "<select name='endereco' id=''>";
                echo "<option value=''>Selecione o endereço do serviço</option>";
                foreach ($result as $values) 
                {
                    $nomeCompleto = "{$values['logradouro']} {$values['nomenome']}, N° {$values['numero']},{$values['edificio']} {$values['complemento']} - {$values['cidade']} - {$values['uf']} ";
                    echo "<option value='{$values['id']}'> {$nomeCompleto}</option>";
                }
                echo "</select>";
                echo "<label for='endereco'></label>";
                // <a href='edit-endereco.php?id={$values['id']}'>{$nomeCompleto}</a>
                


            }

            public function mostrarUf()
            {
                $estados = array( "AC", "AL", "AM", "AP",
                                  "BA", "CE", "DF", "ES",
                                  "GO", "MA", "MT", "MS",
                                  "MG", "PA", "PB", "PR",
                                  "PE", "PI", "RJ", "RN",
                                  "RO", "RS", "RR", "SC",
                                  "SE", "SP", "TO" );
                echo "<select name='uf' id=''>";
                foreach ($estados as $uf) 
                {
                    echo "<option value='{$uf}'>{$uf}</option>";
                }
                echo "</select>";
                echo "<label for='uf'>Selecione seu estado</label>"; 
                
            }


    }
?>