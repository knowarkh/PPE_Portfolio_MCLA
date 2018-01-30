<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Nouveau Stagiaire</title>

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
// ---pas de php ici...---
?>

	<div class="section-title center">
		<strong>INSCRIPTION</strong>
		<div class="container">
			<strong>Créer votre compte Stagiaire : (Tous les champs sont
				obligatoires)</strong>
			<form action="inscriptEspacePerso.php" method="post"
				accept-charset="utf-8">
				<div class="row">
					<br>
					<div class="col-md-4 col-sm-3">
						<label> Votre nom : <input type="text" name="nom">
						</label>
					</div>
					<div class="col-md-4 col-sm-3">
						<label> Votre prénom : <input type="text" name="prenom">
						</label>
					</div>
					<div class="col-md-4 col-sm-3">
						<label> Adresse mail : <input type="email" name="mail">
						</label>
					</div>
					<div class="col-md-4 col-sm-3">
						<label> Mot de passe : <input type="password" name="mdp1">
						</label>
					</div>
					<div class="col-md-4 col-sm-3">
						<label> Confirmer mot de passe : <input type="password"
							name="mdp2">
						</label>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4 col-sm-3">
						<button type="submit" name="inscript">Inscription</button>
					</div>
				</div>
			</form>
			<br> <a href="index.php">Revenir sur le site</a>
		</div>
	</div>

</body>
</html>