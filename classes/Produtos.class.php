<?php
    require_once "crudProduto.php";
    class Produtos extends Connection implements crudProduto
    {
        private $id, $nome, $estoque, $valor, $item;
        


        //Getters
            public function getId()
            {
                    return $this->id;
            }
            
            public function getNome()
            {
                    return $this->nome;
            }
            
            public function getEstoque()
            {
                    return $this->estoque;
            }
       
            public function getValor()
            {
                    return $this->valor;
            }
            public function getItem()
            {
                    return $this->item;
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

            
        
    
            public function setEstoque($estoque)
            {
                    $this->estoque = $estoque;

                    return $this;
            }

            
            
    
            public function setValor($valor)
            {
                    $this->valor = $valor;

                    return $this;
            }

            
            
    
            public function setItem($item)
            {
                    $this->item = $item;

                    return $this;
            }
        //Interface
            public function create()
            {
                $conn = $this->connect();

                $nome = $this->getNome();
                $estoque = $this->getEstoque();
                $valor = $this->getValor();
                $item = $this->getItem();

                $sql = "INSERT INTO produto VALUES 
                (DEFAULT, :nome, :estoque, :valor, 1)";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":nome", $nome);
                $stmt->bindParam(":estoque", $estoque);
                $stmt->bindParam(":valor", $valor);
                $stmt->bindParam(":item", $item);

                if($stmt->execute())
                {
                        $_SESSION["sucesso"] = "Produto cadastrado com sucesso!";
                        $destino = header("Location: produto.php");
                }
                else
                {
                        $_SESSION["erro"] = "Erro ao cadastrar produto!";
                        $destino = header("Location: produto.php");    
                }

            }
        
            public function read()
            {
                $conn = $this->connect();

                $sql = "SELECT * FROM produto";

                $stmt = $conn->prepare($sql);
                $stmt->execute();

                $result = $stmt->fetchAll();

                foreach ($result as $values) {
                        $this->setId($values['id']);
                        $this->setNome($values['nome']);
                        $this->setEstoque($values['estoque']);
                        $this->setValor($values['valor']);


                        $id = $this->getId();
                        $nome = $this->getNome();
                        $estoque = $this->getEstoque();
                        $valor = $this->getValor();
                        $item = $this->getItem();

                        echo "<tr>
                                <td>{$id}</td>
                                <td>{$nome}</td>
                                <td>{$estoque}</td>
                                <td>{$valor}</td>
                                <td>
                                        <a href='edit-produto.php?id={$id}'><i class='material-icons left'>edit</i>Editar</a>
                                </td>
                                <td>
                                        <a href='../database/produtos/delete.php?id={$id}'><i class='material-icons left'>delete</i>Deletar</a>
                                </td>
                            </tr>";
                }

            }

            public function update($id, $nome, $estoque, $valor, $item)
            {
                
            }

            public function delete($id)
            {
                
            }

        //Específicos
            public function dadosDoFormulario($nome, $estoque, $valor)
            {

            }
    }
?>