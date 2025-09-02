<?php
session_start();
include('cadre.php');
include('calendrier.html');
require_once('config.php');
?>

<?php if(isset($_SESSION['modif_stage']) and isset($_POST['lieu'])){//si on a cliquer sur ajouter/modifier pour modifier le post pour ne pas entr
	if(!empty($_POST['lieu']) and !empty($_POST['date_debut']) and !empty($_POST['date_fin'])){
		$id=$_SESSION['modif_stage'];
	//	$numel=$_POST['numel'];
		$date_debut=$_POST['date_debut'];
		$date_fin=$_POST['date_fin'];
		$lieu=$_POST['lieu'];
		mysqli_query($conn,"update stage set lieu_stage='$lieu', date_debut='$date_debut', date_fin='$date_fin' where numstage='$id'");
		?> 	<SCRIPT LANGUAGE="Javascript">alert("Modification avec succes ! ");</SCRIPT> 	<?php
		unset($_SESSION['modif_stage']);
		?>
		<SCRIPT LANGUAGE="javaacripte">window.location.href = "afficher_stage.php"</SCRIPT>
<?php
	}
	else{
			?> 	<SCRIPT LANGUAGE="Javascript">alert("Veuilliz remplir tous les champs ");	</SCRIPT> 	<?php
		}
}
else if(isset($_POST['lieu'])){		//s'il a cliquer sur ajouter /modifier la 2eme fois pour ajouter
if(!empty($_POST['lieu']) and !empty($_POST['date_debut']) and !empty($_POST['date_fin'])){
	$numel=$_POST['numel'];
	$date_debut=addslashes(Nl2br(Htmlspecialchars($_POST['date_debut'])));//Premier ou 2eme devoir -- 1 ou 2
	$date_fin=addslashes(Nl2br(Htmlspecialchars($_POST['date_fin'])));
	$lieu=addslashes(Nl2br(Htmlspecialchars($_POST['lieu'])));
	$compte=(mysqli_query($conn,"select count(*) as nb from stage where lieu_stage='$lieu' and numel='$numel' and date_debut='$date_debut' and date_fin='$date_fin'"));
	$c=0;
	$bool=true;		
	while ($c=$compte->fetch_array()) {
		if($c['nb']>0){
			$bool=false;
			?> 	<SCRIPT LANGUAGE="Javascript">alert("Erreur d\'insertion,le stage existe déja!");window.location.href = "afficher_stage.php"</SCRIPT> 	<?php
		}
	}
	if($bool==true){
	mysqli_query($conn,"insert into stage(lieu_stage,date_debut,date_fin,numel) values ('$lieu','$date_debut','$date_fin','$numel')");
		?>	<SCRIPT LANGUAGE="Javascript">alert("Ajouté avec succés!"); window.location.href = 'afficher_stage.php'</SCRIPT><?php
	}

}
else{
?> 	<SCRIPT LANGUAGE="Javascript">alert("Vous devez remplir tous les champs!");window.location.href = "afficher_stage.php"</SCRIPT> 	<?php

}
}
else if(!isset($_POST['nomcl']) and !isset($_GET['modif_stage'])){
	$data=mysqli_query($conn,"select distinct promotion from classe order by promotion desc");//select pour les promotions
	$retour=mysqli_query($conn,"select distinct nom from classe");
 ?>
<section class="fond">
    <div class="retour">
        <a href="index.php" class="prev"><i class="fa fa-arrow-left"></i>retour</a>
    </div>
    <div class="corpy">

        <h1 align=top class="text-h1" style=" font-size: 25px;font-family: 'genshin';text-align: center; font-size: 40px;">Ajouter un stage<h1> 
        <form method="post" action="ajout_stage.php" class="formulaire">
            <div class="form-group">
                <select name="promotion" class="control-select" required> 
                    <option value="">choisir un promotion</option>
                    <?php while($a=($data)->fetch_array()){
                        echo '<option value="'.$a['promotion'].'">'.$a['promotion'].'</option>';
                    }?>
                </select>
            </div>
            <div class="form-group">
                <select name="nomcl" class="control-select" required>
                    <option value="">choisir une class</option>
                    <?php while($a=($retour)->fetch_array()){
                        echo '<option value="'.$a['nom'].'">'.$a['nom'].'</option>';
                    }?>
                </select>
            </div>
            <input type="submit" value="Suivant" class="btn-modif">
        </form>
    </div>
</section>
<?php }
if((isset($_POST['nomcl']) and isset($_POST['promotion'])) or isset($_GET['modif_stage'])){// si on a cliquer sur suivant ou sur modifier
$id="";
$lieu="";
$date_debut="";
$date_fin="";
if(isset($_GET['modif_stage'])){// si c'est une modification
$id=$_GET['modif_stage'];
$_SESSION['modif_stage']=$id;
$donnee=mysqli_query($conn,"select * from stage where numstage='$id'"); //	On selectione les champ qu'on va modifier dans la table stage
$donnes = $donnee->fetch_array();
$lieu=$donnes['lieu_stage'];
$date_debut=$donnes['date_debut'];
$date_fin=$donnes['date_fin'];
$data=mysqli_query($conn,"select numel,nomel,prenomel from eleve where numel=(select numel from stage where numstage='$id')");// 	on reselectionne le numel pour que �a soit similaire � la requete de l'ajout
$datas = $data->fetch_array();
}
else{//si c 'est l'ajout
	$_SESSION['promo']=$_POST['promotion'];//pour l'envoyer la 2eme fois 
	$promo=$_POST['promotion'];
	$nomcl=$_POST['nomcl'];
$data=mysqli_query($conn,"select numel,nomel,prenomel from eleve,classe where classe.codecl=eleve.codecl and nom='$nomcl' and promotion='$promo'");

$datas = $data->fetch_array();
}
?>
<section class="fond">
<div class="retour">
	<a href="index.php" class="prev"><i class="fa fa-arrow-left"></i>retour</a>
</div>
<div class="corpy" style="margin-top: 4rem;">
	<p class="text-h1" style="text-align: center; font-size: 38px;">Modifier stages </p>
 <form action="ajout_stage.php" method="POST" class="formulaire">
    <div>
        <label for="">Eleve : </label>
        <?php if(isset($_GET['modif_stage'])){
			echo $datas['nomel'].' '.$datas['prenomel'];
		}else{
		?> <select name="numel" class="control-select"> 
		<?php while($a=($data)->fetch_array()){
		echo '<option value="'.$a['numel'].'">'.$a['nomel'].' '.$a['prenomel'].'</option>';
		}?></select> <?php
		} ?>
    </div>
    <div>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
    </div>
    <div>
        <label for=""> Lieu stage :</label>
        <input type="text" name="lieu" value="<?php echo $lieu; ?>">
    </div>
    <div>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
    </div>

	<div>
		<label for="">Date de debut :</label><br>
		<input type="text" name="date_debut" class="calendrier" value="<?php echo $date_debut; ?>">
	</div>
	<div>
		<label for="">Date de fin :  </label><br>
		<input type="text" name="date_fin" class="calendrier" value="<?php echo $date_fin; ?>">
	</div>
    
    <input type="submit" value="ajouter" class="btn-modif">
    <button type="button" class="btn-modif" style="background: red; padding:.5rem 1.5rem;"><a href="afficher_stage.php" style="color: white;">annuler</a></button>
    
</form>
</div>
</section>

</form>
<?php } 
include "footer.php";
?>

