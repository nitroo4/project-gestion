<?php
session_start();
include('cadre.php');
?>

<?php
if(isset($_POST['nomcl']) and isset($_POST['radiosem'])){
$_SESSION['semestre']=$_POST['radiosem'];
$nomcl=$_POST['nomcl'];
$semestre=$_SESSION['semestre'];
$promo=$_POST['promotion'];
$_SESSION['promo']=$_POST['promotion'];
$donnee=mysqli_query($conn,"select nommat from matiere,enseignement,classe where matiere.codemat=enseignement.codemat and enseignement.codecl=classe.codecl and classe.nom='$nomcl' and promotion='$promo' ");//select nommat from matiere,classe where matiere.codecl=classe.codecl and classe.nom='$classe'
$_SESSION['classe']=$nomcl;
?>
<form method="post" action="ajout_eval.php" class="formulair">
<p class="p-text">Veuillez choisir la matiere : </p>
<div style="line-height: 1.5rem; font-size: 1.2rem; font-family: 'genshin';">
   <?php
   $i=6;
   // var_dump($nomcl);
   while($a=($donnee)->fetch_array()){
      echo '
               <input type="radio" name="radio" value="'.$a['nommat'].'" id="choix'.$i.'" /> 
               <label for="choix'.$i.'">'.$a['nommat'].'</label>
       <br>';
      $i++;
   }
   ?>
</div>
<input type="submit" value="Afficher les devoirs">
</form>
<?php

}
else if(isset($_POST['radio'])){
   // var_dump($_POST['radio']);
$semestre=$_SESSION['semestre'];
$nommat=$_POST['radio'];
$_SESSION['radio_matiere']=$nommat;
$nomcl=$_SESSION['classe'];
$promo=$_SESSION['promo'];
$donnee=mysqli_query($conn,"select numdev,date_dev,nommat,nom,coeficient,numsem,n_devoir from devoir,matiere,classe where matiere.codemat=devoir.codemat and classe.codecl=devoir.codecl and classe.nom='$nomcl' and devoir.numsem='$semestre' and matiere.nommat='$nommat' and promotion='$promo'");
?>
<select class="fond">
   <div class="retour">
      <a class="prev" href="ajout_eval.php"><i class="fa fa-arrow-left"></i>retour</a>
   </div>
   <center><table id="rounded-corner">
      <thead><tr><th scope="col" class="rounded-company">Evaluation</th><th scope="col" class="rounded-q1">Matière</th><th scope="col" class="rounded-q2">Date devoir</th><th scope="col" class="rounded-q3">Classe</th><th scope="col" class="rounded-q3">Coefficient</th><th scope="col" class="rounded-q3">Semestre</th><th scope="col" class="rounded-q4">1er/2eme devoir</th></tr></thead>
      <tfoot>
         <tr>
            <td colspan="6" class="rounded-foot-left"><em>&nbsp;</em></td>
            <td class="rounded-foot-right">&nbsp;</td>
         </tr>
      </tfoot>
      <tbody>
         <?php
while($a=($donnee)->fetch_array()){
   echo '<td><a href="ajout_eval.php?ajout_eval='.$a['numdev'].'" class="eval"><i class="fa fa-plus"></i> Ajouter evaluation</a></td><td>'.$a['nommat'].'</td><td>'.$a['date_dev'].'</td><td>'.$a['nom'].'</td><td>'.$a['coeficient'].'</td><td>S'.$a['numsem'].'</td><td>'.$a['n_devoir'].'</td></tr>';
}
?>
 </tbody>
</table>
</center>
</select>
<?php
}//fin   if(isset($_POST['radio']
else if(isset($_POST['numel'])){ // l'insertion, on recupere le numel et la note avec les autres session et on insert
$numel=$_POST['numel'];
$numdev=$_POST['numdev'];
$nomcl=$_SESSION['classe'];
$promo=$_SESSION['promo'];
$note=str_replace(",",".",$_POST['note']);//replacer les , par . car c double
/*$codecl=mysql_fetch_array(mysql_query("select codecl from classe where nom='$nomcl' and promotion='$promo'"));
$codecl=$codecl['codecl'];*/
$compte=(mysqli_query($conn,"select count(*) as nb from evaluation where numdev='$numdev' and numel='$numel'"))->fetch_array();//pour ne pas repeter le meme enregistrement
if($compte['nb']<0){
?>
<SCRIPT LANGUAGE="Javascript">
alert("erreur d\'insertion, l\'enregistrement existe deja !");
window.location.href = "ajout_eval.php";
</SCRIPT>
<?php
}
else{
mysqli_query($conn,"insert into evaluation(numdev,numel,note) values('$numdev','$numel','$note')");
?>
<SCRIPT LANGUAGE="Javascript">
alert("Ajout avec succés!");
window.location.href = "ajout_eval.php";
</SCRIPT>
<?php
}
}
else if(isset($_GET['ajout_eval'])){// si on a cliquer sur voir l'evaluation d'un devoir
$semestre=$_SESSION['semestre'];
$nommat=$_SESSION['radio_matiere'];
$nomcl=$_SESSION['classe'];
$promo=$_SESSION['promo'];
$numdev=$_GET['ajout_eval'];
$donnee=(mysqli_query($conn,"select date_dev,coeficient,n_devoir from devoir where numdev='$numdev'"))->fetch_array();//  pour afficher les information du devoir k'il a choisis pour ajouter un devoir
$data=mysqli_query($conn,"select numel,nomel,prenomel from eleve where codecl=(select codecl from classe where nom='$nomcl' and promotion='$promo')");//pour afficher les etudiants
?>
<div class="fond">
   <div class="retour">
      <a class="prev" href="ajout_eval.php"><i class="fa fa-arrow-left"></i>retour</a>
   </div>
   <form method="POST" action="ajout_eval.php" class="formulair" style="line-height: 1.5rem;">
      <center>
         <p class="p-text shadow">NOTE EVALUATION</p>
      </center>
      Filière                 :          <?php echo $nomcl.' - '.$promo; ?><br/>
      Matière                :           <?php echo $nommat; ?><br/>
      Semestre               :           <?php echo $semestre; ?><br/>
      Date devoir           :           <?php echo $donnee['date_dev']; ?><br/>
      Coefficient            :          <?php echo $donnee['coeficient']; ?><br/>
      Etudiant               :        <select name="numel" class="control-select" style="margin-bottom: .3rem;"> 
         <?php while($a=($data)->fetch_array()){
            echo '<option value="'.$a['numel'].'">'.$a['nomel'].' '.$a['prenomel'].'</option>';
         }?></select><br/>
      Devoir N              :           <?php echo $donnee['n_devoir']; ?><br/>
      Note                       :         <input type="text" name="note" class="btn-modife" placeholder="Entrez la note" required><br/><br/>
      <input type="hidden" name="numdev" value="<?php echo $numdev; ?>" class="">
      <input type="submit" value="ajouter" class="btn-modi" style="width: 100%; margin-top: -1rem;">
      </form>
</div>

<?php }
else {
$data=mysqli_query($conn,"select distinct promotion from classe order by promotion desc");
$retour=mysqli_query($conn,"select distinct nom from classe"); ?>
<section class="fond">
   <div class="retour">
        <a href="index.php" class="prev"><i class="fa fa-arrow-left"></i>retour</a>
    </div>
    <div class="corpy">
        <h1 align=top class="text-h1" style=" font-size: 25px;font-family: 'genshin';text-align: center; font-size: 40px;">Ajouter un évaluation<h1>
        <form method="post" action="ajout_eval.php" class="formulaire">
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
            <div>
                <label for="">Semestre : </label>
                <select name="radiosem" class="control-select"><?php for($i=1;$i<=4;$i++){ echo '<option value="'.$i.'">Semestre'.$i.'</option>'; } ?>
                </select>
            </div>
            <input type="submit" value="Valider le conseil" class="btn-modif">
        </form>
    </div>
</section>
<?php } 

    include "footer.php";
?>

