<?php
    require_once "crudProduto.php";
    class Produtos extends Connection implements crudProduto
    {
        private $id, $nome, $pasta, $categoria, $estoque, $valor;
        


        //Getters
            public function getId()
            {
                    return $this->id;
            }
            
            public function getNome()
            {
                    return $this->nome;
            }

            public function getPasta()
            {
                    return $this->pasta;
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
            
                public function setPasta($pasta)
                {
                        $this->pasta = $pasta;

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
                $pasta = $this->getPasta();
                $estoque = $this->getEstoque();
                $valor = $this->getValor();

                $sql = "INSERT INTO produto VALUES 
                (DEFAULT, :nome, :categoria, :pasta, :estoque, :valor)";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":nome", $nome);
                $stmt->bindParam(":categoria", $categoria);
                $stmt->bindParam(":pasta", $pasta);
                $stmt->bindParam(":estoque", $estoque);
                $stmt->bindParam(":valor", $valor);

                if($stmt->execute())
                {
                        $_SESSION["sucesso"] = "Produto cadastrado com sucesso!";
                        $destino = header("Location: ../../public/consulta-produtos.php?pasta={$pasta}");
                }
                else
                {
                        $_SESSION["erro"] = "Erro ao cadastrar produto!";
                        $destino = header("Location: ../../public/consulta-produtos.php?pasta={$pasta}");    
                }

            }
        
            public function read($search, $pasta)
            {
                // Read Produto
                        
                        $conn = $this->connect();

                        $search = "%{$search}%";

                        $sql = "SELECT * FROM produto WHERE 
                                (pasta = :pasta) AND
                                ((nome LIKE :search) OR
                                (categoria LIKE :search))";

                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(":search", $search);
                        $stmt->bindParam(":pasta", $pasta);
                        $stmt->execute();

                        $resultProdutos = $stmt->fetchAll();

                        foreach ($resultProdutos as $values) 
                        {
                                $this->setId($values['id']);
                                $this->setNome($values['nome']);
        

                                $id = $this->getId();
                                $nome = $this->getNome();
                        


                                echo (
                                        "<blockquote>
                                                <a href='detalhes-produto.php?id={$id}'  style='font-size:18px;'>{$nome}</a>
                                                        <a class='btn-floating btn right red waves-effect waves-light ' href='../database/produtos/delete.php?id={$id}'><i class='material-icons left'>delete</i>Deletar</a>
                                                        <a class='btn-floating btn right blue waves-effect waves-light ' href='edit-produto.php?id={$id}'><i class='material-icons left'>edit</i>Editar</a>
                                                        <a class='btn-floating btn right orange waves-effect waves-light ' href='../database/produtos/delete.php?id={$id}'><i class='material-icons left'>control_point</i></a>
                                        </blockquote>");
                        }
                // Fim readProduto
            }

            public function readPasta($search, $subpasta)
            {
                // Read Pasta
                $conn = $this->connect();

                $search = "%{$search}%";

                $sql = "SELECT * FROM pasta WHERE 
                        (subpasta = :pasta) AND
                        (nome LIKE :search)";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":pasta", $subpasta);
                $stmt->bindParam(":search", $search);
                $stmt->execute();

                $resultPasta = $stmt->fetchAll();
                foreach ($resultPasta as $values) 
                {
                        
                        echo ("
                                <blockquote>
                                        <a href='consulta-produtos.php?pasta={$values['id']}'><span class='darkness' style='font-size:18px;'>{$values['nome']}</span></a>
                                        <a class='btn-floating btn waves-effect waves-light red right' href='#'><i class='material-icons left'>delete</i>Deletar</a>
                                        <a class='btn-floating btn waves-effect waves-light blue right' href='#'><i class='material-icons left'>edit</i>Editar</a>
                                </blockquote>
                                ");
                }
                        
            }

        
            public function update($id, $nome, $categoria, $estoque, $valor)
            {
                $conn = $this->connect();

                $sql = "UPDATE produto SET nome = :nome ,categoria = :categoria,estoque = :estoque,valor = :valor WHERE id = :id";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":id", $id);
                $stmt->bindParam(":nome", $nome);
                $stmt->bindParam(":categoria", $categoria);
                $stmt->bindParam(":estoque", $estoque);
                $stmt->bindParam(":valor", $valor);
                if($stmt->execute())
                {
                        echo "deu certo";
                }
                else
                {
                        echo "deu erro";

                }
            }

            public function delete($id)
            {
                
            }

        //Específicos
            public function dadosDoFormulario($nome, $categoria, $pasta, $estoque, $valor)
            {
                $this->setNome($nome);
                $this->setCategoria($categoria);
                $this->setPasta($pasta);
                $this->setEstoque($estoque);
                $this->setValor($valor);
            }

            public function dadosDaTabela($id)
            {
                $conn = $this->connect();

                $this->setId($id);
                $_id = $this->getId();

                $sql = "SELECT * FROM produto WHERE id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":id", $_id);
                $stmt->execute();

                $result = $stmt->fetchAll();

                foreach($result as $values)
                {
                    require_once "../forms/form-edit-produto.php";
                }
            } 

            public function mostrarPasta($idPasta)
            {
                $conn = $this->connect();

                $sql = "SELECT nome FROM pasta  WHERE id = :id";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":id", $idPasta);
                $stmt->execute();
                
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $nome = $result[0]['nome'];
                return "<b>{$nome}</b>";
            }

            public function btnVoltar($idPasta)
            {
                $conn = $this->connect();

                $sql = "SELECT subpasta FROM pasta WHERE id = :idPasta";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":idPasta", $idPasta);
                $stmt->execute();
                $result = $stmt->fetchAll();
                if($result[0]['subpasta'] != null)
                {
                       $voltar = $result[0]['subpasta'];
                       echo "<a href='consulta-produtos.php?pasta={$voltar}' class='btn purple'>Pasta anterior</a>";
                }

            }
            public function abastecerEstoque($id, $estoque)
            {
                $conn = $this->connect();

                $this->setId($id);
                $_id = $this->getId();

                $sql = "SELECT nome, estoque from produto WHERE id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":id", $_id);
                $stmt->execute();
                $results = $stmt->fetchAll();

                foreach($results as $values)
                {
                        $this->setNome($values['nome']);
                        $this->setEstoque($values['estoque']);
                }

                echo $this->getNome();
                echo $this->getEstoque();

            }

            public function detalhesProtudo($id)
            {
                $conn = $this->connect();

                $this->setId($id);
                $_id = $this->getId();


                $sql = "SELECT * FROM produto WHERE id = :id";
                
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":id", $_id);
                $stmt->execute();

                $results = $stmt->fetchAll();
                foreach($results as $values)
                {
                        echo "<a href='consulta-produtos.php?pasta={$values['pasta']}' class='btn red'>Voltar</a>";
                        echo "<blockquote>Nome:<span class='badge'> {$values['nome']}</span></blockquote>";
                        echo "<blockquote>Categoria:<span class='badge'> {$values['categoria']}</span></blockquote>";
                        echo "<blockquote>Valor:<span class='badge'> R$ {$values['valor']}</blockquote>";
                        echo "<blockquote>Estoque:<span class='badge'> {$values['estoque']} </span></blockquote>";
                }
                
                echo "<a href='abastecer-estoque.php?id={$_id}' class='btn-small orange darken-2 light'><i class='material-icons left'>add</i>Abastecer estoque</a>";
            }

            public function criaPasta($nome, $subpasta)
            {
                $conn = $this->connect();

                $sql = "INSERT INTO pasta VALUES (DEFAULT, :nome, :subpasta)";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":nome", $nome);
                $stmt->bindParam(":subpasta", $subpasta);
                if($stmt->execute())
                {
                        $_SESSION[''] = "";
                        $destino = header("location: ../../public/consulta-produtos.php?pasta={$subpasta}");
                }
                else
                {
                        $_SESSION[''] = "";
                        $destino = header("location: ../../public/consulta-produtos.php?pasta={$subpasta}");
                        
                }
            }

 


       

    }
?>