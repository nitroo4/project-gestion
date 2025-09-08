<?php
session_start();
$title="Modification des évaluations";
include('cadre.php');

if(isset($_GET['modif_eval'])){//modif_el qu'on a recup�rer de l'affichage (modifier)
$id=$_GET['modif_eval'];
$ligne=mysqli_query($conn,"select * from evaluation,eleve,classe where eleve.numel=evaluation.numel and eleve.codecl=classe.codecl and numeval='$id'")->fetch_array();//Pour afficher le nom de l'eleve et la note par deflault et le devoir,
$codecl=$ligne['codecl'];
$eleve=mysqli_query($conn,"select numel,nomel,prenomel from eleve where codecl='$codecl'");
$numdev=stripslashes($ligne['numdev']);
$mat_dev=(mysqli_query($conn,"select * from matiere,devoir where devoir.codemat=matiere.codemat and numdev='$numdev'"))->fetch_array();//pour selection la classe par defualt et afficher la promotion
?>
<div
class="fond">
<div class="retour">
	<a href="afficher_evaluation.php" class="prev"><i class="fa fa-arrow-left"></i>prev</a>
</div>
<form action="modif_eval.php" method="POST" class="formulair" style="line-height: 1.5rem;">

	<p class="p-text" style="text-align: center;height: 40px; font-size: 27px; color: grey; text-shadow: 1px 1px 1px black;">MODIFIE NOTE</p>

	Matière            :      <?php echo $mat_dev['nommat']; ?><br/>
	Classe                :     <?php echo stripslashes($ligne['nom']); ?><br/>
	Promotion        :       <?php echo stripslashes($ligne['promotion']); ?><br/>
	Date du devoir :      <?php echo stripslashes($mat_dev['date_dev']); ?><br/>
	Coefficient         :      <?php echo stripslashes($mat_dev['coeficient']); ?><br/>
	Semestre            :    <?php echo $mat_dev['numsem']; ?><br/>
	Etudiant            :     <select name="numel" class="control-select" > 
		<?php while($a=($eleve)->fetch_array()){
			echo '<option value="'.$a['numel'].'" '.choixpardefault2($a['numel'],$ligne['numel']).'>'.$a['nomel'].' '.$a['prenomel'].'</option>';
		}?></select><br/>
	Devoir N         :     <?php echo $mat_dev['n_devoir']; ?><br/>
	
	Note                 :      <input type="text" name="note" value="<?php echo $ligne['note']; ?>" class="btn-modife" placeholder="Entrez la note" required>
	<input type="hidden" name="id" value="<?php echo $id; ?>"><!-- pour revenir en arriere et pour avoir l'id dont lequel on va modifier--> 
	<br>
	<input type="submit" value="Modifier" class="btn-modi" style="width: 100%;">
</form>
</div>
<?php

}
if(isset($_POST['numel'])){//s'il a cliquer sur le bouton modifier
	if($_POST['note']!=""){
		$id=$_POST['id'];
		$numel=$_POST['numel'];
		$note=str_replace(",",".",$_POST['note']);//remplacer la , par .
		mysqli_query($conn,"update evaluation set numel='$numel', note='$note' where numeval='$id'");
		?> <SCRIPT LANGUAGE="Javascript">	alert("Modifié avec succés!"); window.location.href = "afficher_evaluation.php?afficher_evaluation=<?= urlencode($id) ?>"</SCRIPT> <?php
	}
	else{
		?> <SCRIPT LANGUAGE="Javascript">	alert("erreur! Vous devez remplire tous les champss"); 
		window.location.href = "modif_eval.php?modif_eval=<?= urlencode($id) ?>"</SCRIPT> <?php
		}
	echo '<br/><br/><a href="">Revenir à la page precedente !</a>';
}
if(isset($_GET['supp_eval'])){
$id=$_GET['supp_eval'];
mysqli_query($conn,"delete from evaluation where numeval='$id'");
?> <SCRIPT LANGUAGE="Javascript">	alert("Supprimé avec succés!"); 
window.location.href = "afficher_evaluation.php"</SCRIPT> <?php
}

include('footer.php');
?>
