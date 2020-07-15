<?php
    //Define métodos CRUD que devem ser escritos pela classe que implemente esta interface
    interface crudEndereco
    {
        public function create();
        public function read();
        public function update($id, $rua, $numero, $complemento, $cidade, $uf, $cliente);
        public function delete($id);
    }
?>