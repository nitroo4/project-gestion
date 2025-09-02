<?php
session_start();
include('cadre.php');
include('calendrier.html');

if(isset($_GET['modif_ensein'])){//modif_el qu'on a recup�rer de l'affichage (modifier)
$id=$_GET['modif_ensein'];
$ligne=mysqli_query($conn,"select classe.codecl,prof.numprof,promotion,classe.nom as nomcl,prenom,prof.nom as nomp,matiere.codemat,nommat,numsem from classe,matiere,enseignement,prof where classe.codecl=enseignement.codecl and matiere.codemat=enseignement.codemat and prof.numprof=enseignement.numprof and id='$id'")->fetch_array();
$prof=mysqli_query($conn,"select * from prof");
$mat=mysqli_query($conn,"select * from matiere");
?>
<div class="fond">

	<form action="modif_enseign.php" method="POST" class="formulair" style="line-height: 1.5rem;">
		Matière     :     <select name="codemat" class="control-select" style="width: 100%;"> 
			<?php 
	
	while($a=($mat)->fetch_array()){
		echo '<option value="'.$a['codemat'].'" '.choixpardefault2($a['codemat'],$ligne['codemat']).'>'.$a['nommat'].'</option>';
	}?></select><br/>
	Professeur :    <select name="numprof" class="control-select" style="width: 100%;"> 
		<?php while($a=($prof)->fetch_array()){
			echo '<option value="'.$a['numprof'].'" '.choixpardefault2($a['numprof'],$ligne['numprof']).'>'.$a['nom'].' '.$a['prenom'].'</option>';
		}?></select><br/>
	Classe        : <?php echo stripslashes($ligne['nomcl']); ?><br/>
	Promotion    :  <?php echo $ligne['promotion']; ?><br/>
	Semestre      : <?php echo $ligne['numsem']; ?>
	<input type="hidden" name="id" value="<?php echo $id; ?>">
	<input type="hidden" name="codecl" value="<?php echo $ligne['codecl']; ?>">
	<input type="hidden" name="numsem" value="<?php echo $ligne['numsem']; ?>"><br>
	<input type="submit" value="Modifier" class="btn-modi" style="width: 100%;">
</form>
</div>
<?php
}
if(isset($_POST['numprof'])){//s'il a cliquer sur le bouton modifier

		$id=$_POST['id'];
		$numprof=$_POST['numprof'];
		$codemat=$_POST['codemat'];
		$codecl=$_POST['codecl'];
		$numsem=$_POST['numsem'];
		$compte=(mysqli_query($conn,"select count(*) as nb from enseignement where numprof='$numprof' and codemat='$codemat' and codecl='$codecl'"));
		$compte=$compte->fetch_array();
		if($compte['nb']!=0){//deux devoir similaire()2 devoirs par matiere
		?> <SCRIPT LANGUAGE="Javascript">	alert("erreur de modification,cet enseignement existe déja"); 
		window.location.href = "modif_enseign.php?modif_ensein=<?php echo $id?>"</SCRIPT> <?php
		}
		else{
		mysqli_query($conn,"update enseignement set numprof='$numprof',codemat='$codemat' where id='$id'");
		$suppression=mysqli_query($conn,"select * from devoir where codemat='$codemat' and codecl='$codecl' and numsem='$numsem'");//tres important()supprimier les devoir correspondants
		/*			Supprimer le devoir et l'evaluation correspondnt			*/
		while($a=($suppression)->fetch_array()){
			$cle=$a['numdev'];
			mysqli_query($conn,"delete from evaluation where numdev='$cle'");
			mysqli_query($conn,"delete from devoir where numdev='$cle'");
		}
		?> <SCRIPT LANGUAGE="Javascript">	alert("Modifié avec succés!\ntous les entrés reliées à cet enregistrement en été supprimer"); 
		window.location.href = "afficher_enseign.php"</SCRIPT> <?php
		}		
}
if(isset($_GET['supp_ensein'])){
$id=$_GET['supp_ensein'];
/* 		requete pour utiliser son retour afin de recuperer le numdev qu'on va supprimer aussi 		*/
$ligne=mysqli_query($conn,"select classe.codecl,matiere.codemat,numsem from classe,matiere,enseignement where classe.codecl=enseignement.codecl and matiere.codemat=enseignement.codemat and id='$id'")->fetch_array();
$codemat=$ligne['codemat'];
$codecl=$ligne['codecl'];
$numsem=$ligne['numsem'];
$suppression=mysqli_query($conn,"select * from devoir where codemat='$codemat' and codecl='$codecl' and numsem='$numsem'");//tres important()supprimier les devoir correspondants
		/*			Supprimer le devoir et l'evaluation correspondnte			*/
		while($a=($suppression)->fetch_array()){
			$cle=$a['numdev'];
			mysqli_query($conn,"delete from evaluation where numdev='$cle'");
			mysqli_query($conn,"delete from devoir where numdev='$cle'");
		}
mysqli_query($conn,"delete from enseignement where id='$id'");
?> <SCRIPT LANGUAGE="Javascript">	alert("Supprimé avec succé0s!\ntous les entrés reliées à cet enregistrement en été supprimer"); </SCRIPT> <?php
echo '<br/><br/><a href="index.php">Revenir à la page à principale</a>'; //on revient � la page princippale car on n'a plus l'id dont on affiche la matiere dans la modification
}
?>
