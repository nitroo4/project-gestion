<?php
session_start();
$title="Ajout d'une classe";
include('cadre.php');
require_once("config.php");
?>


<?php
if(isset($_POST['numprof'])){//s'il a cliquer sur ajouter la 2eme fois
$nomcl=$_POST['nomcl'];
$numprof=$_POST['numprof'];
$promo=$_POST['promotion'];
$compte=(mysqli_query($conn,"select count(*) as nb from classe where nom='$nomcl' and promotion='$promo'"))->fetch_array();
$bool=true;
if($compte['nb']>0){
$bool=false;
echo '<h2>Erreur d\'insertion, l\'enregistrement existe déja </h2>';
}
if($bool==true){
mysqli_query($conn,"insert into classe(nom,numprofcoord,promotion) values ('$nomcl','$numprof','$promo')");
?> <SCRIPT LANGUAGE="Javascript">	alert("Ajouté avec succés!"); </SCRIPT> <?php
}   
}
else {
$data=mysqli_query($conn,"select numprof,nom from prof");//select pour les promotions
 ?>
<section class="fond">
<div class="retour">
	<a href="index.php" class="prev"><i class="fa fa-arrow-left"></i>retour</a>
</div>
<div class="corpy" style="margin-top: 4rem;">
 <form action="affiche_classe.php" method="POST" class="formulaire">
    <div>
        <label for="">Nom class:</label><br>
        <input type="text" name="nom">
    </div>
    <div>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
    </div>
    <div>
        <label for=""> Promotion </label>
        <input type="text" name="promotion">
    </div>
    <div style="padding-top: .45rem;">
        <label for="" ></label><br>
        Prof coordinataire : <select name="numprof" class="control-select"> <br/><br/>
        <?php while($a=($data)->fetch_array()){
        echo '<option value="'.$a['numprof'].'">'.$a['nom'].'</option>';
        }?></select>
    </div>
    
    <input type="submit" value="ajouter" class="btn-modif">
    <button type="button" class="btn-modif" style="background: red; padding:.5rem 1.5rem;"><a href="affiche_classe.php" style="color: white;">annuler</a></button>
    
</form>
</div>
</section>


</center>
<?php
}
?>
</div>


<?php
    include "footer.php";
?>
