<?php
    //Define métodos CRUD que devem ser escritos pela classe que implemente esta interface
    interface crudUsuario
    {
        public function create();
        public function read();
        public function update($id, $nome, $login, $senha, $administrador);
        public function delete($id);
    }