<html>
<head>
<!-- <link rel="stylesheet" media="screen" type="text/css" -->
<!-- 	href="./aero.css" /> -->
<title>COMPETENCE</title>
</head>

<body>


<?php

// $test="bonjour tout le monde";
// echo $test;
include ("../db/Connexion.php");
include ("../db/DAOs.php");

// test read stagiaire :
// $daoStag = new \DAO\Stagiaire\StagiaireDAO ();
// $stag=$daoStag->read(1);
// echo "trouvé : $stag";

// test update stagiaire :
// $daoStag = new \DAO\Stagiaire\StagiaireDAO ();
// $stag=$daoStag->read(2);
// $stag->setNom("Jean-Claude");
// $daoStag = $daoStag->update($stag);
// echo $stag;

// test delete stagiaire :
// $daoStagiaire = new \DAO\Stagiaire\StagiaireDAO ();
// $stag = $daoStagiaire->read(3);
// echo "avant: $stag";
// $daoStagiaire->delete($stag);
// echo "effacé : $stag";

// test create stagiaire :
$daoStagiaire = new \DAO\Stagiaire\StagiaireDAO();
$stag = new \Competence\Stagiaire\Stagiaire("Macron", "Manu", "manu.macron@elysee.com");
echo $stag;
$daoStagiaire->create($stag);
echo "stagiaire créé : $stag";

?>

    </body>
</html>

