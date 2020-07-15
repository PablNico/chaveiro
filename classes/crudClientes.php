<?php
    //Define métodos CRUD que devem ser escritos pela classe que implemente esta interface
    interface crudClientes
    {
        public function create();
        public function read();
        public function update($id, $nome, $telefone, $cpf, $email, $observacoes);
        public function delete($id);

    }
?>