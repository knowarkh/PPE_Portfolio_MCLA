<?php

namespace DAO {
    abstract class DAO{
        abstract function read();
        abstract function create();
        abstract function update();
        abstract function delete();
        protected $key;
        protected $table;
        function __construct($key, $table) {
            $this->key = $key;
            $this->table = $table;
        }
    }
}
?>