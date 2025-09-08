<?php
session_start();
$title="Modification des devoirs";
include('cadre.php');
include('calendrier.html');
echo '<div class="corp">';
if(isset($_GET['modif_dev'])){//modif_el qu'on a recup�rer de l'affichage (modifier)
$id=$_GET['modif_dev'];
$ligne=mysqli_query($conn,"select * from classe,devoir,matiere where classe.codecl=devoir.codecl and matiere.codemat=devoir.codemat and numdev='$id'")->fetch_array();//Pour afficher le nom de l'eleve et la note par deflault et le devoir,
$date=$ligne['date_dev'];

?>
<div class="fond">

	<form action="modif_devoir.php" method="POST" class="formulair" style="line-height: 1.3rem;">
		<h1 class="shadow" style="text-align: center;">Modifier un devoir</h1>
		Matière :<?php echo $ligne['nommat']; ?><br/>
		Classe : <?php echo stripslashes($ligne['nom']); ?><br/>
		Semestre : <?php echo $ligne['numsem']; ?><br/>
		Promotion : <?php echo $ligne['promotion']; ?><br/>
		<div style="line-height: 2rem;">
			Devoir N° : <br> 
			<input type="text" name="n_devoir" class="control-select" value="<?php echo $ligne['n_devoir']; ?>" style="width: 100%;">
		</div>
		<div style="line-height: 2rem;">
			Coefficient : <br> <input class="control-select" type="text" name="coeficient" value="<?php echo $ligne['coeficient']; ?>" style="width: 100%;">
		</div>
		<div style="line-height: 2rem;">
			Date du devoir     :  <br>   <input type="date" class="control-select" style="width: 100%;" name="date" class="calendrier" value="<?php echo $date; ?>"/>
		</div>
		<input type="submit" class="btn-modi" value="modifier" style="width: 100%;">
		
		
		<input type="hidden" name="id" value="<?php echo $id; ?>"><!-- pour revenir en arriere et pour avoir l'id dont lequel on va modifier-->
		<input type="hidden" name="id" value="<?php echo $id; ?>"><br>
		<input type="hidden" name="numdev" value="<?php echo $ligne['numdev']; ?>">
	</form>
</div>
<?php
}
if(isset($_POST['n_devoir'])){//s'il a cliquer sur le bouton modifier
	$id=$_POST['id'];
	if(($_POST['n_devoir']=="1" or $_POST['n_devoir']=="2") and $_POST['date']!="" and $_POST['coeficient']!=""){
		$n_devoir=$_POST['n_devoir'];
		$numdev=$_POST['numdev'];
		$coeficient=$_POST['coeficient'];
		$date=$_POST['date'];
		$compte=mysqli_query($conn,"select count(*) as nb from devoir where n_devoir='$n_devoir' and numdev='$numdev' and date_dev='$date'")->fetch_array();
		if($compte['nb']!=0){//deux devoir similaire()2 devoirs par matiere
		?> <SCRIPT LANGUAGE="Javascript">	alert("erreur de modification,ce devoir existe déja(verifier le numero de devoir)"); 
		window.location.href = "afficher_devoir.php";</SCRIPT> <?php
		}
		else{
		mysqli_query($conn,"update devoir set n_devoir='$n_devoir', coeficient='$coeficient',date_dev='$date' where numdev='$id'");
		?> <SCRIPT LANGUAGE="Javascript">	alert("Modifié avec succés!"); window.location.href = "afficher_devoir.php"; </SCRIPT> <?php
		}
	}
	else{
		?> <SCRIPT LANGUAGE="Javascript">	alert("erreur! Vous devez remplire tous les champs(n° de devoir 1 ou 2)"); </SCRIPT> <?php
		}
	// echo '<br/><br/><a href="modif_devoir.php?modif_dev='.$id.'">Revenir � la page precedente !</a>';
}
if(isset($_GET['supp_dev'])){
$id=$_GET['supp_dev'];
mysqli_query($conn,"delete from devoir where numdev='$id'");
mysqli_query($conn,"delete from evaluation where numdev='$id'");
?> <SCRIPT LANGUAGE="Javascript">	alert("Supprimé avec succés!\ntous les evaluations de ce devoir ont été supprimées"); </SCRIPT> <?php
echo '<br/><br/><a href="afficher_devoir.php">Revenir à la page l\'affichage</a>'; //on revient � la page princippale car on n'a plus l'id dont on affiche la matiere dans la modification
}
include 'footer.php';
?>

