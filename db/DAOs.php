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

        // ---Récupère la dernière clé créé par l'auto-increment---
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

        // ---Methodes CRUD table STAGIAIRE---
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
            $sql = "UPDATE $this->table SET nom =:nom, prenom =:prenom , mail =:mail WHERE $this->key=:id";
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
            $prenom = $objet->getPrenom();
            $mail = $objet->getMail();
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':mail', $mail);
            $stmt->execute();
            
            $id = $this->getLastKey();
            $objet->setIdS($id);
        }
    }
}
namespace DAO\Activite
{

    class ActiviteDAO extends \DAO\DAO
    {

        function __construct()
        {
            parent::__construct("idA", "ACTIVITE");
        }

        public function read($id)
        {
            $sql = "SELECT * FROM $this->table WHERE $this->key=:id";
            $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            
            $row = $stmt->fetch();
            $num = $row["idA"];
            $denomination = $row["denomination"];
            $processus = $row["processus"];
            $domaineActivite = $row["domaineActivite"];
            
            $rep = new \Competence\Activite\Activite($denomination, $processus, $domaineActivite);
            $rep->setIdA($num);
            return $rep;
        }

        public function update($objet)
        {
            $sql = "UPDATE $this->table SET denomination =:denomination, processus =:processus, domaineActivite =:domaineActivite  WHERE $this->key=:id";
            $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
            
            $id = $objet->getIdA();
            $denomination = $objet->getDenomination();
            $processus = $objet->getProcessus();
            $domaineActivite = $objet->getDomaineActivite();
            
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':denomination', $denomination);
            $stmt->bindParam(':processus', $processus);
            $stmt->bindParam(':domaineActivite', $domaineActivite);
            
            $stmt->execute();
        }

        public function delete($objet)
        {
            $sql = "DELETE FROM $this->table WHERE $this->key=:id;";
            $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
            
            $id = $objet->getIdA();
            $stmt->bindParam(':id', $id);
            
            $stmt->execute();
        }

        public function create($objet)
        {
            $sql = "INSERT INTO $this->table (denomination, processus, domaineActivite) VALUES (:denomination, :processus, :domaineActivite);";
            $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
            
            $denomination = $objet->getDenomination();
            $processus = $objet->getProcessus();
            $domaineActivite = $objet->getDomaineActivite();
            $stmt->bindParam(':denomination', $denomination);
            $stmt->bindParam(':processus', $processus);
            $stmt->bindParam(':domaineActivite', $domaineActivite);
            
            $stmt->execute();
            
            $id = $this->getLastKey();
            $objet->setIdA($id);
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
            
            $rep = new \Competence\Competence\Competence($act, $description);
            $rep->setIdC($num);
            return $rep;
        }

        public function update($objet)
        {
            $sql = "UPDATE $this->table SET idA =:idA, description =:description WHERE $this->key=:id";
            $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
            
            $id = $objet->getIdC();
            $idA = $objet->getIdA();
            $description = $objet->getDescription();
            
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':idA', $idA);
            $stmt->bindParam(':description', $description);
            
            $stmt->execute();
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
            $sql = "INSERT INTO $this->table (idA,description) VALUES (:idA,:description);";
            $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
            
            $idA = $objet->getIdA();
            $description = $objet->getDescription();
            $stmt->bindParam(':idA', $idA);
            $stmt->bindParam(':description', $description);
            $stmt->execute();
            
            $id = $this->getLastKey();
            $objet->setIdC($id);
        }
    }
}
namespace DAO\Projet
{

    class ProjetDAO extends \DAO\DAO
    {

        function __construct()
        {
            parent::__construct("idP", "PROJET");
        }

        public function read($id)
        {
            $sql = "SELECT * FROM $this->table WHERE $this->key=:id";
            $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            
            $row = $stmt->fetch();
            $num = $row["idP"];
            $denomination = $row["denomination"];
            
            $rep = new \Competence\Projet\Projet($denomination);
            $rep->setIdP($num);
            return $rep;
        }

        public function update($objet)
        {
            $sql = "UPDATE $this->table SET denomination =:denomination WHERE $this->key=:id";
            $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
            
            $id = $objet->getIdP();
            $denomination = $objet->getDenomination();
            
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':denomination', $denomination);
            
            $stmt->execute();
        }

        public function delete($objet)
        {
            $sql = "DELETE FROM $this->table WHERE $this->key=:id;";
            $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
            
            $id = $objet->getIdP();
            $stmt->bindParam(':id', $id);
            
            $stmt->execute();
        }

        public function create($objet)
        {
            $sql = "INSERT INTO $this->table (denomination) VALUES (:denomination);";
            $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
            
            $denomination = $objet->getDenomination();
            $stmt->bindParam(':denomination', $denomination);
            $stmt->execute();
            
            $id = $this->getLastKey();
            $objet->setIdP($id);
        }
    }
}
namespace DAO\Documentation
{

    class DocumentationDAO extends \DAO\DAO
    {

        function __construct()
        {
            parent::__construct("idD", "DOCUMENTATION");
        }

