<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Connexion réussie</title>

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css"
	href="fonts/font-awesome/css/font-awesome.css">

<!-- Stylesheet
    ================================================== -->
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/prettyPhoto.css">
<link href='http://fonts.googleapis.com/css?family=Lato:400,700,900,300'
	rel='stylesheet' type='text/css'>
<link
	href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300'
	rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/modernizr.custom.js"></script>

</head>
<body>
<?php
// session_start();
// include ("../db/Connexion.php");
 include ("../db/DAOs.php");
 //include ('../metier/Competences.php');

//---Test POST et redirection---
// if (isset($_POST['mailId'])) {
//     echo 'ok';
// } else {
//     echo 'ko';
// }

// createUtilisteur("ROUS","Melody","melody@sud.com","pastaga");

// ---on peut insérer un captcha ici---

// ---gérer les erreurs de connexion---
// TODO
// de type "Vous ne pouvez pas accéder à cette page si vous n\'êtes pas connecté"
// function erreur($err='')
// {
// $mess=($err!='')? $err:'Une erreur inconnue s\'est produite';
// exit('<p>'.$mess.'</p>
// <p>Cliquez <a href="./index.php">ici</a> pour revenir à la page d\'accueil</p></div></body></html>');
// }

// ---Oublie d'un champ---
// $message='';
if (empty($_POST['mailId']) || empty($_POST['mdpId'])) {
    // $message =
    ?>
    <div>
		<p>une erreur s\'est produite pendant votre identification. Vous devez
			remplir tous les champs</p>
		<p>
			Cliquez <a href="identification.php">ici</a> pour revenir à la page précédente
		</p>
    <?php
    
;
}// On vérifie le mot de passe
else {
    // ---Si acces ok---
    // if ($data['mdp'] == password_hash($_POST['mdpId'], PASSWORD_DEFAULT))
    if (is_utilisateur_valide($_POST['mailId'], $_POST['mdpId'])) {
        // $prenom = $_SESSION['prenom'];
        ?>
         <p>Bienvenue <?php echo $_SESSION['prenom']?>
            Connexion Réussie!</p>
		<p>
			Cliquez <a href="index.php">ici</a> pour revenir à la page d'accueil
		</p>
            <?php
        
;
    }    // ---Si acces KO---
    else {
        // echo password_hash($_POST['mdpId'], PASSWORD_DEFAULT);
        ?>
        <p>
			Une erreur s\'est produite pendant votre identification.<br /> Le mot
			de passe ou le pseudo entré n\'est pas correcte.
		</p>
		<p>
			Cliquez <a href="identification.php">ici</a> pour revenir à la page
			précédente <br />
			<br />Cliquez <a href="./index.php">ici</a> pour revenir à la page
			d\'accueil.
		</p>
	</div>
        <?php
        
;
    }
}

/**
 * create utilisateur avec mot de passe hashé
 */
function createUtilisteur($nom, $prenom, $mail, $password)
{
    // ---Test ajout stagiaire avec mdp hashé---
    $daoStagiaire = new \DAO\Stagiaire\StagiaireDAO();
    $options = array(
        'cost' => 11
    );
    $hashed_password = password_hash($password, PASSWORD_BCRYPT, $options);
    $stag = new \Competence\Stagiaire\Stagiaire($nom, $prenom, $mail, $hashed_password);
    echo $stag;
    $daoStagiaire->create($stag);
    echo "stagiaire créé : $stag";
}

function is_utilisateur_valide($mail, $password)
{
    $sql = "SELECT * FROM STAGIAIRE WHERE mail =:mail";
    $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
    
    $stmt->execute(array(
        'mail' => $mail
    ));
    
    $rep = false;
    if ($data = $stmt->fetch()) {
        
        $rep=password_verify($password, $data['mdp']);
        session_start();
        $_SESSION['id'] = $data['idS'];
        $_SESSION['nom'] = $data['nom'];
        $_SESSION['prenom'] = $data['prenom'];
        $_SESSION['mail'] = $data['mail'];
        
    }
    return $rep;
}

?>

</body>
</html>