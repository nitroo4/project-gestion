<?php
session_start();
$title="Affichage des bulletins";
include('cadre.php');
$data=mysqli_query($conn,"select distinct promotion from classe order by promotion desc");

?>
<section class="fond">
  <div class="retour">
    <a href="afficher_bulettin.php" class="prev"><i class="fa fa-arrow-left"></i>retour</a>
  </div>
<?php
if(isset($_POST['nomcl']) and isset($_POST['radiosem'])){
$nomcl=$_POST['nomcl'];
$promo=$_POST['promotion'];
$semestre=$_POST['radiosem'];
$matiere=mysqli_query($conn,"select matiere.codemat,nommat from enseignement,matiere where enseignement.codemat=matiere.codemat and enseignement.codecl=(select codecl from classe where nom='$nomcl' and promotion='$promo') and numsem='$semestre'");
echo '<form method="post" action="afficher_bulettin.php" class="formulair">';
echo ' <span style="font-size: 25px;font-family: "genshin";text-align: center; font-size: 40px;">
Veuillez choisir la matiere pour  :
'.$nomcl.' de '.$promo.'</span><br/>';
?>
<br>
 Matiere      :       <select name="codemat" class="control-select"> 
<?php while($c=($matiere)->fetch_array()){
echo '<option value="'.$c['codemat'].'">'.$c['nommat'].'</option>';
}?></select>
<input type="hidden" name="nomclasse" value="<?php echo $nomcl; ?>">
<input type="hidden" name="promo" value="<?php echo $promo; ?>">
<input type="hidden" name="semestre" value="<?php echo $semestre; ?>" ><br>
<input type="submit" value="Afficher les notes finals" class="btn-modi" style="width: 100%;"><br>
</form>
</div>

<?php
}
else if(isset($_POST['codemat'])){//apres avoir choisis la matiere on affiche les notes
$nomcl=$_POST['nomclasse'];//GI
$semestre=$_POST['semestre'];//4
$promo=$_POST['promo'];//2009
$codemat=$_POST['codemat'];//5
/*		selectionner tout les devoir pour la classe choisis dans le semestre choisis			*/
$dev1=mysqli_query($conn,"select nomel,prenomel,nom,promotion,nommat,numsem,notefinal from eleve,classe,matiere,bulletin where eleve.numel=bulletin.numel and classe.codecl=eleve.codecl and matiere.codemat=bulletin.codemat and matiere.codemat='$codemat' and numsem='$semestre' and eleve.numel in (select numel from eleve where codecl=(select codecl from classe where nom='$nomcl' and promotion='$promo'))");
?><center>
<table id="rounded-corner">
<thead><tr><th class="rounded-company">Nom</th>
<th class="rounded-q1">Prenom</th>
<th class="rounded-q3">classe</th>
<th class="rounded-q3">Promotion</th>
<th class="rounded-q3">Matiere</th>
<th class="rounded-q3">Semestre</th>
<th class="rounded-q4">Note Final</th></tr></thead>
<tfoot>
<tr><td colspan="6" class="rounded-foot-left"><em>&nbsp;</em></td>
<td class="rounded-foot-right">&nbsp;</td></tr>
</tfoot>
 <tbody>
 <?php
   while($a=($dev1)->fetch_array()){
    echo '<tr><td>'.$a['nomel'].'</td><td>'.$a['prenomel'].'</td><td >'.$a['nom'].'</td><td >'.$a['promotion'].'</td><td>'.$a['nommat'].'</td><td>'.$a['numsem'].'</td><td>'.$a['notefinal'].'</td></tr>';
   }
   ?>

 </tbody>
</table></center>
<br/><br/><a href="afficher_bulettin.php">Revenir à la page precedente !</a>
<?php
}
else {
$retour=mysqli_query($conn,"select distinct nom from classe"); // afficher les classes
?>

<div class="corpy">

    <h1 align=top class="text-h1" style=" font-size: 25px;font-family: 'genshin';text-align: center; font-size: 40px;">Voir bulettin<h1> 
        <form method="post" action="afficher_bulettin.php" class="formulaire">
            <div>
                <label for="">Classe :</label><br> 
                <select name="nomcl" class="control-select"> 
                    <?php while($a=($retour)->fetch_array()){
                        echo '<option value="'.$a['nom'].'">'.$a['nom'].'</option>';
                    }?>
                </select>
            </div>
            <div>
                <label for="">Promotion :</label><br>
                <select name="promotion" class="control-select"> 
                    <?php while($a=($data)->fetch_array()){
                        echo '<option value="'.$a['promotion'].'">'.$a['promotion'].'</option>';
                    }?></select>
            </div>
            <div>
                <label for="">Semestre :</label><br>
                <select name="radiosem" class="control-select"><?php for($i=1;$i<=4;$i++){ echo '<option value="'.$i.'">Semestre'.$i.'</option>'; } ?>
                </select>
            </div>
            <div>
                <input type="hidden">
            </div>
        <input type="submit" value="Afficher les matieres" class="btn-modif">
        </form>
</div>
</section>

</form>
<?php } 
include "footer.php";?>
