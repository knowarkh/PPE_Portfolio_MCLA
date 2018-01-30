<?php
use db\Connexion\Connexion;
//include ("../db/DAOs.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


<title>Modifier vos donn�es</title>

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css"
	href="fonts/font-awesome/css/font-awesome.css">

<!-- Stylesheet
    ================================================== -->
<link rel="stylesheet" type="text/css" href="stylesheet.css" />
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
	<div class="container">

		<strong>Modification de la base de données</strong>

		<div class="row">
			<br>
			

				<!-- ------------------------------AJOUT VALIDATION------------------------------ -->

				<form action="./traitement.php" method="post"
					enctype="multipart/form-data">
					<?php 
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=ppe_competence', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    ?>
    <label for="pays">Quelle competence voulez vous ajouter ?</label><br />

				<!-- ---------------liste d�roulante comp�tences-------------- -->
				
					<select name="compAdd">
<?php
$reponse = $bdd->query('SELECT * FROM COMPETENCE');

while ($donnees = $reponse->fetch()) {
    ?>
           <option value="<?php echo $donnees['idC'];echo $donnees['description']; ?>"> Act: <?php echo $donnees['idA'];?> <?php echo $donnees['description'];?></option>
<?php
  
}

?> 

</select>
					<input name="ajout" type="submit" value="Ajouter une comp�tence" />
					
				</form>
				<br><br>
				<!-- ------------------------------SUPPRESSION VALIDATION------------------------------- -->
				<form action="./traitement.php" method="post"
					enctype="multipart/form-data">
					 <?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=ppe_competence', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    ?>
    <label for="pays">Quelle competence voulez vous supprimer ?</label><br />
    <!-- ---------------liste d�roulante validation-------------- -->
				<select name="compDel" id="compDel">
 
<?php

$reponse = $bdd->query('SELECT * FROM VALIDATION');

while ($donnees = $reponse->fetch()) {
    ?>
           <option value="<?php echo $donnees['idV'];  ?>"><?php echo $donnees['idC'];?> <?php echo $donnees['contexte'];?></option>
<?php
}

?>
</SELECT>
					<input name="suppr" type="submit" value="Supprimer une comp�tence" />
				</form>
				<br>
				
   

    <br> <br>
						<?php
    echo Connexion::getTableauCompetences(1);
    ?>
	<br><br>
<!-- ------------------------------AJOUT PPE------------------------------ -->

				<form action="./traitement.php" method="post"
					enctype="multipart/form-data">
					<?php 
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=ppe_competence', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    ?>
    <label for="pays">Choisir un PPE pour l'épreuve E4 ?</label><br />

				<!-- ---------------liste d�roulante PPE-------------- -->
				
					<select name="PPEAdd">
<?php
$reponse = $bdd->query('SELECT * FROM projet');

while ($donnees = $reponse->fetch()) {
    ?>
           <option value="<?php echo $donnees['idP']; ?>"> Act: <?php echo $donnees['denomination'];?></option>
<?php
  
}

?> 

</select>
<br>
					<input name="ajoutPPE" type="submit" value="Choisir un PPE" />
					
				</form>
				<!-- ------------------------------ENLEVER PPE------------------------------ -->

				<form action="./traitement.php" method="post"
					enctype="multipart/form-data">
					<?php 
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=ppe_competence', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    ?>
    <label for="pays">Enlever un PPE pour l'épreuve E4 ?</label><br />

				<!-- ---------------liste d�roulante PPE-------------- -->
				
					<select name="PPESuppr">
<?php
$reponse = $bdd->query('SELECT * FROM documentation');

while ($donnees = $reponse->fetch()) {
    ?>
           <option value="<?php echo $donnees['idS']; ?><?php echo $donnees['idP']; ?>"> Act: <?php echo $donnees['description'];?></option>
<?php
  
}

?> 

</select>
<br>
					<input name="supprPPE" type="submit" value="Supprimer un PPE" />
					
				</form>

		<br> <a href="decoSession.php">Déconnexion</a>

	</div>
</body>
</html>