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

        protected $donnees = array();

        function __construct($key, $table)
        {
            $this->key = $key;
            $this->table = $table;
        }

        // ---R�cup�re la derni�re cl� cr�� par l'auto-increment---
        function getLastKey()
        {
            $sql = "SELECT MAX($this->key) as max FROM $this->table;";
            $rs = \DB\Connexion\Connexion::getInstance()->prepare($sql);
            $rs->execute();
            $row = $rs->fetch();
            $id = $row["max"];
            return $id;
        }

        function afficheDonnees()
        {
            foreach ($donnees as $cle => $val) {
                echo $cle->$val;
            }
        }
    }
}
namespace DAO\Stagiaire
{

    class StagiaireDAO extends \DAO\DAO
    {

        static function getInstance()
        {
            static $objetDAO = null;
            if ($objetDAO == null) {
                $objetDAO = new StagiaireDAO();
            }
            return $objetDAO;
        }

        function __construct()
        {
            parent::__construct("idS", "STAGIAIRE");
        }

        // ---Methodes  CRUD table STAGIAIRE---
        public function read($id)
        {
            $rep = null;
            

            if (key_exists($id, $this->donnees)) {
                $rep = $this->donnees[$id];
                // echo "utilisation du tableau";
            } 
            else {
                
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
                // ajout dans le tableau de données
                $this->donnees[$id] = $rep;
                // echo $this->donnees[$id];
            }

            return $rep;
        }

        public function update($objet)
        {

            $sql = "UPDATE $this->table SET nom =:nom, prenom =:prenom , mail =:mail, mdp =:mdp WHERE $this->key=:id";

            $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
            
            $id = $objet->getIdS();
            $nom = $objet->getNom();
            $prenom = $objet->getPrenom();
            $mail = $objet->getMail();
            $mdp = $objet->getMdp();
            
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':mail', $mail);
            $stmt->bindParam(':mdp', $mdp);
            
            $stmt->execute();
        }

        public function delete($objet)
        {
            $sql = "DELETE FROM $this->table WHERE $this->key=:id;";
            $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
            
            $id = $objet->getIdS();
            $stmt->bindParam(':id', $id);
            
            // retrait du tableau donnees
            unset($this->donnees[$id]);
            
            $stmt->execute();
        }

        public function create($objet)
        {

            $sql = "INSERT INTO $this->table (nom,prenom,mail,mdp) VALUES (:nom,:prenom,:mail, :mdp);";

            $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
            
            $nom = $objet->getNom();
            $prenom = $objet->getPrenom();
            $mail = $objet->getMail();
            $mdp = $objet->getMdp();
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':mail', $mail);
            $stmt->bindParam(':mdp', $mdp);
            $stmt->execute();
            
            $id = $this->getLastKey();
            $objet->setIdS($id);
            
            // ajout dans le tableau données
            $this->donnees[$id] = $objet;
        }
    }
}
namespace DAO\Activite
{

    class ActiviteDAO extends \DAO\DAO
    {

        static function getInstance()
        {
            static $objetDAO = null;
            if ($objetDAO == null) {
                $objetDAO = new ActiviteDAO();
            }
            return $objetDAO;
        }

        function __construct()
        {
            parent::__construct("idA", "ACTIVITE");
        }

        public function read($id)
        {
            $rep = null;
            
            if (key_exists($id, $this->donnees)) {
                $rep = $this->donnees[$id];
                // echo "utilisation du tableau";
            } else {
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
                // ajout dans le tableau de données
                $this->donnees[$id] = $rep;
            }
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
            
            //Supprime l'objet du tableau donnees
            unset($this->donnees[$id]);
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
            
            // ajout dans le tableau données
            $this->donnees[$id] = $objet;
        }
    }
}
namespace DAO\Competence
{

    class CompetenceDAO extends \DAO\DAO
    {

        static function getInstance()
        {
            static $objetDAO = null;
            if ($objetDAO == null) {
                $objetDAO = new CompetenceDAO();
            }
            return $objetDAO;
        }

        function __construct()
        {
            parent::__construct("idC", "COMPETENCE");
        }

        public function read($id)
        {
            $rep = null;
            
            if (key_exists($id, $this->donnees)) {
                $rep = $this->donnees[$id];
                // echo "utilisation du tableau";
            } else {
                
            
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
            // ajout dans le tableau de données
            $this->donnees[$id] = $rep;
            }
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
            
            //Supprime l'objet du tableau donnees
            unset($this->donnees[$id]);
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
            
            // ajout dans le tableau données
            $this->donnees[$id] = $objet;
        }
    }
}
namespace DAO\Projet
{

    class ProjetDAO extends \DAO\DAO
    {

        static function getInstance()
        {
            static $objetDAO = null;
            if ($objetDAO == null) {
                $objetDAO = new ProjetDAO();
            }
            return $objetDAO;
        }

        function __construct()
        {
            parent::__construct("idP", "PROJET");
        }

        public function read($id)
        {
            $rep = null;
            
            if (key_exists($id, $this->donnees)) {
                $rep = $this->donnees[$id];
                // echo "utilisation du tableau";
            } else {
            $sql = "SELECT * FROM $this->table WHERE $this->key=:id";
            $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            
            $row = $stmt->fetch();
            $num = $row["idP"];
            $denomination = $row["denomination"];
            
            $rep = new \Competence\Projet\Projet($denomination);
            $rep->setIdP($num);
            // ajout dans le tableau de données
            $this->donnees[$id] = $rep;
            }
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
            
            //Supprime l'objet du tableau donnees
            unset($this->donnees[$id]);
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
            
            // ajout dans le tableau données
            $this->donnees[$id] = $objet;
        }
    }
}
namespace DAO\Documentation
{

