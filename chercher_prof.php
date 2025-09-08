<?php
session_start();
$title="Chercher un prof";
include('cadre.php');
if(isset($_SESSION['admin']) or isset($_SESSION['etudiant']) or isset($_SESSION['prof'])){

if(isset($_GET['cherche_prof'])){ 
$retour=mysqli_query($conn,"select distinct nom from classe"); // afficher les classes
$data=mysqli_query($conn,"select distinct promotion from classe order by promotion desc");
?>
<section class="fond">
	<div class="retour">
  <a href="index.php" class="prev"><i class="fa fa-arrow-left"></i>retour</a>
</div>
<div class="corpy">

	<h1 align=top style=" font-size: 25px;font-family: 'genshin';text-align: center; font-size: 40px;">Critère de recherche<h1> 
	<form action="chercher_prof.php" method="POST" class="formulaire">
		<div>
			<label for="">Nom du prof:</label><br>
			<input type="text" name="nomel">
		</div>
		<div>
			<label for="">Prenom du prof:</label><br>
			<input type="text" name="prenomel">
		</div>
		
		<div class="form-group">
			<select name="promotion" class="control-select"> 
			<option value="">choisir un promotion</option>
			<?php while($a=($data)->fetch_array()){
echo '<option value="'.$a['promotion'].'">'.$a['promotion'].'</option>';
}?>
			</select>
			<select name="nomcl" class="control-select">
				<option value="">choisir une class</option>
				<?php while($a=($retour)->fetch_array()){
				echo '<option value="'.$a['nom'].'">'.$a['nom'].'</option>';
}?>
			</select>
		</div>
		<input type="submit" value="chercher" class="btn-modif">
		<!-- <button type="button" class="btn-modif" style="background: red; padding:.5rem 1.5rem;"><a href="listeEtudiant.php?nomcl=<?php echo $ligne['nom']; ?>" style="color: white;">annuler</a></button> -->
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		
	</form>
</div>
</section>

<?php
}
else if(isset($_POST['nomel'])){
	$nomprof=$_POST['nomel'];
	$prenomprof=$_POST['prenomel'];
	$nomcl=$_POST['nomcl'];
	$promo=$_POST['promotion'];
	$option="";
	if($nomcl!="" and $promo=="")
	$option="and classe.nom='$nomcl'";
	else if($promo!="" and $nomcl=="")
	$option="and classe.promotion='$promo'";
	else if($promo!="" and $nomcl!="")
	$option="and classe.nom='$nomcl' and promotion='$promo'";
	$cherche=mysqli_query($conn,"select classe.codecl,prof.numprof,prof.nom as nomp,nommat,prof.prenom as prenomp,adresse,telephone,classe.nom,promotion from prof,classe,enseignement,matiere where matiere.codemat=enseignement.codemat and classe.codecl=enseignement.codecl and prof.numprof=enseignement.numprof and prof.nom LIKE '%$nomprof%' and prof.prenom LIKE '%$prenomprof%' ".$option."");//option contient les info suplimentaire
?>
<section class="fond">
	<div class="retour" >
		<a href="chercher_prof.php?cherche_prof=true" class="prev"><i class="fa fa-arrow-left"></i>retour</a>
	</div>
<center><table id="rounded-corner" style="max-height: 400px; overflow-y: auto; display: block;">
	
<thead><tr><th class="rounded-company">Nom du prof</th>
<th class="rounded-q1">Prenom du prof</th>
<th class="rounded-q3">Adresse</th>
<th class="rounded-q3">Telepohne</th>
<th class="rounded-q3">Classe enseignée</th>
<th class="rounded-q3">Matière enseignée</th>
<th class="rounded-q4">Promotion</th></tr></thead>
<tfoot>
<tr><td colspan="6" class="rounded-foot-left"><em>&nbsp;</em></td>
<td class="rounded-foot-right">&nbsp;</td></tr>
</tfoot>
 <tbody>
 <?php
	while($a=($cherche)->fetch_array()){
		echo '<tr><td>'.$a['nomp'].'</td><td>'.$a['prenomp'].'</td><td >'.$a['adresse'].'</td><td >'.$a['telephone'].'</td><td>'.$a['nom'].'</td><td>'.$a['nommat'].'</td><td>'.$a['promotion'].'</td></tr>';
	}
	?>
	</tbody>
	</table></center>
	<?php
	}
}
?>
</section>
</pre></div>
<?php
	include "footer.php";
?>