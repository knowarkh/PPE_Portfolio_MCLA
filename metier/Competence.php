<?php
namespace Competence\Stagiaire
{

    class Stagiaire
    {

        private $idS = - 1;

        private $nom = "COLLET";

        private $prenom = "Arnaud";

        private $mail = "collet.arn@gmail.com";
        
        private $mdp;

        function __construct($nom, $prenom, $mail, $mdp)
        {
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->mail = $mail;
            $this->mdp = $mdp;
        }

        
        /**
         * @return mixed
         */
        public function getMdp()
        {
            return $this->mdp;
        }
    
        /**
         * @param mixed $mdp
         */
        public function setMdp($mdp)
        {
            $this->mdp = $mdp;
        }
    
        public function getIdS()
        {
            return $this->idS;
        }

        public function getNom()
        {
            return $this->nom;
        }

        public function getPrenom()
        {
            return $this->prenom;
        }

        public function getMail()
        {
            return $this->mail;
        }

        public function setIdS($idS)
        {
            $this->idS = $idS;
        }

        public function setNom($nom)
        {
            $this->nom = $nom;
        }

        public function setPrenom($prenom)
        {
            $this->prenom = $prenom;
        }

        public function setMail($mail)
        {
            $this->mail = $mail;
        }

        function __toString()
        {
            $rep = "<div classe=\"stagiaire\">$this->idS $this->nom $this->prenom $this->mail</div>";
            // $rep = "<img width=" . Carte::largeur . " height=" . Carte::hauteur . " " . $src . " alt=\"image\" value=\"$this->position\" />";
            return $rep;
        }
    }
}
namespace Competence\Activite
{

    class Activite
    {

        private $idA;

        private $denomination;

        private $processus;

        private $domaineActivite;

        function __construct($denomination, $processus, $domaineActivite)
        {
            $this->denomination = $denomination;
            $this->domaineActivite = $domaineActivite;
            $this->processus = $processus;
        }

        public function getIdA()
        {
            return $this->idA;
        }

        public function getDenomination()
        {
            return $this->denomination;
        }

        public function getProcessus()
        {
            return $this->processus;
        }

        public function getDomaineActivite()
        {
            return $this->domaineActivite;
        }

        public function setIdA($idA)
        {
            $this->idA = $idA;
        }

        public function setDenomination($denomination)
        {
            $this->denomination = $denomination;
        }

        public function setProcessus($processus)
        {
            $this->processus = $processus;
        }

        public function setDomaineActivite($domaineActivite)
        {
            $this->domaineActivite = $domaineActivite;
        }

        function __toString()
        {
            $rep = "<div classe=\"activite\">$this->idA $this->denomination $this->processus $this->domaineActivite</div>";
            return $rep;
        }
    }
}
namespace Competence\Competence
{

    class Competence
    {

        private $idC = - 1;

        private $idA = - 1;

        private $description = "bonjour";

        function __construct($idA, $description)
        {
            $this->idA = $idA;
            $this->description = $description;
        }

        public function getIdC()
        {
            return $this->idC;
        }

        public function getIdA()
        {
            return $this->idA;
        }

        public function getDescription()
        {
            return $this->description;
        }

        public function setIdC($idC)
        {
            $this->idC = $idC;
        }

        public function setIdA($idA)
        {
            $this->idA = $idA;
        }

        public function setDescription($description)
        {
            $this->description = $description;
        }

        function __toString()
        {
            $rep = "<div classe=\"competence\">$this->idC $this->idA $this->description</div>";
            // $rep = "<img width=" . Carte::largeur . " height=" . Carte::hauteur . " " . $src . " alt=\"image\" value=\"$this->position\" />";
            return $rep;
        }
    }
}
namespace Competence\Projet
{

    class Projet
    {

        private $idP;

        private $denomination;

        function __construct($denomination)
        {
            $this->denomination = $denomination;
        }

        public function getIdP()
        {
            return $this->idP;
        }

        public function getDenomination()
        {
            return $this->denomination;
        }

        public function setIdP($idP)
        {
            $this->idP = $idP;
        }

