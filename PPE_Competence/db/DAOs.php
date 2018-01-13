<?php

namespace DAO {
    abstract class DAO{
        abstract function read();
        abstract function create();
        abstract function update();
    }
}
?>