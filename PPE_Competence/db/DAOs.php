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
        
        function getLastKey()
        {
            $sql = "SELECT MAX($this->key) as max FROM $this->table;";
            //$rs = \DB\Connexion\Connexion::getInstance()->prepare($sql);
            $rs->execute();
            $row = $rs->fetch();
            $id = $row["max"];
            return $id;
        }
    }
}
?>
