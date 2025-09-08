<?php
session_start();
$title="Ajout d'un devoir";
include('cadre.php');
include('calendrier.html');
?>

<?php
if(isset($_POST['nomcl'])){
	$_SESSION['nomcl']=$_POST['nomcl'];
	$nomcl=$_POST['nomcl'];
	$promo=$_POST['promotion'];
	$_SESSION['promo']=$promo;
	$donnee=mysqli_query($conn,"select codemat,nommat from matiere,classe where matiere.codecl=classe.codecl and nom='$nomcl' and promotion='$promo'");
	?>
<div class="fond">
	<div class="retour">
        <a href="ajout_devoir.php" class="prev"><i class="fa fa-arrow-left"></i>retour</a>
    </div>
	<div class="corpy">
		<form action="ajout_devoir.php" method="POST" class="formulaire">
			<div>
				<label for="">Matière : </label><br>
				<select name="choix_mat" id="choix" class="control-select" style="width: 70%;">
				   <?php
					while($a=($donnee)->fetch_array()){
						echo '<option value="'.$a['codemat'].'">'.$a['nommat'].'</option>';
					}?>
			   	</select>
			</div>
			
			<div>
				<label for="">Coefficient :</label><br>
				<select style="width: 70%;" name="coefficient" class="control-select"><?php for($i=1;$i<=8;$i++){ echo '<option value="'.$i.'">'.$i.'</option>'; } ?>
				</select>
			</div>
			
			<div>
				<label for="">Semestre   :</label><br>
				<select name="semestre" style="width: 70%;" class="control-select"><?php for($i=1;$i<=4;$i++){ echo '<option value="'.$i.'">Semestre'.$i.'</option>'; } ?>
		  		</select>
			</div>
			<div>
				<label for="">Date du devoir :</label>
				<input type="text" name="date" class="calendrier" style="width: 70%;">
			</div>
			<div>
				<label for="">1er Devoir :
					<input type="radio" name="devoir" value="1" id="choix1" />
				</label>
			</div>
			<br>
			<div>
				<label for="choix1">2eme Devoir :
					<input type="radio" name="devoir" value="2" id="choix2" /> 
				</label>
			</div>
			<br>
			
			<input type="submit" class="btn-modif" value="Envoyer">
			
		</form>
	</div>
</div>
<?php }
else if(isset($_POST['date'])){//s'il a cliquer sur ajouter la 2eme fois
$date=addslashes(Nl2br(Htmlspecialchars($_POST['date'])));
$coefficient=$_POST['coefficient'];
$semestre=$_POST['semestre'];
$codemat=$_POST['choix_mat'];
$nomcl=$_SESSION['nomcl'];
$n_devoir=$_POST['devoir'];//Premier ou 2eme devoir -- 1 ou 2
$promo=$_SESSION['promo'];
/*
 pour ne pas ajouter deux controles similaire
 */
$data=mysqli_query($conn,"select count(*) as nb from devoir where codecl=(select codecl from classe where nom='$nomcl' and promotion='$promo') and codemat='$codemat' and numsem='$semestre' and n_devoir='$n_devoir'");
/*
 pour verifier si l'enseignemet (codecl,nommat,numsem) existe ou  pas
 */
$valider=mysqli_query($conn,"select count(*) as nb from enseignement where codecl=(select codecl from classe where nom='$nomcl' and promotion='$promo') and codemat='$codemat' and numsem='$semestre'");

$nb=($data)->fetch_array();

$nb2=($valider)->fetch_array();

$bool=true;

	/*
	pour verifier si l'enseignemet (codecl,nommat,numsem) existe ou  pas
	*/
	if($nb2['nb']!=0){
		$bool=false;
		var_dump($nb2);
		echo '<br\><h2>Erreur d\'insertion!! Cet enseignement n\'existe pas </h2>';
	}
	/*
	pour ne pas ajouter deux controles similaire
	*/
	if($nb['nb']>0){
		$bool=false; ?>
	
	<script>
		alert("Erreur d'insertion, le devoir existe déjà!");
		window.location.href = "ajout_devoir.php";
	</script>
	
	<?php
	
	}
	if($bool==true){
	$codeclasse=mysqli_query($conn,"select codecl from classe where nom='$nomcl' and promotion='$promo'");
	$code=($codeclasse)->fetch_array();
	$codecl=$code['codecl'];
	mysqli_query($conn,"insert into devoir(date_dev,coeficient,codemat,codecl,numsem,n_devoir) values('$date','$coefficient','$codemat','$codecl','$semestre','$n_devoir')");?>
	
	<script langague='javascript'>alert("Insertion avec succés ");
		window.location.href = "afficher_devoir.php?nomcl=<?php echo $nomcl; ?>&promotion=<?php echo $promo; ?>";
	</script>
	
	<?php
	}
}
 else {
 $retour=mysqli_query($conn,"select distinct nom from classe"); 
 $data=mysqli_query($conn,"select distinct promotion from classe order by promotion desc");
 ?>
	 
<section class="fond">
    <div class="retour">
        <a href="ajout_devoir.php" class="prev"><i class="fa fa-arrow-left"></i>retour</a>
    </div>
    <div class="corpy">

        <h1 align=top class="text-h1" style=" font-size: 25px;font-family: 'genshin';text-align: center; font-size: 40px;">Ajouter devoir <h1> 
        <form method="post" action="ajout_devoir.php" class="formulaire">
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
			<br>
            <input type="submit" value="Suivant" class="btn-modif">
        </form>
    </div>
</section>
<?php } 
include "footer.php";
?>

