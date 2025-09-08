<?php
session_start();
$title="Modification des professeurs";
include('cadre.php');


if(isset($_GET['modif_prof'])){//modif_el qu'on a recup�rer de l'affichage (modifier)
$id=$_GET['modif_prof'];
$ligne=(mysqli_query($conn,"select * from prof where numprof='$id'"))->fetch_array();
$nom=stripslashes($ligne['nom']);
$prenom=stripslashes($ligne['prenom']);
$phone=stripslashes($ligne['telephone']);
$adresse=stripslashes($ligne['adresse']);
?>
<section class="fond">
	<div class="retour" style="margin-top: -4rem;">
		<a href="afficher_prof.php" class="prev"><i class="fa fa-arrow-left"></i>prev</a>
	</div>
<div class="corpy">
	<h1 align=top style=" font-size: 25px;font-family: 'genshin';text-align: center; font-size: 40px;">Modifier enseignant<h1> 
	<form action="modif_prof.php" method="POST" class="formulaire">
		<div>
			<label for="">Nom enseignant :</label><br>
			<input type="text" name="firstname" value="<?php echo $nom; ?>">
		</div>
		<div>
			<label for="">Prenom:</label><br>
			<input type="text" name="name" value="<?php echo $prenom; ?>">
		</div>
		<div>
			<label for="">Telephone:</label><br>
			<input type="text" name="phone" value="<?php echo $phone; ?>">
		</div>
		<div>
			<label for="">Adresse: </label><br><textarea name="adresse" style="resize: none; height: max-content;"><?php echo $adresse; ?></textarea>
		</div>
		
		<input type="submit" value="ajouter" class="btn-modif">
		<button type="button" class="btn-modif" style="background: red; padding:.5rem 1.5rem;"><a href="afficher_prof.php?nomcl=<?php echo $ligne['nom']; ?>" style="color: white;">annuler</a></button>
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		
	</form>
</div>

<?php
}
if(isset($_POST['id'])){
	if($_POST['adresse']!="" and $_POST['phone']!=""){
		$id=$_POST['id'];
		$phone=addslashes(Htmlspecialchars($_POST['phone']));
		$adresse=addslashes(Nl2br(Htmlspecialchars($_POST['adresse'])));
		mysqli_query($conn,"update prof set adresse='$adresse', telephone='$phone' where numprof='$id'");

		?> <SCRIPT LANGUAGE="Javascript">	alert("Modifié avec succés!"); 
		window.location.href = "afficher_prof.php";</SCRIPT> <?php

	}
	else{
	?> <SCRIPT LANGUAGE="Javascript">	alert("erreur! Vous devez remplire tous les champs"); </SCRIPT> <?php
	}
}
if(isset($_GET['supp_prof'])){
$id=$_GET['supp_prof'];
mysqli_query($conn,"delete from prof where numprof='$id'");
?> <SCRIPT LANGUAGE="Javascript">	alert("Supprimé avec succés!");
window.location.href = "afficher_prof.php"; </SCRIPT> <?php
}
?>
</pre>
</section>
