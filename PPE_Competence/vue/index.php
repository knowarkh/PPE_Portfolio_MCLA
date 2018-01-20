<html>
<head>
<!-- <link rel="stylesheet" media="screen" type="text/css" -->
<!-- 	href="./aero.css" /> -->
<title>COMPETENCE</title>
</head>

<body>


<?php

$test="bonjour tout le monde";
echo $test;

$daoStagiaire = new \DAO\Stagiaire\StagiaireDAO ();
$stag=$daoStagiaire->read(1);
echo "avant: $stag";
$daoStagiaire->delete($stag);
echo "effacé : $stag";

?>

    </body>
</html>

