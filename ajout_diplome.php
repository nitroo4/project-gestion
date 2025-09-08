<?php
session_start();
$title="Ajout d'un diplôme";
include('cadre.php');
?>

<?php
if(isset($_GET['ajout_type'])){ ?>
<div class="fond">
	<div class="retour">
		<a class="prev" href="index.php"><i class="fa fa-arrow-left"></i>retour</a>
	</div>
 <form action="ajout_diplome.php" method="POST" class="formulair">
 <p class="p-text" style=" font-size: 22px;margin-bottom: 1rem;">Veuillez saisir le titre du diplôme à ajouter : </p>
 Titre du diplôme       :       <input type="text" name="ajout_titre" class="filiere" style="width: 70%;"><br/><br/>
<center><input type="submit" class="btn-modi" value="Ajouter"></center>
</form>
</div>

<?php
}
else if(isset($_GET['ajout_diplome'])){ 
$data=mysqli_query($conn,"select distinct promotion from classe order by promotion desc");//select pour les promotions
$nomclasse=mysqli_query($conn,"select distinct nom from classe");
 ?>
<div class="fond">
	<div class="retour">
		<a class="prev" href="ajout_diplome.php"><i class="fa fa-arrow-left"></i>retour</a>
	</div>
	<form action="ajout_diplome.php" method="POST" class="formulair">
		<p class="p-text" style="font-family: 'genshin'; margin-bottom: 1rem;">
			Veuillez choisir la classe et la promotion :
		</p>
		Promotion        :             <select name="promotion" class="control-select"> 
			<?php while($a=($data)->fetch_array()){
				echo '<option value="'.$a['promotion'].'">'.$a['promotion'].'</option>';
			}?></select><br/><br/>
		Classe                 :         <select name="nomcl" class="control-select">
		<option value="">choisir une class</option>
		<?php while($a=($nomclasse)->fetch_array()){
		echo '<option value="'.$a['nom'].'">'.$a['nom'].'</option>';
		}?></select><br/>
<input type="submit" value="Suivant" class="btn-modi" style="width: 100%;">
</form>
</div>
<?php }
else if(isset($_POST['nomcl'])){ 
$nomcl=$_POST['nomcl'];
$promo=$_POST['promotion'];
$data=mysqli_query($conn,"select numel,nomel,prenomel from eleve where codecl=(select codecl from classe where nom='$nomcl' and promotion='$promo')");
$titre=mysqli_query($conn,"select numdip,titre_dip from diplome");
?>
<div class="fond">
	<div class="retour">
		<a class="prev" href="index.php"><i class="fa fa-arrow-left"></i>retour</a>
	</div>
 <form action="ajout_diplome.php" method="POST" class="formulair" style="line-height: 2rem;">
 	<p class="p-text">Veuillez remplire les informations : <br/></p>
	<div class="warp">
		<label for="">
			Etudiant               : 
		</label>
       <select name="numel"> 
		<?php while($a=($data)->fetch_array()){
		echo '<option value="'.$a['numel'].'">'.$a['nomel'].' '.$a['prenomel'].'</option>';
		}?></select><br/>
	</div>
	<div class="warp">
		<label for="">
			Titre du diplôme        :
		</label>
		<select name="titre"><?php while($var=($titre)->fetch_array()){  
		echo '<option value="'.$var['numdip'].'">'.$var['titre_dip'].'</option>'; 
		} ?> </select><br/>
	</div>
	<div class="warp">
		<label for="">
			Note                    :
		</label>
		<input type="text" name="note"><br/>
	</div>
	<div class="warp">
		<label for="">Commentaire        :  </label>
		<textarea name="comment" id=""></textarea>
	</div>
	<div class="warp">
		<label for="">Etablissement        : </label>
		<input type="text" name="etabli"><br/>
	</div>
	<div class="warp">
		<label for="">Lieu                     :  </label>
		<input type="text" name="lieu"><br/>
	</div>
	<div class="warp">
		<label for="">Année d'obtention             : </label>
		<input type="text" name="ann_obt"><br/>
	</div>
	<center><input type="submit" value="Ajouter" class="btn-modi" style="width: 100%;"></center>
</form>
</div>

<?php
}
else if(isset($_POST['numel'])){
if($_POST['note']!="" and $_POST['lieu']!="" and $_POST['comment']!="" and $_POST['etabli']!="" and $_POST['ann_obt']!=""){
	$note=str_replace(',','.',$_POST['note']);
	$comment=addslashes(Htmlspecialchars($_POST['comment']));
	$etabli=addslashes(Htmlspecialchars($_POST['etabli']));
	$annee=addslashes(Htmlspecialchars($_POST['ann_obt']));
	$lieu=addslashes(Nl2br(Htmlspecialchars($_POST['lieu'])));
	$numel=$_POST['numel'];
	$numdip=$_POST['titre'];
	echo 'numel--> '.$numel;
	$nb=(mysqli_query($conn,"select count(*) as nb from eleve_diplome where numel='$numel'")->fetch_array());
		if($nb['nb']!=0){
			?><SCRIPT LANGUAGE="Javascript">alert("erreur! cet enregistrement existe déja!");
			window.location.href = "ajout_diplome.php?ajout_diplome";</SCRIPT><?php
		}
		else{
		mysqli_query($conn,"insert into eleve_diplome(numdip,numel,note,commentaire,etablissement,lieu,annee_obtention) values('$numdip','$numel','$note','$comment','$etabli','$lieu','$annee')");
		?>	<SCRIPT LANGUAGE="Javascript">alert("Ajout avec succés!");
		window.location.href = "ajout_diplome.php?ajout_diplome";</SCRIPT> <?php
	}
}
else {
?> 	<SCRIPT LANGUAGE="Javascript">alert("Vous devez remplir tous les champs!");	</SCRIPT> 	<?php
}
}
else if(isset($_POST['ajout_titre'])){
	$titre=$_POST['ajout_titre'];
	$nb=(mysqli_query($conn,"select count(*) as nb from diplome where titre_dip='$titre'"))->fetch_array();
	if($nb['nb']!=0){
	?><SCRIPT LANGUAGE="Javascript">alert("erreur! cet enregistrement existe déja!"); 
	window.location.href = "ajout_diplome.php?ajout_type";</SCRIPT><?php
	}
	else{
		mysqli_query($conn,"insert into diplome(titre_dip) values('$titre')");
		?>	<SCRIPT LANGUAGE="Javascript">alert("Ajout avec succés!");
	window.location.href = "type_diplome.php";
	</SCRIPT> 	
	<?php
	}
	
}

include 'footer.php';
?>