        public function read($id)
        {
            $sql = "SELECT * FROM $this->table WHERE $this->key=:id";
            $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            
            $row = $stmt->fetch();
            $num = $row["idD"];
            $idS = $row["idS"];
            $idP = $row["idP"];
            $description = $row["description"];
            
            $rep = new \Competence\Documentation\Documentation($idS, $idP, $description);
            $rep->setIdD($num);
            return $rep;
        }

        public function update($objet)
        {
            $sql = "UPDATE $this->table SET idS =:idS, idP =:idP, description =:description WHERE $this->key=:id";
            $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
            
            $id = $objet->getIdD();
            $idS = $objet->getIdS();
            $idP = $objet->getIdP();
            $description = $objet->getDescription();
            
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':idS', $idS);
            $stmt->bindParam(':idP', $idP);
            $stmt->bindParam(':description', $description);
            
            $stmt->execute();
        }

        public function delete($objet)
        {
            $sql = "DELETE FROM $this->table WHERE $this->key=:id;";
            $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
            
            $id = $objet->getIdD();
            $stmt->bindParam(':id', $id);
            
            $stmt->execute();
        }

        public function create($objet)
        {
            $sql = "INSERT INTO $this->table (idS, idP, description) VALUES (:idS, :idP, :description);";
            $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
            
            $idS = $objet->getIdS();
            $idP = $objet->getIdP();
            $description = $objet->getDescription();
            $stmt->bindParam(':idS', $idS);
            $stmt->bindParam(':idP', $idP);
            $stmt->bindParam(':description', $description);
            $stmt->execute();
            
            $id = $this->getLastKey();
            $objet->setIdD($id);
        }
    }
}
namespace DAO\Ressource
{
    class RessourceDAO extends \DAO\DAO
    {
        
        function __construct()
        {
            parent::__construct("idR", "RESSOURCE");
        }
        public function read($id)
        {
            $sql = "SELECT * FROM $this->table WHERE $this->key=:id";
            $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            
            $row = $stmt->fetch();
            $num = $row["idR"];
            $chemin = $row["chemin"];
            $typeFichier = $row["typeFichier"];
            
            $rep = new \Competence\Ressource\Ressource($chemin, $typeFichier);
            $rep->setIdR($num);
            return $rep;
        }
        
        public function update($objet)
        {
            $sql = "UPDATE $this->table SET chemin =:chemin, typeFichier =:typeFichier WHERE $this->key=:id";
            $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
            
            $id = $objet->getIdR();
            $chemin = $objet->getChemin();
            $typeFichier = $objet->getTypeFichier();
            
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':chemin', $chemin);
            $stmt->bindParam(':typeFichier', $typeFichier);
            
            $stmt->execute();
        }
        
        public function delete($objet)
        {
            $sql = "DELETE FROM $this->table WHERE $this->key=:id;";
            $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
            
            $id = $objet->getIdR();
            $stmt->bindParam(':id', $id);
            
            $stmt->execute();
        }
        
        public function create($objet)
        {
            $sql = "INSERT INTO $this->table (chemin, typeFichier) VALUES (:chemin, :typeFichier);";
            $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
            
            $chemin = $objet->getChemin();
            $typeFichier = $objet->getTypeFichier();
            $stmt->bindParam(':chemin', $chemin);
            $stmt->bindParam(':typeFichier', $typeFichier);
            $stmt->execute();
            
            $id = $this->getLastKey();
            $objet->setIdR($id);
        }
    }   
}
namespace DAO\Validation
{
    class ValidationDAO extends \DAO\DAO
    {
        
        function __construct()
        {
            parent::__construct("idV", "VALIDATION");
        }
        public function read($id)
        {
            $sql = "SELECT * FROM $this->table WHERE $this->key=:id";
            $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            
            $row = $stmt->fetch();
            $num = $row["idV"];
            $idS = $row["idS"];
            $idC = $row["idC"];
            $contexte = $row["contexte"];
            
            $rep = new \Competence\Validation\Validation($idS, $idC, $contexte);
            $rep->setIdV($num);
            return $rep;
        }
        
        public function update($objet)
        {
            $sql = "UPDATE $this->table SET idS =:idS, idC =:idC, contexte =:contexte WHERE $this->key=:id";
            $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
            
            $id = $objet->getIdV();
            $idS = $objet->getIdS();
            $idC = $objet->getIdC();
            $contexte = $objet->getContexte();
            
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':idS', $idS);
            $stmt->bindParam(':idC', $idC);
            $stmt->bindParam(':contexte', $contexte);
            
            $stmt->execute();
        }
        
        public function delete($objet)
        {
            $sql = "DELETE FROM $this->table WHERE $this->key=:id;";
            $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
            
            $id = $objet->getIdV();
            $stmt->bindParam(':id', $id);
            
            $stmt->execute();
        }
        
        public function create($objet)
        {
            $sql = "INSERT INTO $this->table (idS, idC, contexte) VALUES (:idS, :idC, :contexte);";
            $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
            $idS = $objet->getIdS();
            $idC = $objet->getIdC();
            $contexte = $objet->getContexte();
            //echo "$idS, $idC, $contexte";
            $stmt->bindParam(':idS', $idS);
            $stmt->bindParam(':idC', $idC);
            $stmt->bindParam(':contexte', $contexte);
            $stmt->execute();
            
            $id = $this->getLastKey();
            $objet->setIdV($id);
        }
    }   
}
?>
