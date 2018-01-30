<!DOCTYPE xhtml>
<html lang="fr">
<head>
<meta charset="utf-8">
<title>Formulaire envoi de fichier</title>
</head>

<body>


<form action="cible_envoi.php" method="post" enctype="multipart/form-data">
        <p>
       			<label for="nomRessource">Nom: </label>
				<input type="text" name="nomRessource"/>
                Formulaire d'envoi de fichier :<br />
                <input type="file" name="maRessource" /><br />
                <input type="submit" value="Envoyer le fichier" />
        </p>
</form>
</body>

</html>

<?php
