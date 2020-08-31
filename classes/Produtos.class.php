<?php
    require_once "crudProduto.php";
    class Produtos extends Connection implements crudProduto
    {
        private $id, $nome, $categoria, $estoque, $valor;
        


        //Getters
            public function getId()
            {
                    return $this->id;
            }
            
            public function getNome()
            {
                    return $this->nome;
            }

            public function getCategoria()
            {
                    return $this->categoria;
            }

            public function getEstoque()
            {
                    return $this->estoque;
            }
       
            public function getValor()
            {
                    return $this->valor;
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

            public function setCategoria($categoria)
            {
                    $this->categoria = $categoria;
    
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


        //Interface
            public function create()
            {
                $conn = $this->connect();

                $nome = $this->getNome();
                $categoria = $this->getCategoria();
                $estoque = $this->getEstoque();
                $valor = $this->getValor();

                $sql = "INSERT INTO produto VALUES 
                (DEFAULT, :nome, :categoria, :estoque, :valor)";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":nome", $nome);
                $stmt->bindParam(":categoria", $categoria);
                $stmt->bindParam(":estoque", $estoque);
                $stmt->bindParam(":valor", $valor);

                if($stmt->execute())
                {
                        $_SESSION["sucesso"] = "Produto cadastrado com sucesso!";
                        $destino = header("Location: ../../public/consulta-produtos.php");
                }
                else
                {
                        $_SESSION["erro"] = "Erro ao cadastrar produto!";
                        $destino = header("Location: ../../public/consulta-produtos.php");    
                }

            }
        
            public function read($search)
            {
                $conn = $this->connect();

                $search = "%{$search}%";

                $sql = "SELECT * FROM produto WHERE 
                        (nome LIKE :search) OR
                        (categoria LIKE :search)";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":search", $search);
                $stmt->execute();

                $result = $stmt->fetchAll();

                foreach ($result as $values) {
                        $this->setId($values['id']);
                        $this->setNome($values['nome']);
                        $this->setCategoria($values['categoria']);
                        $this->setEstoque($values['estoque']);
                        $this->setValor($values['valor']);


                        $id = $this->getId();
                        $nome = $this->getNome();
                        $categoria = $this->getCategoria();
                        $estoque = $this->getEstoque();
                        $valor = $this->getValor();


                        echo "<tr>
                                <td>{$id}</td>
                                <td>{$nome}</td>
                                <td>{$categoria}</td>
                                <td>{$estoque}</td>
                                <td>{$valor}</td>
                                <td>
                                        <a class='btn-floating btn-small waves-effect waves-light blue' href='edit-produto.php?id={$id}'><i class='material-icons left'>edit</i>Editar</a>
                                </td>
                                <td>
                                        <a class='btn-floating btn-small waves-effect waves-light blue' href='../database/produtos/delete.php?id={$id}'><i class='material-icons left'>delete</i>Deletar</a>
                                </td>
                                <td>
                                        <a class='btn-floating btn-small waves-effect waves-light blue' href='../database/produtos/delete.php?id={$id}'><i class='material-icons left'>control_point</i>Deletar</a>
                                </td>
                            </tr>";
                }

            }

            public function update($id, $nome, $categoria, $estoque, $valor)
            {
                
            }

            public function delete($id)
            {
                
            }

        //Específicos
            public function dadosDoFormulario($nome, $categoria, $estoque, $valor)
            {
                $this->setNome($nome);
                $this->setCategoria($categoria);
                $this->setEstoque($estoque);
                $this->setValor($valor);
            }

  

 

    }
?>