    class DocumentationDAO extends \DAO\DAO
    {

        static function getInstance()
        {
            static $objetDAO = null;
            if ($objetDAO == null) {
                $objetDAO = new DocumentationDAO();
            }
            return $objetDAO;
        }

        function __construct()
        {
            parent::__construct("idD", "DOCUMENTATION");
        }

        public function read($id)
        {
            $rep = null;
            
            if (key_exists($id, $this->donnees)) {
                $rep = $this->donnees[$id];
                // echo "utilisation du tableau";
            } else {
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
            // ajout dans le tableau de données
            $this->donnees[$id] = $rep;
            }
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
            
            //Supprime l'objet du tableau donnees
            unset($this->donnees[$id]);
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
            
            // ajout dans le tableau données
            $this->donnees[$id] = $objet;
        }
    }
}
namespace DAO\Ressource
{

    class RessourceDAO extends \DAO\DAO
    {

        static function getInstance()
        {
            static $objetDAO = null;
            if ($objetDAO == null) {
                $objetDAO = new RessourceDAO();
            }
            return $objetDAO;
        }

        function __construct()
        {
            parent::__construct("idR", "RESSOURCE");
        }

        public function read($id)
       
        {
            $rep = null;
            
            if (key_exists($id, $this->donnees)) {
                $rep = $this->donnees[$id];
                // echo "utilisation du tableau";
            } else {
            $sql = "SELECT * FROM $this->table WHERE $this->key=:id";
            $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            
            $row = $stmt->fetch();
            $num = $row["idR"];
            $nom = $row['nom'];
            $chemin = $row["chemin"];
            $typeFichier = $row["typeFichier"];
            $tailleFichier = $row['tailleFichier'];
            
            $rep = new \Competence\Ressource\Ressource($nom, $chemin, $typeFichier, $tailleFichier);
            $rep->setIdR($num);
            // ajout dans le tableau de données
            $this->donnees[$id] = $rep;
            }
            return $rep;
        }

        public function update($objet)
        {
            $sql = "UPDATE $this->table SET nom=:nom,chemin =:chemin, typeFichier =:typeFichier, tailleFichier =:tailleFichier WHERE $this->key=:id";
            $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
            
            $id = $objet->getIdR();
            $nom = $objet->getNom();
            $chemin = $objet->getChemin();
            $typeFichier = $objet->getTypeFichier();
            $tailleFichier = $objet->getTailleFichier();
            
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':chemin', $chemin);
            $stmt->bindParam(':typeFichier', $typeFichier);
            $stmt->bindParam(':tailleFichier', $tailleFichier);
            
            $stmt->execute();
        }

        public function delete($objet)
        {
            $sql = "DELETE FROM $this->table WHERE $this->key=:id;";
            $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
            
            $id = $objet->getIdR();
            $stmt->bindParam(':id', $id);
            
            $stmt->execute();
            
            //Supprime l'objet du tableau donnees
            unset($this->donnees[$id]);
        }

        public function create($objet)
        {
            $sql = "INSERT INTO $this->table (nom, chemin, typeFichier, tailleFichier) VALUES (:nom,:chemin, :typeFichier, :tailleFichier);";
            $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
            
            $nom = $objet->getNom();
            $chemin = $objet->getChemin();
            $typeFichier = $objet->getTypeFichier();
            $tailleFichier = $objet->getTailleFichier();
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':chemin', $chemin);
            $stmt->bindParam(':typeFichier', $typeFichier);
            $stmt->bindParam(':tailleFichier', $tailleFichier);
            $stmt->execute();
            
            $id = $this->getLastKey();
            $objet->setIdR($id);
            
            // ajout dans le tableau données
            $this->donnees[$id] = $objet;
        }
    }
}
namespace DAO\Validation
{

    class ValidationDAO extends \DAO\DAO
    {

        static function getInstance()
        {
            static $objetDAO = null;
            if ($objetDAO == null) {
                $objetDAO = new ValidationDAO();
            }
            return $objetDAO;
        }

        function __construct()
        {
            parent::__construct("idV", "VALIDATION");
        }

        public function read($id)
        {
            $rep = null;
            
            if (key_exists($id, $this->donnees)) {
                $rep = $this->donnees[$id];
                // echo "utilisation du tableau";
            } else {
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
            // ajout dans le tableau de données
            $this->donnees[$id] = $rep;
            }
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
            //Supprime l'objet du tableau donnees
            unset($this->donnees[$id]);
        }

        public function create($objet)
        {
            $sql = "INSERT INTO $this->table (idS, idC, contexte) VALUES (:idS, :idC, :contexte);";
            $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
            $idS = $objet->getIdS();
            $idC = $objet->getIdC();
            $contexte = $objet->getContexte();
            // echo "$idS, $idC, $contexte";
            $stmt->bindParam(':idS', $idS);
            $stmt->bindParam(':idC', $idC);
            $stmt->bindParam(':contexte', $contexte);
            $stmt->execute();
            
            $id = $this->getLastKey();
            $objet->setIdV($id);
            
            // ajout dans le tableau données
            $this->donnees[$id] = $objet;
        }
    }
}
?>
