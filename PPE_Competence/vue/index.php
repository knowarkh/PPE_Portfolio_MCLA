<?php
use DB\Connexion\Connexion;
?>
<html>
<head>
<link href="stylesheet.css" rel="stylesheet">
<!-- <link rel="stylesheet" media="screen" type="text/css" -->
<!-- 	href="./aero.css" /> -->
<title>COMPETENCE</title>
</head>

<body>


<?php
include ("../db/Connexion.php");
// $test="bonjour tout le monde";
// echo $test;

// $daoStagiaire = new \DAO\Stagiaire\StagiaireDAO ();
// $stag=$daoStagiaire->read(1);
// echo "avant: $stag";
// $daoStagiaire->delete($stag);
// echo "effacé : $stag";



echo Connexion::getTableauCompetences(1);

?>

    </body>
</html>

