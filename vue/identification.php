<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>IDENTIFICATION</title>

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
//---php inutil ?---
// session_start();

// include ("../db/Connexion.php");
// include ("../db/DAOs.php");

// if (!isset($_POST['mailID']))
// {
?> 
	<div class="section-title center">
		<h2>Identification</h2>
		<!-- 	<br> <br> <a href="hashageTest.php">Revenir au formulaire</a> -->
<div class="container">
			<strong>Veuillez entrer vos identifiants pour vous connecter</strong>
			<form action="identification.php" method="post" accept-charset="utf-8">
				<div class="row">
					<br>
					<div class="col-md-4 col-sm-3">
						<label> Mail : <input type="email" name="mailId">
						</label>
					</div>
					<div class="col-md-4 col-sm-3">
						<label> Mot de passe : <input type="password" name="mdpId">
						</label>
					</div>
					<div class="col-md-4 col-sm-3">
						<button type="submit" name="envoyer">Se connecter</button>
					</div>
				</div>
			</form>
			<div class="row">
			<div class="col-sm-3 col-md-4  col-sm-offset-6 col-md-offset-8"><a href="inscription.php"><button>S'inscrire</button></a></div></div>
			
			<br> <a href="index.php">Revenir sur le site</a>
		</div>   
</div>

<?php 
// }
?>

</body>
</html>