<?php
    require_once "crudClientes.php";
    class Clientes extends Connection implements crudClientes 
    {
        // Atributos da classe cliente
        private $id, $nome, $nomeCondominio, $telefone, $cpf, $email, $observacoes, $tipoCliente;

        //Getters
            public function getId()
            {
                    return $this->id;
            }

            public function getNome()
            {
                    return $this->nome;
            }

            public function getNomeCondominio()
            {
                    return $this->nomeCondominio;
            }

            public function getCpf()
            {
                    return $this->cpf;
            }
            
            public function getTelefone()
            {
                return $this->telefone;
            }

            public function getEmail()
            {
                    return $this->email;
            }
            
            public function getObservacoes()
            {
                    return $this->observacoes;
            }

            public function getTipoCliente()
            {
                    return $this->tipoCliente;
            }
        //Setters
            public function setId($id)
            {
                    $this->id = $id;

                    return $this;
            }
        
            public function setNome($nome)
            {
                    $this->nome = $nome;

                    return $this;
            }

            public function setNomeCondominio($nomeCondominio)
            {
                    $this->nomeCondominio = $nomeCondominio;
    
                    return $this;
            }
    
            public function setCpf($cpf)
            {
                    $this->cpf = $cpf;

                    return $this;
            }

    

    
            public function setTelefone($telefone)
            {
                    $this->telefone = $telefone;

                    return $this;
            }

            public function setEmail($email)
            {
                    $this->email = $email;
    
                    return $this;
            }

            public function setObservacoes($observacoes)
            {
                    $this->observacoes = $observacoes;

                    return $this;
            }
            
            public function setTipoCliente($tipoCliente)
            {
                    $this->tipoCliente = $tipoCliente;

                    return $this;
            }
        //Específicos

            //Atribui os valores passados pelo formulário aos métodos Setters, usado no database/create.php
            public function dadosDoFormulario($nome, $nomeCondominio, $telefone, $cpf, $email, $observacoes, $tipoCliente)
            {
                $this->setNome($nome);
                $this->setNomeCondominio($nomeCondominio);
                $this->setTelefone($telefone);
                $this->setCpf($cpf);
                $this->setEmail($email);
                $this->setObservacoes($observacoes);
                $this->setTipoCliente($tipoCliente);
            }

            //Retorna os valores do banco de dados com determinado Id, usado no public/edit-client.php
            public function dadosDaTabela($id)
            {
                $conn = $this->connect();

                $this->setId($id);
                $_id = $this->getId();

                $sql = "SELECT * FROM clientes WHERE id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":id", $_id);
                $stmt->execute();

                $result = $stmt->fetchAll();

                foreach($result as $values)
                {
                    require_once "../forms/form-edit-cliente.php";
                }
            }

            //Retorna os valores de determinado Id para a página public/detalhes-cliente.php
            public function detalhesCliente($id)
            {
                $conn = $this->connect();

                $this->setId($id);
                $_id = $this->getId();

                $sql = "SELECT * FROM clientes WHERE id = :id";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":id", $_id);
                $stmt->execute();
                
                $result = $stmt->fetchAll();
                foreach ($result as $values) 
                {
                    echo "<blockquote class='light'>Nome: <span class='badge'>{$values['nome']}</span></blockquote><hr>";
                    echo "<blockquote class='light'>Telefone: <span class='badge'>{$values['telefone']}</span></blockquote><hr>";
                    echo "<blockquote class='light'>CPF: <span class='badge'>{$values['cpf']}</span></blockquote><hr>";
                    echo "<blockquote class='light'>E-mail: <span class='badge'>{$values['email']}</span></blockquote><hr>";
                    echo "<blockquote class='light'>Observações: <span class='badge'>{$values['observacoes']}</span></blockquote><hr>";
                    echo "<a href='edit-client.php?id={$values['id']}' class='btn blue'>Editar</a>
                            <td>
                                <a class='btn red' href='../database/clientes/delete.php?id={$values['id']}'>Deletar</a>
                            </td>";
                }

            }

            //retorna os dados de todos os clientes em um option para o formulário forms/form-add-cliente.php
            public function optionCliente($search)
            {
                $search .= "%"; 
                $conn = $this->connect();

                $sql = "SELECT * FROM clientes WHERE
                (nome like :search) OR 
                (nomeCondominio like :search)
                OR (telefone like :search )
                OR (email like :search) ";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":search", $search);
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                echo json_encode($result);
                
            }
        
            public function tipoCliente($tipo)
            {
                $_SESSION['tipoCliente'] = $tipo;
                $destino = header("Location: ../../public/clientes.php");
            }

        //Interface

            //Cria novo Cliente no banco de dados
            public function create()
            {                
                $nome = $this->getNome();
                $nomeCondominio = $this->getNomeCondominio();
                $cpf = $this->getCpf();
                $telefone = $this->getTelefone();
                $email = $this->getEmail();
                $observacoes = $this->getObservacoes();
                $tipoCliente = $this->getTipoCliente();
                
                $conn = $this->connect();

                $sql = "INSERT INTO clientes 
                        (`id`, `nome`, `nomeCondominio`, `telefone`, `cpf`, `email`, `observacoes`, `tipoCliente`)
                        VALUES (DEFAULT, :nome, :nomeCondominio, :telefone, :cpf, :email, :observacoes, :tipoCliente)";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":nome", $nome);                        
                $stmt->bindParam(":nomeCondominio", $nomeCondominio);                        
                $stmt->bindParam(":telefone", $telefone);                        
                $stmt->bindParam(":cpf", $cpf);                        
                $stmt->bindParam(":email", $email);                        
                $stmt->bindParam(":observacoes", $observacoes);   
                $stmt->bindParam(":tipoCliente", $tipoCliente);   
                
                if ($stmt->execute()) 
                {
                    $_SESSION['sucesso'] = "Cliente cadastrado com sucesso!";
                    $destino = header("Location: ../../public/endereco.php?id={$conn->lastInsertId()}");
                }
                else
                {
                    $_SESSION['erro'] = "Cliente já cadastrado!";
                    $destino = header("Location: ../../public/clientes.php?recomecar=1");
                }

            }
            
            //Busca clientes no BD
            public function read($search, $tipoCliente)
            {
                $conn = $this->connect();
                $search = "%{$search}%";

                if((int)$tipoCliente == 0)
                {
                    $sql = "SELECT * FROM clientes WHERE
                                (nome like :search) OR 
                                (nomeCondominio like :search)
                                OR (telefone like :search )
                                OR (email like :search)
                            ";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(":search", $search);
                }
                else
                {
                    $sql = "SELECT * FROM clientes WHERE 
                            tipoCliente = :tipoCliente AND
                            ( 
                                (nome like :search) OR 
                                (nomeCondominio like :search)
                                OR (telefone like :search )
                                OR (email like :search)
                            )";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(":search", $search);
                    $stmt->bindParam(":tipoCliente", $tipoCliente);
                }
                $stmt->execute();

                $result = $stmt->fetchAll();

                foreach($result as $value)
                {
                    $this->setId($value['id']);
                    $this->setNome($value['nome']);
                    $this->setNomeCondominio($value['nomeCondominio']);
                    $this->setTelefone($value['telefone']);
                    $this->setEmail($value['email']);
                    $this->setTipoCliente($value['tipoCliente']);

                    $_id = $this->getId();
                    $_nome = $this->getNome();
                    $_nomeCondomio = $this->getNomeCondominio();
                    $_telefone = $this->getTelefone();
                    $_email = $this->getEmail();
                    $_tipoCliente = $this->getTipoCliente();
                    

                    echo "<tr>";
                        if($_tipoCliente == 1)
                        {
                            echo "<td  class='badge' style='min-width:100px;'><a href='detalhes-cliente.php?id={$_id}'><span class='new badge blue' data-badge-caption=''>{$_nome}</span></td>";
                        }
                        elseif($_tipoCliente == 2)
                        {
                            echo "<td  class='badge' style='min-width:100px;'><a href='detalhes-cliente.php?id={$_id}'><span class='new badge blue' data-badge-caption=''>Condomínio: {$_nomeCondomio}</span></td>";
                        }
                        echo "<td>{$_email}</td>";
                        echo "<td style='min-width:150px;'>{$_telefone}</td>";
                        if($_tipoCliente == 1)
                        {
                            echo "<td>Pessoa Física</td>";
                        }
                        elseif($_tipoCliente == 2)
                        {
                            echo "<td>Pessoa Jurídica</td>";
                        }
                        echo "<td>
                                <a class='btn-floating btn-small waves-effect blue' href='edit-client.php?id={$_id}&tipo={$_tipoCliente}'><i class='material-icons left'>edit</i>Editar</a>
                             </td>";
                        echo "<td>
                                <a class='btn-floating btn-small waves-effect red' href='../database/clientes/delete.php?id={$_id}'><i class='material-icons left'>delete</i>Deletar</a>
                             </td>";
                        echo "<td>
                                <a class='btn-floating btn-small waves-effect orange' href='endereco.php?id={$_id}'><i class='material-icons left'>add_location</i>Novo serviço</a>
                             </td>";
                        
                    echo "</tr>";
                }
            }

            //Atualiza determinado cliente, definida pelo Id, pelos valores definidos em form-edit-cliente.php
            public function update($id, $nome, $nomeCondominio , $telefone, $cpf, $email, $observacoes, $tipoCliente)
            {
                $conn = $this->connect();

                $this->setId($id);
                $this->setNome($nome);
                $this->setNomeCondominio($nomeCondominio);
                $this->setTelefone($telefone);
                $this->setEmail($email);
                $this->setCpf($cpf);
                $this->setObservacoes($observacoes);
                $this->setTipoCliente($tipoCliente);

                $_id        = $this->getId();
                $_nome        = $this->getNome();
                $_nomeCondomio = $this->getNomeCondominio();
                $_telefone    = $this->getTelefone();
                $_email       = $this->getEmail();
                $_cpf         = $this->getCpf();
                $_observacoes = $this->getObservacoes();
                $_tipoCliente = $this->getTipoCliente();


                $sql = "UPDATE clientes SET
                        nome=:nome,
                        nomeCondominio=:nomeCondomio,
                        telefone=:telefone,
                        email=:email,
                        cpf=:cpf,
                        observacoes=:observacoes,
                        tipoCliente=:tipoCliente
                        WHERE id=:id";

                $stmt = $conn->prepare($sql);
                
                $stmt->bindParam(":id", $_id);
                $stmt->bindParam(":nome", $_nome);
                $stmt->bindParam(":nomeCondomio", $_nomeCondomio);
                $stmt->bindParam(":telefone", $_telefone);
                $stmt->bindParam(":email", $_email);
                $stmt->bindParam(":cpf", $_cpf);
                $stmt->bindParam(":observacoes", $_observacoes);
                $stmt->bindParam(":tipoCliente", $_tipoCliente);
                
                if ($stmt->execute())
                {
                    $_SESSION['sucesso'] = "Atualizado com sucesso!";
                    $destino = header("location: ../../public/detalhes-cliente.php?id={$_id}");
                }
                else
                {
                    $_SESSION['sucesso'] = "Erro ao atualizar!";
                    $destino = header("location: ../../public/detalhes-cliente.php?id={$_id}");
                }
                
            }
            
            //Deleta determinado cliente, definido pelo Id.
            public function delete($id)
            {
                $conn = $this->connect();
                $this->setId($id);

                $_id = $this->getId();

                $sql = "DELETE FROM clientes WHERE id = :id";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":id", $id);
                
                if ($stmt->execute())
                {
                    $_SESSION['sucesso'] = "Deletado com sucesso!";
                    $destino = header("location: ../../public/consulta-cliente.php");
                }
                else
                {
                    $_SESSION['erro'] = "Erro ao deletar! <br> Delete o endereço antes";
                    $destino = header("location: ../../public/consulta-cliente.php");
                }

            }

 
    
 
      


    




    }
?>