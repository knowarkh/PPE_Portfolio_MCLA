<?php

namespace Competence\Stagiaire
{

    class Stagiaire
    {

        private $idS;

        private $nom;

        private $prenom;

        private $mail;

        function __construct($nom, $prenom, $mail)
        {
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->mail = $mail;
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
namespace Competence\Competence
{

    class Competence
    {

        private $idC;

        private $idA;

        private $description;

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
namespace Competence\Activite
{

    class Activite
    {

        private $idA;

        private $denomination;

        private $processus;

        private $domaineDactivite;

        function __construct($denomination, $processus, $domainedactivite)
        {
            $this->denomination = $denomination;
            $this->domaineDactivite = $domainedactivite;
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

        public function getDomaineDactivite()
        {
            return $this->domaineDactivite;
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

        public function setDomaineDactivite($domaineDactivite)
        {
            $this->domaineDactivite = $domaineDactivite;
        }

        function __toString()
        {
            $rep = "<div classe=\"activite\">$this->idA $this->denomination $this->processus $this->domaineDactivite</div>";
            return $rep;
        }
    }
}
namespace Competence\Documentation
{

    class Documentation
    {

        private $idS;

        private $idP;

        private $description;

        function __construct($idS, $idP, $description)
        {
            $this->description = $description;
            $this->idP = $idP;
            $this->idS = $idS;
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
            $rep = "<div classe=\"documentation\">$this->idS $this->idP $this->description</div>";
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
namespace Competence\Document
{

    class Document
    {

        private $idR;

        private $idS;

        private $idP;

        function __construct($idR, $idS, $idP)
        {
            $this->idP = $idP;
            $this->idR = $idR;
            $this->idS = $idS;
        }

        public function getIdR()
        {
            return $this->idR;
        }

        public function getIdS()
        {
            return $this->idS;
        }

        public function getIdP()
        {
            return $this->idP;
        }

        public function setIdR($idR)
        {
            $this->idR = $idR;
        }

        public function setIdS($idS)
        {
            $this->idS = $idS;
        }

        public function setIdP($idP)
        {
            $this->idP = $idP;
        }

        function __toString()
        {
            $rep = "<div classe=\"document\">$this->idR $this->idS $this->idP</div>";
            return $rep;
        }
    }
}
namespace Competence\Ressource
{

    class Ressource
    {

        private $idR;

        private $chemin;

        private $typeFichier;

        function __construct($chemin, $typeFichier)
        {
            $this->chemin = $chemin;
            $this->typeFichier = $typeFichier;
        }

        public function getIdR()
        {
            return $this->idR;
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
            $rep = "<div classe=\"ressource\">$this->idR $this->chemin $this->typeFichier</div>";
        }
    }
}
namespace Competence\Preuve
{

    class Preuve
    {

        private $idR;

        private $idS;

        private $idC;

        function __construct($idR, $idS, $idC)
        {
            $this->idC = $idC;
            $this->idR = $idR;
            $this->idS = $idS;
        }

        public function getIdR()
        {
            return $this->idR;
        }

        public function getIdS()
        {
            return $this->idS;
        }

        public function getIdC()
        {
            return $this->idC;
        }

        public function setIdR($idR)
        {
            $this->idR = $idR;
        }

        public function setIdS($idS)
        {
            $this->idS = $idS;
        }

        public function setIdC($idC)
        {
            $this->idC = $idC;
        }

        function __toString()
        {
            $rep = "<div classe=\"preuve\">$this->idR $this->idS $this->isC</div>";
            return $rep;
        }
    }
}
namespace Competence\Validation
{

    class Validation
    {

        private $idS;

        private $idC;

        private $contexte;

        function __construct($idS, $idC, $contexte)
        {
            $this->contexte = $contexte;
            $this->idC = $idC;
            $this->idS = $idS;
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

        function __toString()
        {
            $rep = "<div classe=\"validation\">$this->idS $this->idC $this->contexte</div>";
        }
    }
}
?>
