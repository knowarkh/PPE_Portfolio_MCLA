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
        
        static function getStagiaire()
        {
            $sql = "SELECT * FROM STAGIAIRE;";
            $rep = "<table class=\"table table-striped\">";
            foreach (Connexion::getInstance()->query($sql) as $row) {
                $rep .= "<tr><td>" . $row["idS"];
                $rep .= "</td><td>" . $row["nom"];
                $rep .= "</td><td>" . $row["prenom"];
                $rep .= "</td><td>" . $row["mail"] . "</td></tr>";
            }
            return $rep . "</table>";
        }
        
        //Affiche le tableau des activités validées
        static function getTableauCompetences($idStagiaire){
            //requête mySQL permettant de récupérer les données nécéssaires au tableau
            $sql = "SELECT DISTINCT activite.processus, activite.domaineActivite, activite.denomination, competence.description, validation.contexte, ressource.chemin
FROM validation, competence, preuve, ressource,activite
WHERE validation.idS=$idStagiaire
AND validation.idC = competence.idC
AND validation.idS = preuve.idS
AND validation.idC= preuve.idC
AND ressource.idR= preuve.idR
AND activite.idA = competence.idA;
";
            
            $rep = "<table class=\"tableauGeneral\"><tr><th>Activite</th><th>Competence</th></tr>";
            $oldActivite="";
            $oldCompetence="";
            
            
            foreach (Connexion::getInstance()->query($sql) as $row) {
                //Création du tableau activité dans un ligne du ableau général si nouvelle activité, sinon ne rien faire
                if ($oldActivite != $row["denomination"]){
                    if ($oldActivite != ""){
                        $rep.="</td></tr></table></td></tr>";
                    }
                    $rep.="<tr><td class=\"domaineActivite\">".$row["processus"]."<br/>".$row["domaineActivite"]."</td></tr>";
                    $rep.="<tr><td>".$row['denomination']."</td>";
                    $rep.="<td>";
                    $rep.="<table class=\"tableauCompetence\">";
                    $rep.="<tr><td>".$row["description"]."</td>";
                    $rep.="<td>".$row["contexte"]."<br/><a href=\"".$row["chemin"]."\">lien</a>";
                    
                    $oldActivite= $row["denomination"];
                    $oldCompetence=$row["description"];
                }
                else{
                    if ($oldCompetence != $row["description"]){
                        $rep.="</td></tr><tr><td>".$row["description"]."</td>";
                        $rep.="<td>".$row["contexte"]."<br/><a href=\"".$row["chemin"]."\">lien</a>";
                        
                        $oldCompetence=["description"];
                    }
                    else{
                        $rep.="<br/><a href=\"".$row["chemin"]."\">lien</a>";
                    }
                    
                }
                
            }
            return $rep . "</td></tr></table></td></tr></table>";
        }
    }
}
?>