<?php
session_start();
include('cadre.php');
?>

<?php
if(isset($_POST['nomcl'])){
$_SESSION['nomcl']=$_POST['nomcl'];
$nomcl=$_POST['nomcl'];
$promo=$_POST['promotion'];
$_SESSION['promo']=$promo;//pour l'envoyer la 2eme fois 
$donnee=mysqli_query($conn,"select codemat,nommat from matiere,classe where matiere.codecl=classe.codecl and classe.nom='$nomcl' and promotion='$promo'");
$prof=mysqli_query($conn,"select numprof,nom,prenom from prof");
?>
<div class="fond">
    <div class="retour">
        <a href="index.php" class="prev"><i class="fa fa-arrow-left"></i>retour</a>
    </div>
	<div class="corpy">
		<h1 align=top class="text-h1" style=" font-size: 25px;font-family: 'genshin';text-align: center; font-size: 40px;">ajouter un enseignement<h1> 
			<form action="ajout_enseignement.php" method="POST" class="formulaire">
				<div>
					<label for="">Matière       :</label>
					<select name="choix_mat" id="choix" class="control-select">
						<option value="">choisir une matiere</option>
						<?php
				while($a=($donnee)->fetch_array()){
					echo '<option value="'.$a['codemat'].'">'.$a['nommat'].'</option>';
				}
				?>
			</select>
		</div>
		<div>
			<label for="">
				Enseignant   : 
			</label>
			<select name="n_prof" class="control-select"><?php while($prof2=($prof)->fetch_array()){
				echo '<option value="'.$prof2['numprof'].'">'.$prof2['nom'].' '.$prof2['prenom'].'</option>';
			}
			?>
			   </select>
			</div>
			<div>
				<label for="">
					Semestre       :
				</label>
				<select name="semestre" class="control-select"><?php for($i=1;$i<=4;$i++){ echo '<option value="'.$i.'">Semestre'.$i.'</option>'; } ?>
			</select>
		</div>
		<br>
		<input type="submit" class="btn-modif" value="Envoyer">
		
	</form>
</div>
</div>
<?php }
else if(isset($_POST['semestre'])){//s'il a cliquer sur ajouter la 2eme fois
$semestre=$_POST['semestre'];
$codemat=$_POST['choix_mat'];
$nomcl=$_SESSION['nomcl'];
$n_prof=$_POST['n_prof'];//Premier ou 2eme devoir -- 1 ou 2
$promo=$_SESSION['promo'];
$codeclasse=(mysqli_query($conn,"select codecl from classe where nom='$nomcl' and promotion='$promo'"))->fetch_array() ;
$codecl=$codeclasse['codecl'];
/*
 pour ne pas ajouter deux enseignements similaires
 */
$data=mysqli_query($conn,"select count(*) as nb from enseignement where codecl='$codecl'  and codemat='$codemat' and numsem='$semestre'");
/*
 pour verifier si l'enseignemet (codecl,nommat,numsem) existe ou deja
 */
 
$nb=($data)->fetch_array();


$bool=true;
	
	/*
	pour ne pas ajouter deux controles similaire
	*/
	if($nb['nb']>0){
		$bool=false;
		?><SCRIPT LANGUAGE="Javascript">alert("Erreur d\'insertion\nimpossible d\'ajouter deux enseignements similaires");
		window.location.href = "ajout_enseignement.php";
		</SCRIPT><?php
	}
	if($bool==true){
	mysqli_query($conn,"insert into enseignement(codecl,codemat,numprof,numsem) values('$codecl','$codemat','$n_prof','$semestre')");
	?> <SCRIPT LANGUAGE="Javascript">	alert("Ajouté avec succés!"); 
	window.location.href = "ajout_enseignement.php?"; </SCRIPT> <?php
	}
}
 else {
$data=mysqli_query($conn,"select distinct promotion from classe order by promotion desc");//select pour les promotions
$donnee=mysqli_query($conn,"select distinct nom from classe"); 
?>
<div class="fond">
<div class="retour">
        <a href="ajout_enseignement.php" class="prev"><i class="fa fa-arrow-left"></i>retour</a>
    </div>
	<div class="corpy">
		
		<h1 class="text-h1" style=" font-size: 25px;font-family: 'genshin';text-align: center; font-size: 40px;">Critere d enseignement:</h1>
		<form action="ajout_enseignement.php" method="POST" class="formulaire">
			<div class="form-group">
				<select name="promotion" class="control-select"> 
					<option value="">choisir un promotion</option>
					<?php while($a=($data)->fetch_array()){
						echo '<option value="'.$a['promotion'].'">'.$a['promotion'].'</option>';
					}?>
				</select>
			</div>
			<div class="form-group">
				<select name="nomcl" class="control-select">
					<option value="">choisir une class</option>
					<?php while($a=($donnee)->fetch_array()){
						echo '<option value="'.$a['nom'].'">'.$a['nom'].'</option>';
					}?>
				</select>
			</div>
			<input type="submit" value="Suivant" class="btn-modif">
			
		</form>
	</div>
</div>
<?php } 
include "footer.php";?>

