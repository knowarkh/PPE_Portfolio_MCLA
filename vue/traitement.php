<?php
include ("../db/DAOs.php");
use DAO\Validation\ValidationDAO;

//--------------------------------------AJOUT COMP---------------------------------------
if (isset($_POST['ajout'])) {
    
    $rep = new \Competence\Validation\Validation($_SESSION['id'], $_POST['idC'], $_POST['description']);
    
    (new ValidationDAO())->create($rep);
    
?><br><br><a href="modification_base.php">test ajout compétence ok</a><?php


/*--------------------------------CHOIX AJOUT RESSOURCES?--------------------------------
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=ppe_competence', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    ?>
<div>
	<label for="pays">Voulez vous ajouter une preuve ?</label> <select
		name="ressAdd" id="ressAdd">
 
<?php
    
    $reponse = $bdd->query('SELECT * FROM PREUVE');
    while ($donnees = $reponse->fetch()) {
        ?>
<option value="<?php echo $donnees['idR'];  ?>"> Comp: <?php echo $donnees['idV'];?> Contexte: <?php echo $donnees['idC'];?></option>
<?php
    }
    ?>
 </select>
</div>
<br>
<br>

<?php*/
}
//------------------------------------SUPRESSION COMP------------------------------------
if (isset($_POST['suppr'])) {
    
    $rep = (new ValidationDAO())->read($_POST['idV']);
    
    (new ValidationDAO())->delete($rep);
    
?>
<a href="modification_base.php">test suppression compétence ok</a>
<?php
}

//-------------------------------------AJOUT PPE-----------------------------------------
if (isset($_POST['ajoutPPE'])) {
    
    $rep = new \Competence\Validation\Validation(1, $_POST['idP'], $_POST['denomination']);
    
    (new ValidationDAO())->create($rep);

    }
    
?><br><br><a href="modification_base.php">test ajout PPE ok</a><?php


//----------------------------------SUPRESSION PPE---------------------------------------
if (isset($_POST['supprPPE'])) {
    
    $rep = (new ValidationDAO())->read($_POST['idV']);
    
    (new ValidationDAO())->delete($rep);
    
?><br><br><a href="modification_base.php">test suppr ok</a><?php
}
?>
