<?php 
    //Define métodos CRUD que devem ser escritos pela classe que implemente esta interface
    interface crudProduto
    {
        public function create();
        public function read();
        public function update($id, $nome, $estoque, $valor, $item);
        public function delete($id);
    }

?>