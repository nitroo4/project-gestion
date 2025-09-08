<?php
session_start();
$title="Ajout d'une matière";
include('cadre.php');
?>

<?php
if(isset($_POST['promotion'])){
$_SESSION['promo']=$_POST['promotion'];//pour l'envoyer la 2eme fois 
$_SESSION['nomcl']=$_POST['nomcl'];
?>
<section class="fond">
	<div class="retour">
        <a href="index.php" class="prev"><i class="fa fa-arrow-left"></i>retour</a>
    </div>
	<form action="ajout_matiere.php" method="POST" class="formulair">
		<p class="p-text">
			Veuillez saisir la nouvelle matière : 
		</p><br>
		Matière       :      <input type="text" name="nommat" class="btn-modife"><br/><br/>
		<center><input type="submit" value="ajouter" class="btn-modi"></center>
	</form>
</section>
<?php }
else if(isset($_POST['nommat'])){//s'il a cliquer sur ajouter la 2eme fois
	if($_POST['nommat']!=""){
		$nomcl=$_SESSION['nomcl'];
		$nommat=addslashes(Htmlspecialchars($_POST['nommat']));
		$promo=$_SESSION['promo'];
		$codeclasse=(mysqli_query($conn,"select codecl from classe where nom='$nomcl' and promotion='$promo'"))->fetch_array();
		$codecl=$codeclasse['codecl'];
		$bool=true;
		$compte=(mysqli_query($conn,"select count(*) as nb from matiere where nommat='$nommat' and codecl='$codecl'"))->fetch_array();
		if($compte['nb']>0){
			$bool=false;
			?> <SCRIPT LANGUAGE="Javascript">	alert("Erreur d\'insertion, l\'enregistrement existe déja"); 
			var nomcl = "<?php echo urlencode($nomcl); ?>"; 
    		window.location.href = "afficher_matiere.php?nomcl=" + nomcl ;</SCRIPT> <?php
		}
		if($bool==true){
			mysqli_query($conn,"insert into matiere(nommat,codecl) values ('$nommat','$codecl')");
		?> <SCRIPT LANGUAGE="Javascript">	alert("Ajouté avec succés!");
			var nomcl = "<?php echo urlencode($nomcl); ?>";
			window.location.href = "afficher_matiere.php?nomcl=" + nomcl ;</SCRIPT> <?php
		}
	}
	else {
	?> <SCRIPT LANGUAGE="Javascript">	alert("Veuilliez remplire tous les champs!");window.location.href = "Ajout_matiere.php"</SCRIPT> <?php
	}
}
 else{
$data=mysqli_query($conn,"select distinct promotion from classe order by promotion desc");//select pour les promotions
$nomclasse=mysqli_query($conn,"select distinct nom from classe");
 ?>
 <section class="fond">
    <div class="retour" >
        <a href="index.php" class="prev"><i class="fa fa-arrow-left"></i>retour</a>
    </div>
    <div class="corpy">

        <h1 align=top class="text-h1" style=" font-size: 25px;font-family: 'genshin';text-align: center; font-size: 40px;">Ajouter un matiere<h1> 
        <form method="post" action="ajout_matiere.php" class="formulaire">
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
                    <?php while($a=($nomclasse)->fetch_array()){
                        echo '<option value="'.$a['nom'].'">'.$a['nom'].'</option>';
                    }?>
                </select>
            </div>
            <input type="submit" value="Suivant" class="btn-modif">
        </form>
    </div>
</section>

<?php } 
include "footer.php";
?>

