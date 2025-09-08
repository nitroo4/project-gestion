<?php
session_start();
$title="Ajout d'un prof";
include('cadre.php');
require_once("config.php");
?>
<section class="fond">
<div class="retour">
  <a href="index.php" class="prev"><i class="fa fa-arrow-left"></i>retour</a>
</div>
<?php
if(isset($_POST['adresse'])){//s'il a cliquer sur ajouter la 2eme fois
if($_POST['nom']!="" and $_POST['prenom']!="" and $_POST['adresse']!="" and $_POST['telephone']!="" and $_POST['pseudo']!="" and $_POST['passe']!=""){
$nom=addslashes($_POST['nom']);
$prenom=addslashes($_POST['prenom']);//Premier ou 2eme devoir -- 1 ou 2
$adresse=addslashes(Nl2br(Htmlspecialchars($_POST['adresse'])));
$telephone=$_POST['telephone'];
$pseudo=$_POST['pseudo'];
$passe=$_POST['passe'];
$compte=(mysqli_query($conn,"select count(*) as nb from prof where nom='$nom' and prenom='$prenom'"))->fetch_array();// pour ne pas ajouter deux profs similaires
if($compte['nb']>0){
?>
<SCRIPT LANGUAGE="Javascript">alert("erreur! Ce prof existe déja ");</SCRIPT>
<?php
}
else{
mysqli_query($conn,"insert into prof(nom,prenom,adresse,telephone) values('$nom','$prenom','$adresse','$telephone')");
	/*		Ajouter le num dans le login    */
$numprof=(mysqli_query($conn,"select numprof from prof where nom='$nom' and prenom='$prenom'"))->fetch_array();
$num=$numprof['numprof'];
mysqli_query($conn,"insert into login(Num,pseudo,passe,type) values('$num','$pseudo','$passe','prof')");
?><SCRIPT LANGUAGE="Javascript">alert("Insertion avec succés!");</SCRIPT>
<?php
}
}
else{
?>
<SCRIPT LANGUAGE="Javascript">alert("Vous devez remplir tous les champs!"); window.location.href = "ajout_prof.php"</SCRIPT>
<?php
}
}
else {
 ?>

<div class="corpy">

	<h1 align=top style=" font-size: 25px;font-family: 'genshin';text-align: center; font-size: 40px;">Ajouter un prof<h1> 
	<form action="ajout_prof.php" method="POST" class="formulaire">
		<div>
			<label for="">Nom:</label><br>
			<input type="text" name="nom">
		</div>
		<div>
			<label for="">Prenom:</label><br>
			<input type="text" name="prenom">
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
		
		<input type="submit" value="ajouter" class="btn-modif">
		<button type="button" class="btn-modif" style="background: red; padding:.5rem 1.5rem;"><a href="afficher_prof.php" style="color: white;">annuler</a></button>
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		
	</form>
</div>

</section>

<?php
}

  include "footer.php"
?>

