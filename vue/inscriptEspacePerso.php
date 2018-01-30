<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Nouveau Stagiaire</title>

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css"
	href="fonts/font-awesome/css/font-awesome.css">

<!-- Stylesheet ================================================== -->
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

include ("../vue/identEspacePerso.php");

if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['mail']) || empty($_POST['mdp1']) || empty($_POST['mdp2'])) {
    ?>
    <div>
		<p> Vous devez remplir tous les champs</p>
		<p>
			Cliquez <a href="inscription.php">ici</a> pour revenir à l'inscription
		</p>
    <?php
    
;
}
else {
    $mdp1 = (htmlspecialchars($_POST['mdp1']));
    $mdp2 = (htmlspecialchars($_POST['mdp2']));

    if($mdp1 == $mdp2)
    {
        $nom = (htmlspecialchars($_POST['nom']));
        $prenom = (htmlspecialchars($_POST['prenom']));
        $mail = (htmlspecialchars($_POST['mail']));
        createUtilisteur($nom, $prenom, $mail, $mdp1); 
        ?>
        <p>Votre compte Stagiaire a bien été crée ! Veuillez maintenat accéder à la page de connexion</p>
        <p>
        Cliquez <a href="identification.php">ici</a> pour vous connecter
		</p>
		<?php
    }
    else
    {
        ?>
        <p>Vous devez saisir un mot de passe identique</p>
		<p>
			Cliquez <a href="inscription.php">ici</a> pour revenir à l'inscription
		</p>
		<?php
    }
}
    ;

?>

</div>
</body>
</html>