<?php
    //Define métodos CRUD que devem ser escritos pela classe que implemente esta interface
    interface crudServico
    {
        public function create();
        public function read($search);
        public function update($id, $descricao, $dataInicio, $valorTotal, $valorPago, $cliente, $idEndereco);
        public function delete($id);
    }
    //$finalizado, $cancelado ficam para funções específicas
?>