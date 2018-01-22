<?php

namespace DB\Connexion {
    
    class Connexion {
        static function getInstance() {
            static $dbh = NULL;
            if ($dbh==NULL) {
                $dsn = "mysql:host=localhost:3306;dbname=ppe_competence";
                $username = "root";
                $password = "";

                $options = array (
                    \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                );
                try {
                    $dbh = new \PDO ( $dsn, $username, $password, $options );
                } catch ( \PDOException $e ) {
                    echo "Probleme de connexion", $e;
                }
            }
            return $dbh;
        }
    }
}
?>