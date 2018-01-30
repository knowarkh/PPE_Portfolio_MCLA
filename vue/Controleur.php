<?php

        
        function createRess($name,$chemin,$typeFichier,$tailleFichier){
            $daoRess = new \DAO\Ressource\RessourceDAO();
            $ress= new \Competence\Ressource\Ressource($name, $chemin, $typeFichier, $tailleFichier);
            echo $ress;
            $daoRess->create($ress);
            echo "ressource créée: $ress";
        }
        
        function readRess($num){
            $daoRess = new \DAO\Ressource\RessourceDAO();
            $ress = $daoRess->read($num);
            echo "trouvé: $ress";
        }
        
        function updateRess($num, $nom, $typeFichier){
            $daoRess = new \DAO\Ressource\RessourceDAO();
            $ress = $daoRess->read($num);
            $ress->setTypeFichier($typeFichier);
            $ress->setNom($nom);
            $daoRess = $daoRess->update($ress);
            echo $ress;
        }
        
        function deleteRess($num){
            $daoRess = new \DAO\Ressource\RessourceDAO();
            $ress = $daoRess->read($num);
            echo "trouvé: $ress";
            $daoRess->delete($ress);
            echo "effacé: $ress";
        }
        
        
        
        
        
    
