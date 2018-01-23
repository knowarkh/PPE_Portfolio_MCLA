<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Connexion à vos données</title>

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
	<div class="section-title center">
	<?php if (isset($_POST['password']) and isset($_POST['pseudo'])) {
    // on vérifie si "kangourou" est le bon mdp
    if ($_POST['password'] == "btssio") {
        $pseudo = $_POST['pseudo'];
        echo "c'est ta page $pseudo";
    } else {
        ?><strong>Veuillez insérer un mdp valide</strong>
	<br> <br> <a href="mdp.php">Revenir au formulaire</a>
    <?php
    }
} // si c'est pas good, on affiche le formulaire
else {
    ?><div class="container">
    <strong>Veuillez entrer vos identifiants pour vous connecter</strong>
    <form action="mdp.php" method="post" accept-charset="utf-8">
			<div class="row">
			<br>
				<div class="col-md-4 col-sm-3">
					<label> Pseudo : <input type="text" name="pseudo"></label>
					</div>
				
				<div class="col-md-4 col-sm-3">
					<label>
						Mot de passe : <input type="password" name="password">
					</label>
						
					</div>
				<div class="col-md-4 col-sm-3">
					<button type="submit" name="envoyer">Se connecter</button>
					</div>
				</div>
				</form>
				<br>
				<a href="index.html">Revenir sur le site</a>
			
		</div>
     <?php
}

?>
</div>		
</body>
</html>