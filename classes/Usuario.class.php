<?php 
    require_once 'crudUsuario.php';
    class Usuario extends Connection implements crudUsuario
    {
        private $id, $nome, $login, $senha, $tipoConta;
        
        //Getters    
            public function getId()
            {
                return $this->id;
            }
            
            
            public function getNome()
            {
                return $this->nome;
            }
            
            public function getLogin()
            {
                return $this->login;
            }
            
            public function getSenha()
            {
                    return $this->senha;
            }

            public function getTipoConta()
            {
                    return $this->tipoConta;
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
            
            public function setLogin($login)
            {
                $this->login = $login;
                
                return $this;
            }
            
            public function setSenha($senha)
            {
                $this->senha = $senha;
                
                return $this;
            }

            public function setTipoConta($tipoConta)
            {
                    $this->tipoConta = $tipoConta;
    
                    return $this;
            }
        //Específicos
        
            public function dadosDoFormulario($nome, $login, $senha, $tipoConta)
            {
                $this->setNome($nome);
                $this->setLogin($login);
                $this->setSenha($senha);
                $this->setTipoConta($tipoConta);
            }

            public function dadosDaTabela($id)
            {
                $this->setId($id);
                $_id = $this->getId();

                $conn = $this->connect();
                $sql = "SELECT * FROM usuario WHERE id = :id";
                
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id', $_id);

                $stmt->execute();

                $result = $stmt->fetchAll();

                foreach($result as $values)
                {
                    require_once "../forms/form-edit-usuario.php";
                }

            }

            public function optionFuncionario($search)
            {
                $search .= "%";
                $conn = $this->connect();
                
                $sql  = "SELECT * FROM usuario WHERE nome LIKE :search";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":search", $search);
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                echo json_encode($result);
                // echo "<select name='funcionario'>";
                // echo "<option value='0' selected>Sem funcionário responsável</option>";
                // foreach($result as $values)
                // {
                //     echo "<option value='{$values['id']}'>{$values['nome']}</option>";
                // }
                // echo "</select>";
                // echo "<label for='funcionario'>Selecione o funcionário</label>";


            }

            public function login($login, $senha)
            {
                $this->setLogin($login);
                $this->setSenha($senha);

                $_login = $this->getLogin();
                $_senha = $this->getSenha();
                
                $conn = $this->connect();


                $sql = "SELECT * FROM usuario 
                WHERE login = :login AND senha = :senha";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":login", $_login);
                $stmt->bindParam(":senha", $_senha);
                $stmt->execute();
                if($stmt->rowCount() != 0)
                {
                    $result = $stmt->fetchAll();
                    $values = $result[0];
                    $_SESSION['userId'] = $values['id'];
                    $_SESSION['username'] = $values['nome'];
                    if ($values['tipoConta'] == 1) 
                    {
                        $_SESSION['autenticado'] = "admin";
                        $_SESSION['sucesso'] = "Logado como administrador!";
                    }
                    else
                    {
                        $_SESSION['autenticado'] = "normal";
                        $_SESSION['sucesso'] = "Logado com sucesso!";
                    }
                    $destino = header("Location: ../../public/home.php");
                }
                else
                {
                    $_SESSION['mensagem'] = "Usuário ou senha incorretos!";

                    $destino = header("Location: ../../public/login.php");

                }

            }

            public function logout()
            {
                unset($_SESSION["autenticado"]);
                $destino = header("location: ../../public/login.php");
            }


            public function traduzAdmin($tipoConta)
            {
                if($tipoConta == 0)
                {
                    return "Não";
                }
                elseif($tipoConta == 1)
                {
                    return "Sim";
                }
            }
        //Interface
            public function create()
            {
                $conn = $this->connect();

                $nome = $this->getNome();
                $login = $this->getLogin();
                $senha = $this->getSenha();
                $tipoConta = $this->getTipoConta();

                $sql = "INSERT INTO usuario VALUES
                (DEFAULT, :nome, :login, :senha, :tipoConta)";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":nome", $nome);
                $stmt->bindParam(":login", $login);
                $stmt->bindParam(":senha", $senha);
                $stmt->bindParam(":tipoConta", $tipoConta);
                
                if ($stmt->execute()) 
                {
                    $_SESSION['sucesso'] = "Usuário cadastrado com sucesso!";
                    $destino = header("Location: ../../public/consulta-usuario.php");
                }
                else
                {
                    $_SESSION['erro'] = "Usuário já cadastrado!";
                    $destino = header("Location: ../../public/consulta-usuario.php");
                }
            }

            public function read($search)
            {
                $conn = $this->connect();

                $search = "%{$search}%";
                $sql = "SELECT * FROM usuario WHERE 
                (nome LIKE :search) OR
                (login LIKE :search) OR
                (tipoConta LIKE :search)";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":search", $search);
                $stmt->execute();

                $result = $stmt->fetchAll();

                foreach($result as $values)
                {
                    $this->setId($values['id']);
                    $this->setNome($values['nome']);
                    $this->setLogin($values['login']);
                    $this->setSenha($values['senha']);
                    $this->setTipoConta($values['tipoConta']);

                    $_id = $this->getId();
                    $_nome = $this->getNome();
                    $_login = $this->getLogin();
                    $_senha = $this->getSenha();
                    $_tipoConta = $this->getTipoConta();

                    echo "<tr>";
                        echo "<td>$_nome</td>";
                        echo "<td>$_login</td>";
                        echo "<td>$_senha</td>";
                        echo "<td>{$this->traduzAdmin($values['tipoConta'])}</td>";
                        echo "<td>
                                <a class='btn-floating btn-small waves-effect waves-light blue' href='edit-usuario.php?id={$_id}'><i class='material-icons left'>edit</i>Editar</a>
                              </td>
                              <td>
                                <a class='btn-floating btn-small waves-effect waves-light red' href='../database/usuario/delete.php?id={$_id}'><i class='material-icons left'>delete</i>Deletar</a>
                              </td>";
                    echo "</tr>";
                }
            }
            
            public function update($id, $nome, $login, $senha, $tipoConta)
            {
                $conn = $this->connect();

                $this->setId($id);
                $this->setNome($nome);
                $this->setLogin($login);
                $this->setSenha($senha);
                $this->setTipoConta($tipoConta);

                $_id = $this->getId();
                $_nome = $this->getNome();
                $_login = $this->getLogin();
                $_senha = $this->getSenha();
                $_tipoConta = $this->getTipoConta();

                $sql = "UPDATE usuario SET
                id = :id, nome = :nome, login = :login, senha = :senha, tipoConta = :tipoConta
                WHERE id = :id";

                $stmt = $conn->prepare($sql);

                $stmt->bindParam(":id", $_id);
                $stmt->bindParam(":nome", $_nome);
                $stmt->bindParam(":login", $_login);
                $stmt->bindParam(":senha", $_senha);
                $stmt->bindParam(":tipoConta", $_tipoConta);

                if($stmt->execute())
                {
                    $_SESSION['sucesso'] = "Usuário atualizado com sucesso!";
                    $destino = header("Location: ../../public/consulta-usuario.php");
                }
                else
                {
                    $_SESSION['erro'] = "Erro ao atualizar!";
                    $destino = header("Location: ../../public/consulta-usuario.php");
                }
            }

            public function delete($id)
            {
                $this->setId($id);
                $_id = $this->getId();
                
                $conn = $this->connect();

                $sql = "DELETE FROM usuario WHERE id = :id";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":id", $_id);

                if($stmt->execute())
                {
                    $_SESSION['sucesso'] = "Usuário deletado com sucesso!";
                    $destino = header("Location: ../../public/consulta-usuario.php");
                }
                else
                {
                    $_SESSION['erro'] = "Erro ao deletar!";
                    $destino = header("Location: ../../public/consulta-usuario.php");
                }
            }
        
            


   

      
    }
?>