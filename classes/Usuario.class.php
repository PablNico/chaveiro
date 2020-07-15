<?php 
    require_once 'crudUsuario.php';
    class Usuario extends Connection implements crudUsuario
    {
        private $id, $nome, $login, $senha, $administrador;
        
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

            public function getAdministrador()
            {
                    return $this->administrador;
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

            public function setAdministrador($administrador)
            {
                    $this->administrador = $administrador;
    
                    return $this;
            }
        //Específicos
        
            public function dadosDoFormulario($nome, $login, $senha, $administrador)
            {
                $this->setNome($nome);
                $this->setLogin($login);
                $this->setSenha($senha);
                $this->setAdministrador($administrador);
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

            public function optionFuncionario()
            {
                $conn = $this->connect();
                
                $sql  = "SELECT * FROM usuario";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                $result = $stmt->fetchAll();

                echo "<option value='0' selected>Sem funcionário responsável</option>";
                foreach($result as $values)
                {
                    echo "<option value='{$values['id']}'>{$values['nome']}</option>";
                }


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
                    if ($values['administrador'] == 1) 
                    {
                        $_SESSION['autenticado'] = "admin";
                        $_SESSION['mensagem'] = "Logado como administrador!";
                    }
                    else
                    {
                        $_SESSION['autenticado'] = "normal";
                        $_SESSION['mensagem'] = "Logado com sucesso!";
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
        //Interface
            public function create()
            {
                $conn = $this->connect();

                $nome = $this->getNome();
                $login = $this->getLogin();
                $senha = $this->getSenha();
                $administrador = $this->getAdministrador();

                $sql = "INSERT INTO usuario VALUES
                (DEFAULT, :nome, :login, :senha, :administrador)";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":nome", $nome);
                $stmt->bindParam(":login", $login);
                $stmt->bindParam(":senha", $senha);
                $stmt->bindParam(":administrador", $administrador);
                
                if ($stmt->execute()) 
                {
                    $_SESSION['sucesso'] = "Usuário cadastrado com sucesso!";
                    $destino = header("Location: ../../public/usuario.php");
                }
                else
                {
                    $_SESSION['erro'] = "Usuário já cadastrado!";
                    $destino = header("Location: ../../public/usuario.php");
                }
            }

            public function read()
            {
                $conn = $this->connect();

                $sql = "SELECT * FROM usuario";

                $stmt = $conn->prepare($sql);
                $stmt->execute();

                $result = $stmt->fetchAll();

                foreach($result as $values)
                {
                    $this->setId($values['id']);
                    $this->setNome($values['nome']);
                    $this->setLogin($values['login']);
                    $this->setSenha($values['senha']);
                    $this->setAdministrador($values['administrador']);

                    $_id = $this->getId();
                    $_nome = $this->getNome();
                    $_login = $this->getLogin();
                    $_senha = $this->getSenha();
                    $_administrador = $this->getAdministrador();

                    echo "<tr>";
                        echo "<td>$_id</td>";
                        echo "<td>$_nome</td>";
                        echo "<td>$_login</td>";
                        echo "<td>$_senha</td>";
                        echo "<td>$_administrador</td>";
                        echo "<td>
                                <a href='edit-usuario.php?id={$_id}'><i class='material-icons left'>edit</i>Editar</a>
                             </td>";
                        echo "<td>
                                <a href='../database/usuario/delete.php?id={$_id}'><i class='material-icons left'>delete</i>Deletar</a>
                             </td>";
                    echo "</tr>";
                }
            }
            
            public function update($id, $nome, $login, $senha, $administrador)
            {
                $conn = $this->connect();

                $this->setId($id);
                $this->setNome($nome);
                $this->setLogin($login);
                $this->setSenha($senha);
                $this->setAdministrador($administrador);

                $_id = $this->getId();
                $_nome = $this->getNome();
                $_login = $this->getLogin();
                $_senha = $this->getSenha();
                $_administrador = $this->getAdministrador();

                $sql = "UPDATE usuario SET
                id = :id, nome = :nome, login = :login, senha = :senha, administrador = :administrador
                WHERE id = :id";

                $stmt = $conn->prepare($sql);

                $stmt->bindParam(":id", $_id);
                $stmt->bindParam(":nome", $_nome);
                $stmt->bindParam(":login", $_login);
                $stmt->bindParam(":senha", $_senha);
                $stmt->bindParam(":administrador", $_administrador);

                if($stmt->execute())
                {
                    $_SESSION['sucesso'] = "Usuário atualizado com sucesso!";
                    $destino = header("Location: ../../public/usuario.php");
                }
                else
                {
                    $_SESSION['erro'] = "Erro ao atualizar!";
                    $destino = header("Location: ../../public/usuario.php");
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
                    $destino = header("Location: ../../public/usuario.php");
                }
                else
                {
                    $_SESSION['erro'] = "Erro ao deletar!";
                    $destino = header("Location: ../../public/usuario.php");
                }
            }
        
            


   

      
    }
?>