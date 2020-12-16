<?php
    //Define métodos CRUD que devem ser escritos pela classe que implemente esta interface
    interface crudEndereco
    {
        public function create();
        public function read($id);
        public function update($id, $logradouro, $nome, $numero, $edificio, $complemento, $cidade, $uf, $cliente);
        public function delete($id);
    }
?>