<?php
        require_once "autoload.php";
        class Pasta extends Connection implements crudPasta
        {
                private $id, $nome, $subpasta;

                // Getters 
                
                public function getId()
                {
                        return $this->id;
                }

                public function getNome()
                {
                        return $this->nome;
                }

                public function getSubpasta()
                {
                        return $this->subpasta;
                }

        
                
                // Setters   
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


                public function setSubpasta($subpasta)
                {
                        $this->subpasta = $subpasta;

                        return $this;
                }
                
                // Métodos Interface
                        public function create()
                        {
                                $_nome = $this->getNome();
                                $_subpasta = $this->getSubpasta();
                                $conn = $this->connect();
                                $sql = "INSERT INTO pasta VALUES (DEFAULT, :nome, :subpasta)";

                                $stmt = $conn->prepare($sql);
                                $stmt->bindParam(":nome", $_nome);
                                $stmt->bindParam(":subpasta", $_subpasta);

                                if($stmt->execute())
                                {

                                }
                                else
                                {

                                }
                        }   

                        public function read($id)
                        {
                                $this->setId($id);
                                $_id = $this->getId();

                                $conn = $this->connect();

                                $sql = "SELECT * FROM pasta WHERE id = :id";

                                $stmt = $conn->prepare($sql);
                                $stmt->bindParam(":id", $_id);
                                $stmt->execute();

                                $result = $stmt->fetchAll();



                        }

                        public function update($id, $nome)
                        {
                                $this->setId($id);
                                $this->setNome($nome);

                                $_id = $this->getId();
                                $_nome = $this->getNome();

                                $conn = $this->connect();

                                $sql = "UPDATE pasta SET nome = :nome WHERE id = :id";

                                $stmt = $conn->prepare($sql);
                                $stmt->bindParam(":id", $_id);
                                $stmt->bindParam(":nome", $_nome);

                                if ($stmt->execute())
                                {

                                }
                                else
                                {

                                }

                        }

                        public function delete($id)
                        {
                                $this->setId($id);
                                $_id = $this->getId();

                                $conn = $this->connect();

                                $sql = "DELETE FROM pasta WHERE id = :id";

                                $stmt = $conn->prepare($sql);
                                $stmt->bindParam(":id", $_id);
                                if($stmt->execute())
                                {

                                }
                                else
                                {

                                }
                        }
                
                // Métodos específicos

                        public function dadosFormulario($id, $nome, $subpasta)
                        {
                                $this->setId($id);
                                $this->setNome($nome);
                                $this->setSubpasta($subpasta);
                        }

                        
        }
?>