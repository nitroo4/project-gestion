<?php
session_start();
$title="Modification des diplomes";
include('cadre.php');
echo '<div class="corp">';
if(isset($_GET['modif_dip'])){//modif_el qu'on a recup�rer de l'affichage (modifier)
$id=$_GET['modif_dip'];
$ligne=mysqli_query($conn,"select * from eleve,classe,eleve_diplome,diplome where eleve.numel=eleve_diplome.numel and classe.codecl=eleve.codecl and diplome.numdip=eleve_diplome.numdip and id='$id'")->fetch_array();
$titre=mysqli_query($conn,"select numdip,titre_dip from diplome");
?>

<form action="modif_diplome.php" method="POST" class="formulair" style="line-height: 2rem;">
	<p class="text-h1">MODIFIER DIPLOME DE : </p>
	<div class="warp">
		<label for="">Nom et prénom          :</label>
		<?php echo $ligne['nomel'].' '.$ligne['prenomel']; ?>
	</div>
	<div class="warp">
		<label for="">Classe              	      :</label>
		<?php echo $ligne['nom']; ?>
	</div>
	<div class="warp">
		<label for="">Promotion                   :</label>
		<?php echo $ligne['promotion']; ?>
	</div>
	<div class="warp">
		<label for="">Titre du diplôme     </label>
		<select name="titre"><?php while($var=($titre)->fetch_array()){  
			echo '<option value="'.$var['numdip'].'" '.choixpardefault2($var['titre_dip'],$ligne['titre_dip']).'>'.$var['titre_dip'].'</option>'; 
		} ?> </select>
	</div>
	<div class="warp">
		<label for="">Note                            :</label>
		<input type="text" name="note" value="<?php echo $ligne['note']; ?>">
	</div>
	<div class="warp">
		<label for="">Commentaire                 :</label>
		<input type="text" name="comment" value="<?php echo $ligne['commentaire']; ?>">
	</div>
	<div class="warp">
		<label for="">Etablissement              :</label>
		<input type="text" name="etabli" value="<?php echo $ligne['etablissement']; ?>">
	</div>
	<div class="warp">
		<label for="">Lieu                             :</label>
        <input type="text" name="lieu" value="<?php echo $ligne['lieu']; ?>"><br/>
	</div>
	<div class="warp">
		<label for="">Année d'obtention        :</label>
		<input type="text" name="ann_obt" value="<?php echo $ligne['annee_obtention']; ?>"><br/>
	</div>
	<input type="hidden" name="id" value="<?php echo $id; ?>" >
	<div class="warps">
		<input type="submit" value="Modifier" class="btn-modi">
		
		<a href="diplome_obt.php" style="background-color: red;color:white;" class="btn-modi">annuler</a>
	</div>
</form>

<?php
}
if(isset($_POST['titre'])){
	if($_POST['titre']!="" and $_POST['note']!="" and $_POST['etabli']!="" and $_POST['lieu']!="" and $_POST['ann_obt']!=""){
		$id=$_POST['id'];
		$numdip=addslashes(Htmlspecialchars($_POST['titre']));
		$note=addslashes(Htmlspecialchars($_POST['note']));
		$lieu=addslashes(Htmlspecialchars($_POST['lieu']));
		$etabli=addslashes(Htmlspecialchars($_POST['etabli']));
		$comment=addslashes(Htmlspecialchars($_POST['comment']));
		$annee=addslashes(Htmlspecialchars($_POST['ann_obt']));
		mysqli_query($conn,"update eleve_diplome set numdip='$numdip', lieu='$lieu', etablissement='$etabli', commentaire='$comment', note='$note', annee_obtention='$annee' where id='$id'");
		?> <SCRIPT LANGUAGE="Javascript">	alert("Modifié avec succés!"); </SCRIPT> 
		<?php
	}
	else{
	?> <SCRIPT LANGUAGE="Javascript">	alert("erreur! Vous devez remplire tous les champss"); </SCRIPT> <?php
	}
	echo '<a href="modif_diplome.php?modif_dip='.$id.'">Revenir à la page precedente !</a>';
}
if(isset($_GET['supp_dip'])){
$id=$_GET['supp_dip'];
mysqli_query($conn,"delete from eleve_diplome where id='$id'");
?> <SCRIPT LANGUAGE="Javascript">	alert("Supprimé avec succés!"); </SCRIPT> <?php
echo '<br/><br/><a href="index.php?">Revenir à la page principale !</a>';
}

include './footer.php';
?>
