<?php 
    //Define métodos CRUD que devem ser escritos pela classe que implemente esta interface
    interface crudProduto
    {
        public function create();
        public function read($search);
        public function update($id, $nome, $categoria, $estoque, $valor);
        public function delete($id);
    }

?>