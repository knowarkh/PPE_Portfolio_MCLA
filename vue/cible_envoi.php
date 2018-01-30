<?php

include ("../db/Connexion.php");
include ("../db/DAOs.php");
include("Controleur.php");



/*
 * Page de vérification des données envoyées, envoi des fichiers vers le dossier uploads du serveur puis
 * l'enregistre dans la base de données.
 */

// TODO vérifier à chaque ajout de fichier qu'il n'en existe pas déjà un sous le
// mm nom

$cheminDossier = "../uploads/";
$maxSize = 10000;
$extensionsValides = array(
    'jpg',
    'txt',
    'pdf',
    'png'
);

// créé le dossier uploads si il n'existe pas déjà, les ressources
//s'enregistreront à cet endroit
if (! file_exists($cheminDossier)) {
    mkdir($cheminDossier);
}

// Test du nom de la ressource, si elle existe et la converti obligatoirement en chaîne de caractères
if (isset($_POST['nomRessource'])) {
    $_POST['nomRessource'] = (string) $_POST['nomRessource'];
}
// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['maRessource']) and $_FILES['maRessource']['error'] == 0) {
    // Teste la taille du fichier
    if ($_FILES['maRessource']['size'] > $maxSize) {
        
        // Teste le type de fichier(extension)
        // 1. strrchr renvoi l'extension avec le point
        // 2. substr(chaîne,1) ignore le premier caractère de la chaine
        // 3. strtolower met l'extension en minuscule
        $extensionRessource = strtolower(substr(strrchr($_FILES['maRessource']['name'], "."), 1));
        if (in_array($extensionRessource, $extensionsValides)) {
            
            // move_uploaded_files(arg1,arg2) envoi le document dans un dossier permanent du serveur (avant
            // d'appeler cette fonction il est placé dans un dossier temporaire).
            $result = move_uploaded_file($_FILES['maRessource']['tmp_name'], $cheminDossier . basename($_FILES['maRessource']['name']));
            if ($result) {
                $message = 'Le fichier a bien été sauvé dans le serveur';
           
                
                // ajoute la ressource a la base de données
                createRess($_POST['nomRessource'], $cheminDossier . basename($_FILES['maRessource']['name']), $_FILES['maRessource']['type'], $_FILES['maRessource']['size']);
                $message = '<a href="'.$cheminDossier.basename($_FILES['maRessource']['name']).'">'.$_POST['nomRessource'].'</a>';
                
            } else {
                $message = 'Lextension est mauvaise';
            }
        } else {
            $message = 'Le fichier est trop gros';
        }
    } else {
        $message = 'Lenvoi nest pas effectue';
    }
    echo '<p>' . $message . '<p>';
}

?>