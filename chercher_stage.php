<?php
session_start();
include('cadre.php');
if(isset($_SESSION['admin']) or isset($_SESSION['etudiant']) or isset($_SESSION['prof'])){

if(isset($_GET['cherche_stage'])){ 
$retour=mysqli_query($conn,"select distinct nom from classe"); // afficher les classes
$data=mysqli_query($conn,"select distinct promotion from classe order by promotion desc");
?>
<section class="fond">
<div class="retour">
	<a href="index.php" class="prev"><i class="fa fa-arrow-left"></i>retour</a>
</div>
<div class="corpy">
<h1 align=top class="text-h1" style=" font-size: 25px;font-family: 'genshin';text-align: center; font-size: 40px;">Recherche de stage<h1> 
<form action="chercher_stage.php" method="post" class="formulaire">
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

</form>
</div>
</section>
<?php
}
else if(isset($_POST['nomel'])){
	$nomel=$_POST['nomel'];
	$prenomel=$_POST['prenomel'];
	$nomcl=$_POST['nomcl'];
	$promo=$_POST['promotion'];
	$option="";
	if($nomcl!="" and $promo=="")
	$option="and eleve.codecl in (select codecl from classe where nom='$nomcl')";
	else if($promo!="" and $nomcl=="")
	$option="and eleve.codecl in (select codecl from classe where promotion='$promo')";
	else if($promo!="" and $nomcl!="")
	$option="and eleve.codecl=(select codecl from classe where nom='$nomcl' and promotion='$promo')";
	$cherche=mysqli_query($conn,"select * from eleve,stage,classe where classe.codecl=eleve.codecl and stage.numel=eleve.numel and nomel LIKE '%$nomel%' and prenomel LIKE '%$prenomel%' ".$option."");//option contient les info suplimentaire
?>
<section class="fond">
	<div class="retour">
		<a href="chercher_stage.php?cherche_stage=true" class="prev"><i class="fa fa-arrow-left"></i>retour</a>
	</div>
	<center><table id="rounded-corner">
		<thead><tr><th class="rounded-company">Nom</th>
		<th class="rounded-q1">Prenom</th>
		<th class="rounded-q3">Lieu du stage</th>
		<th class="rounded-q3">Date de debut</th>
		<th class="rounded-q3">Date de fin</th>
		<th class="rounded-q3">Classe</th>
		<th class="rounded-q4">Promotion</th></tr></thead>
		<tfoot>
			<tr><td colspan="6" class="rounded-foot-left"><em>&nbsp;</em></td>
			<td class="rounded-foot-right">&nbsp;</td></tr>
		</tfoot>
		<tbody>
			<?php
	while($a=($cherche)->fetch_array()){
		echo '<tr><td>'.$a['nomel'].'</td><td>'.$a['prenomel'].'</td><td >'.$a['lieu_stage'].'</td><td >'.$a['date_debut'].'</td><td >'.$a['date_fin'].'</td><td>'.$a['nom'].'</td><td>'.$a['promotion'].'</td></tr>';
	}
	?>
	</tbody>
</table></center>
</section>

	<?php
	}
}

    include "footer.php";
?>

