<?php
session_start();
$title="Modification des classes";
include('cadre.php');
if(isset($_GET['modif_classe'])){//modif_el qu'on a recup�rer de l'affichage (modifier)
$id=$_GET['modif_classe'];
$ligne=mysqli_query($conn,"select codecl,classe.nom as nomcl,promotion,numprofcoord,prof.nom,prenom from classe,prof where numprof=numprofcoord and codecl='$id'")->fetch_array();
$promo=mysqli_query($conn,"select distinct promotion from classe");
$prof=mysqli_query($conn,"select numprof,nom,prenom from prof");
$nom=stripslashes($ligne['nomcl']);
$numprof=stripslashes($ligne['numprofcoord']);
$promotion=stripslashes($ligne['promotion']);
?>
<section class="fond">

<div class="corpy">
		<h1 align=top style=" font-size: 25px;font-family: 'genshin';text-align: center; font-size: 40px;">Modifie classe<h1> 

<form action="modif_classe.php" method="POST" class="formulaire">
	<div>
		<label for="">Nom de la classe :</label><br>
		<input type="text" name="nom" value="<?php echo $nom?>">
	</div>
	<div>
		<label for=""></label><br>
		<input type="hidden" name="prenom">
	</div>
	<div>
		<label for=""></label><br>
		Prof coordinataire : 
		<select name="prof" class="control-select"> 
		<?php while($a=($prof)->fetch_array()){
		echo '<option value="'.$a['numprof'].'" '.choixpardefault2($a['numprof'],$numprof).'>'.$a['nom'].' '.$a['prenom'].'</option>';
		}?></select>
	</div>
	<div>
		<label for=""></label><br>
		Promotion : 
		<select name="promo" class="control-select"> 
			<?php while($a=($promo)->fetch_array()){
			echo '<option value="'.$a['promotion'].'" '.choixpardefault2($a['promotion'],$promotion).'>'.$a['promotion'].'</option>';
			}?>
		</select>
	</div>
	
	<input type="submit" value="ajouter" class="btn-modif" name="btn-mod">
	<button type="button" class="btn-modif" style="background: red; padding:.5rem 1.5rem;"><a href="affiche_classe.php" style="color: white;">annuler</a></button>
	<input type="hidden" name="id" value="<?php echo $id; ?>">
	
</form>
</div>


</section>

<?php
}
if(isset($_POST['btn-mod'])){//s'il a cliquer sur le bouton modifier

	if($_POST['nom']!=""){
		$id=$_POST['id'];
		$nom=addslashes(Htmlspecialchars($_POST['nom']));
		$prof=addslashes(Htmlspecialchars($_POST['prof']));
		$promo=addslashes(Htmlspecialchars($_POST['promo']));
		mysqli_query($conn,"update classe set nom='$nom',numprofcoord='$prof',promotion='$promo' where codecl='$id'");
		?> <SCRIPT LANGUAGE="Javascript">	alert("Modifié avec succés!"); 
		window.location.href = 'affiche_classe.php'
		</SCRIPT> <?php
		
	}
	else{
		echo '<SCRIPT LANGUAGE="Javascript">	alert("vous devez remplir les champs!"); </SCRIPT> ';		
	}
}
if(isset($_GET['supp_classe'])){
$id=$_GET['supp_classe'];
mysqli_query($conn,"delete from classe where codecl='$id'");
?> <SCRIPT LANGUAGE="Javascript">	alert("Supprimé avec succés!"); window.location.href = 'affiche_classe.php'</SCRIPT> <?php

}

include 'footer.php'
?>