        public function setDenomination($denomination)
        {
            $this->denomination = $denomination;
        }

        function __toString()
        {
            $rep = "<div classe=\"projet\">$this->idP  $this->denomination</div>";
            return $rep;
        }
    }
}
namespace Competence\Documentation
{

    class Documentation
    {

        private $idD = -1;
        
        private $idS = -1;

        private $idP = -1;

        private $description = "description";

        function __construct($idS, $idP, $description)
        {
            $this->description = $description;
            $this->idP = $idP;
            $this->idS = $idS;
        }

        public function getIdD()
        {
            return $this->idD;
        }
    
        public function setIdD($idD)
        {
            $this->idD = $idD;
        }
    
        public function getIdS()
        {
            return $this->idS;
        }

        public function getIdP()
        {
            return $this->idP;
        }

        public function getDescription()
        {
            return $this->description;
        }

        public function setIdS($idS)
        {
            $this->idS = $idS;
        }

        public function setIdP($idP)
        {
            $this->idP = $idP;
        }

        public function setDescription($description)
        {
            $this->description = $description;
        }

        function __toString()
        {
            $rep = "<div classe=\"documentation\">$this->idD $this->idS $this->idP $this->description</div>";
            return $rep;
        }
    }
}

namespace Competence\Ressource
{

    class Ressource
    {
        
        private $idR = -1;
        
        private $nom = "";
        
        private $chemin = "../C:/..";
        
        private $typeFichier = "texte";
        
        private $tailleFichier =-1;
        
        function __construct($nom, $chemin, $typeFichier, $tailleFichier)
        {
            $this->nom=$nom;
            $this->chemin = $chemin;
            $this->typeFichier = $typeFichier;
            $this->tailleFichier=$tailleFichier;
        }
        
        public function getIdR()
        {
            return $this->idR;
        }
        
        /**
         * @return string
         */
        public function getNom()
        {
            return $this->nom;
        }
        
        /**
         * @return number
         */
        public function getTailleFichier()
        {
            return $this->tailleFichier;
        }
        
        /**
         * @param string $nom
         */
        public function setNom($nom)
        {
            $this->nom = $nom;
        }
        
        /**
         * @param number $tailleFichier
         */
        public function setTailleFichier($tailleFichier)
        {
            $this->tailleFichier = $tailleFichier;
        }
        
        public function getChemin()
        {
            return $this->chemin;
        }
        
        public function getTypeFichier()
        {
            return $this->typeFichier;
        }
        
        public function setIdR($idR)
        {
            $this->idR = $idR;
        }
        
        public function setChemin($chemin)
        {
            $this->chemin = $chemin;
        }
        
        public function setTypeFichier($typeFichier)
        {
            $this->typeFichier = $typeFichier;
        }
        
        function __toString()
        {
            return $rep = "<div classe=\"ressource\">$this->idR $this->chemin $this->typeFichier</div>";
        }
    }
}

namespace Competence\Validation
{

    class Validation
    {
        private $idV = -1;

        private $idS = -1;

        private $idC = -1;

        private $contexte = "TP";

        function __construct($idS, $idC, $contexte)
        {
            $this->contexte = $contexte;
            $this->idC = $idC;
            $this->idS = $idS;
        }

        
        /**
         * @return number
         */
        public function getIdV()
        {
            return $this->idV;
        }
    
        /**
         * @param number $idV
         */
        public function setIdV($idV)
        {
            $this->idV = $idV;
        }
    
        public function getIdS()
        {
            return $this->idS;
        }

        public function getIdC()
        {
            return $this->idC;
        }

        public function getContexte()
        {
            return $this->contexte;
        }

        public function setIdS($idS)
        {
            $this->idS = $idS;
        }

        public function setIdC($idC)
        {
            $this->idC = $idC;
        }

        public function setContexte($contexte)
        {
            $this->contexte = $contexte;
        }
        
        public function isActiviteValide()
        {
         //TODO   
        }

        function __toString()
        {
            return $rep = "<div classe=\"validation\"> $this->idV $this->idS $this->idC $this->contexte</div>";
        }
    }
}
?>
