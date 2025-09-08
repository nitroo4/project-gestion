<?php
session_start();
$title="Ajout d'un etudiant";
include('cadre.php');
include('calendrier.html');
// require_once("config.php");
?>
<section class="fond">
<div class="retour">
  <a href="index.php" class="prev"><i class="fa fa-arrow-left"></i>retour</a>
</div>
<?php
if(isset($_POST['nom'])){
	if($_POST['nom']!="" and $_POST['prenom']!="" and $_POST['date']!="" and $_POST['adresse']!="" and $_POST['phone']!="" and $_POST['pseudo']!="" and $_POST['mdp']!=""){
	$nom=addslashes(Htmlspecialchars($_POST['nom']));
	$prenom=addslashes(Htmlspecialchars($_POST['prenom']));
	$date=addslashes(Htmlspecialchars($_POST['date']));
	$phone=addslashes(Htmlspecialchars($_POST['phone']));
	$adresse=addslashes(Nl2br(Htmlspecialchars($_POST['adresse'])));
	$nomcl=$_POST['nomcl'];
	$promo=$_POST['promotion'];
	$pseudo=$_POST['pseudo'];
	$passe=$_POST['mdp'];
	$nb=(mysqli_query($conn,"select count(*) as nb from eleve where nomel='$nom' and prenomel='$prenom'"))->fetch_array();
	if($nb['nb']!=0){
	?><SCRIPT LANGUAGE="Javascript">alert("erreur! cet enregistrement existe déja!");</SCRIPT><?php
	}
	else{
	$data=mysqli_query($conn,"select codecl from classe where nom='$nomcl' and promotion='$promo'")->fetch_array();
	$codecl=$data['codecl'];
	mysqli_query($conn,"insert into eleve(nomel,prenomel,date_naissance,adresse,telephone,codecl) values('$nom','$prenom','$date','$adresse','$phone','$codecl')");
	/*		Ajouter le num dans le login    */
	$numel=(mysqli_query($conn,"select numel from eleve where nomel='$nom' and prenomel='$prenom'"))->fetch_array();
	$num=$numel['numel'];
	mysqli_query($conn,"insert into login(Num,pseudo,passe,type) values('$num','$pseudo','$passe','etudiant')");
	?>	<SCRIPT LANGUAGE="Javascript">alert("Ajout avec succés!");</SCRIPT> 	<?php
	}
	}
	else{
	?> 	<SCRIPT LANGUAGE="Javascript">alert("Vous devez remplir tous les champs!");	</SCRIPT> 	<?php
	}
}
?>
<?php
$data=mysqli_query($conn,"select distinct promotion from classe order by promotion desc");
?>
 <div class="corpy">

	<h1 align=top style=" font-size: 25px;font-family: 'genshin';text-align: center; font-size: 40px;">Ajouter un etudiant<h1> 
	<form action="Ajout_etudiant.php" method="POST" class="formulaire">
		<div>
			<label for="">Nom:</label><br>
			<input type="text" name="nom">
		</div>
		<div>
			<label for="">Prenom:</label><br>
			<input type="text" name="prenom">
		</div>
		<div>
			<label for="">Date de naissance:</label><br>
			 <input type="date" name="date" >
		</div>
		<div>
			<label for="">Telephone:</label><br>
			<input type="text" name="telephone">
		</div>
		<div>
			<label for="">pseudo:</label><br>
			<input type="text" name="pseudo">
		</div>
		<div>
			<label for="">Adresse: </label><br><textarea name="adresse" style="resize: none; height: max-content;"></textarea>
		</div>
		<div>
			<label for="">password:</label><br>
			<input type="password" name="passe"> 
		</div>
		<div>
			<label for="">Classe:</label>
			<select name="nomcl" class="filiere"> 
			<?php 
			$retour=mysqli_query($conn,"select distinct nom from classe"); // afficher les classes
			while($a=($retour)->fetch_array()){
			echo '<option value="'.$a['nom'].'">'.$a['nom'].'</option>';
			}?></select><br/>
			<label for="">Promotion:</label>
			<select name="promotion" class="filiere"> 
			<?php while($a=($data)->fetch_array()){
			echo '<option value="'.$a['promotion'].'">'.$a['promotion'].'</option>';
			}?></select><br/>
		</div>	
		
		<input type="submit" value="ajouter" class="btn-modif">
		<button type="button" class="btn-modif" style="background: red; padding:.5rem 1.5rem;"><a href="listeEtudiant.php" style="color: white;">annuler</a></button>
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		
	</form>
</div>

</section>
<?php include("footer.php"); ?>
