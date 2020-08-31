<?php
    //Define métodos CRUD que devem ser escritos pela classe que implemente esta interface
    interface crudClientes
    {
        public function create();
        public function read($search, $tipoCliente);
        public function update($id, $nome, $nomeCondominio, $telefone, $cpf, $email, $observacoes, $tipoCliente);
        public function delete($id);

    }
?>