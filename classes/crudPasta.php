<?php
    interface crudPasta
    {
        public function create();
        public function read($id);
        public function update($id, $nome);
        public function delete($id);
    }
?>