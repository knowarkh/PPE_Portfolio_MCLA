<?php
namespace DAO
{

    include ("../metier/Competence.php");

    abstract class DAO
    {

        abstract function read($id);

        abstract function create($objet);

        abstract function update($objet);

        abstract function delete($objet);

        protected $key;

        protected $table;

        function __construct($key, $table)
        {
            $this->key = $key;
            $this->table = $table;
        }

        function getLastKey()
        {
            $sql = "SELECT MAX($this->key) as max FROM $this->table;";
            $rs = \DB\Connexion\Connexion::getInstance()->prepare($sql);
            $rs->execute();
            $row = $rs->fetch();
            $id = $row["max"];
            return $id;
        }
    }
}
namespace DAO\Stagiaire
{

    class StagiaireDAO extends \DAO\DAO
    {

        function __construct()
        {
            parent::__construct("idS", "STAGIAIRE");
        }

        public function read($id)
        {
            $sql = "SELECT * FROM $this->table WHERE $this->key=:id";
            $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            
            $row = $stmt->fetch();
            $num = $row["idS"];
            $nom = $row["nom"];
            $prenom = $row["prenom"];
            $mail = $row["mail"];
            $rep = new \Competence\Stagiaire\Stagiaire($nom, $prenom, $mail);
            $rep->setIdS($num);
            return $rep;
        }

        public function update($objet)
        {
            // $succes = true;
            $sql = "UPDATE $this->table SET nom =:nom, prenom =:prenom , mail =: WHERE $this->key=:id";
            $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
            
            $id = $objet->getIdS();
            $nom = $objet->getNom();
            $prenom = $objet->getPrenom();
            $mail = $objet->getMail();
            
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':mail', $mail);
            
            $stmt->execute();
        }

        public function delete($objet)
        {
            $sql = "DELETE FROM $this->table WHERE $this->key=:id;";
            $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
            
            $id = $objet->getIdS();
            $stmt->bindParam(':id', $id);
            
            $stmt->execute();
        }

        public function create($objet)
        {
            $sql = "INSERT INTO $this->table (nom,prenom,mail) VALUES (:nom,:prenom,:mail);";
            $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
            
            $nom = $objet->getNom();
            $adr = $objet->getPrenom();
            $sal = $objet->getMail();
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':mail', $mail);
            $stmt->execute();
            
            $id = $this->getLastKey();
            $objet->setIdS($id);
        }
    }
}
namespace DAO\Competence
{

    class CompetenceDAO extends \DAO\DAO
    {

        function __construct()
        {
            parent::__construct("idC", "COMPETENCE");
        }

        public function read($id)
        {
            $sql = "SELECT * FROM $this->table WHERE $this->key=:id";
            $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            
            $row = $stmt->fetch();
            $num = $row["idC"];
            $act = $row["idA"];
            $description = $row["description"];

            $rep = new \Competence\Stagiaire\Stagiaire($act, $description);
            $rep->setIdC($num);
            return $rep;
        }

        public function update($objet)
        {
            // // $succes = true;
            // $sql = "UPDATE $this->table SET nom =:nom, prenom =:prenom , mail =: WHERE $this->key=:id";
            // $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
            
            // $id = $objet->getIdS();
            // $nom = $objet->getNom();
            // $prenom = $objet->getPrenom();
            // $mail = $objet->getMail();
            
            // $stmt->bindParam(':id', $id);
            // $stmt->bindParam(':nom', $nom);
            // $stmt->bindParam(':prenom', $prenom);
            // $stmt->bindParam(':mail', $mail);
            
            // $stmt->execute();
        }

        public function delete($objet)
        {
            $sql = "DELETE FROM $this->table WHERE $this->key=:id;";
            $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
            
            $id = $objet->getIdC();
            $stmt->bindParam(':id', $id);
            
            $stmt->execute();
        }

        public function create($objet)
        {
            // $sql = "INSERT INTO $this->table (nom,prenom,mail) VALUES (:nom,:prenom,:mail);";
            // $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
            
            // $nom = $objet->getNom();
            // $adr = $objet->getPrenom();
            // $sal = $objet->getMail();
            // $stmt->bindParam(':nom', $nom);
            // $stmt->bindParam(':prenom', $prenom);
            // $stmt->bindParam(':mail', $mail);
            // $stmt->execute();
            
            // $id = $this->getLastKey();
            // $objet->setIdS($id);
        }
    }
}

?>
