<?php
session_start();
$title="Chercher un élève";
require_once("config.php");
include('cadre.php');
if(isset($_SESSION['admin']) or isset($_SESSION['etudiant']) or isset($_SESSION['prof'])){
echo '<section class="fond">';
if(isset($_GET['cherche_eleve'])){ 
$retour=mysqli_query($conn,"SELECT distinct nom from classe"); // afficher les classes
$data=mysqli_query($conn,"select distinct promotion from classe order by promotion desc");
?>
<section class="fond">
	<div class="retour">
  <a href="index.php" class="prev"><i class="fa fa-arrow-left"></i>retour</a>
</div>
<div class="corpy">

	<h1 align=top style=" font-size: 25px;font-family: 'genshin';text-align: center; font-size: 40px;">Critère de recherche<h1> 
	<form action="chercher_eleve.php" method="POST" class="formulaire">
		<div>
			<label for="">Nom:</label><br>
			<input type="text" name="nomel">
		</div>
		<div>
			<label for="">Prenom:</label><br>
			<input type="text" name="prenomel">
		</div>
		
		<div class="form-group">
			<select name="promotion" class="control-select"> 
			<option value="">choisir un promotion</option>
			<?php while($a=$data->fetch_array()){
				echo '<option value="'.$a['promotion'].'">'.$a['promotion'].'</option>';
			}?>
			</select>
			<select name="nomcl" class="control-select">
				<option value="">choisir une class</option>
			<?php while($a=$retour->fetch_array()){
			echo '<option value="'.$a['nom'].'">'.$a['nom'].'</option>';
			}?>
			</select>
		</div>
		<input type="submit" value="chercher" class="btn-modif">
		<!-- <button type="button" class="btn-modif" style="background: red; padding:.5rem 1.5rem;"><a href="listeEtudiant.php?nomcl=<?php echo $ligne['nom']; ?>" style="color: white;">annuler</a></button> -->
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		
	</form>
</div>

<?php
}
else if(isset($_POST['nomel'])){
	$nomel=$_POST['nomel'];
	$prenomel=$_POST['prenomel'];
	$promo=$_POST['promotion'];
	$nomcl=$_POST["nomcl"];
	$option="";
	if($nomcl!="" and $promo=="")
	$option="and eleve.codecl in (select codecl from classe where nom='$nomcl')";
	else if($promo!="" and $nomcl=="")
	$option="and eleve.codecl in (select codecl from classe where promotion='$promo')";
	else if($promo!="" and $nomcl!="")
	$option="and eleve.codecl=(select codecl from classe where nom='$nomcl' and promotion='$promo')";
	$cherche=mysqli_query($conn,"select * from eleve,classe where classe.codecl=eleve.codecl and nomel LIKE '%$nomel%' and prenomel LIKE '%$prenomel%' ".$option."");//option contient les info suplimentaire
?>
<div class="retour">
	<a href="chercher_eleve.php?cherche_eleve=true" class="prev"><i class="fa fa-arrow-left"></i>retour</a>
</div>
<center>

	<table id="rounded-corner" style="max-height: 400px; overflow-y: auto; display: block;">
		<thead><tr><th class="rounded-company">Nom</th>
		<th class="rounded-q1">Prenom</th>
		<th class="rounded-q3">Adresse</th>
		<th class="rounded-q3">Date de naissance</th>
		<th class="rounded-q3">Telepohne</th>
		<th class="rounded-q3">Classe</th>
		<th class="rounded-q4">Promotion</th></tr></thead>
		<tfoot>
			<tr><td colspan="6" class="rounded-foot-left"><em>&nbsp;</em></td>
			<td class="rounded-foot-right">&nbsp;</td></tr>
		</tfoot>
		<tbody>
			<?php
	while($a=$cherche->fetch_array()){
		echo '<tr><td>'.$a['nomel'].'</td><td>'.$a['prenomel'].'</td><td >'.$a['adresse'].'</td><td >'.$a['date_naissance'].'</td><td >'.$a['telephone'].'</td><td>'.$a['nom'].'</td><td>'.$a['promotion'].'</td></tr>';
	}
	?>
	</tbody>
</table>
</center>
	<?php
	}
}
?>
</section>
<?php include "footer.php" ?>