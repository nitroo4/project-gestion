<?php
session_start();
$title="Affichage des evaluations";
include('cadre.php');

$data=mysqli_query($conn,"select distinct promotion from classe order by promotion desc");
?>
<?php
if(isset($_POST['nomcl']) and isset($_POST['radiosem'])){
$_SESSION['semestre']=$_POST['radiosem'];
$nomcl=$_POST['nomcl'];
$semestre=$_SESSION['semestre'];
$promo=$_POST['promotion'];
$_SESSION['promo']=$_POST['promotion'];
$donnee=mysqli_query($conn,"select nommat from matiere,enseignement,classe where matiere.codemat=enseignement.codemat and enseignement.codecl=classe.codecl and classe.nom='$nomcl' and promotion='$promo' and enseignement.numsem='$semestre'");
// $devoir = mysqli_query($conn,"select nommat from matiere,classe where matiere.codecl=classe.codecl and classe.nom='$nomcl'");
$_SESSION['classe']=$nomcl;
?>
<div class="fond">
<div class="retour">
        <a href="afficher_evaluation.php" class="prev"><i class="fa fa-arrow-left"></i>retour</a>
    </div>
  <form method="post" action="afficher_evaluation.php" class="formulair">
    <p class="p-text">Les matières correspondantes : </p> 
    <div style="line-height: 1.5rem; font-size: 1rem; font-family: 'genshin';">
      <?php
   $i=6;
   while($a=($donnee)->fetch_array()){
     echo '<input type="radio" name="radio" value="'.$a['nommat'].'" id="choix'.$i.'" /> <label for="choix'.$i.'" style="font-size:17px;">'.$a['nommat'].'</label><br/>';
     $i++;
    }
    ?>
    </div>
    <input type="submit" value="Afficher les devoirs" class="btn-modi" style="width: 100%;">
  </form>
</div>

<?php
}
else if(isset($_POST['radio'])){
$semestre=$_SESSION['semestre'];
$nommat=$_POST['radio'];
$_SESSION['radio_matiere']=$nommat;
$nomcl=$_SESSION['classe'];
$promo=$_SESSION['promo'];
$donnee=mysqli_query($conn,"select numdev,date_dev,nommat,nom,coeficient,numsem,n_devoir from devoir,matiere,classe where matiere.codemat=devoir.codemat and classe.codecl=devoir.codecl and classe.nom='$nomcl' and devoir.numsem='$semestre' and matiere.nommat='$nommat' and promotion='$promo'");
?>
<div class="fond">

  <center><h2>Veuilliez choisir le devoir pour lequel vous voulez voir l'evalution</h2><br/><br/>
  <table id="rounded-corner">
    <thead><tr><th scope="col" class="rounded-company">Evaluation</th><th scope="col" class="rounded-q1">Matière</th><th scope="col" class="rounded-q2">Date_devoir</th><th scope="col" class="rounded-q3">Classe</th><th scope="col" class="rounded-q3">Coefficient</th><th scope="col" class="rounded-q3">Semestre</th><th scope="col" class="rounded-q4">1er/2eme devoir</th></tr></thead>
    <tfoot>
      <tr>
        <td colspan="6" class="rounded-foot-left"><em>&nbsp;</em></td>
        <td class="rounded-foot-right">&nbsp;</td>
      </tr>
    </tfoot>
    <tbody>
   </div>
   
<?php
while($a=($donnee)->fetch_array()){
echo '<td><a href="afficher_evaluation.php?affich_eval='.$a['numdev'].'" class="eval"><i class="fa fa-eye "></i> Voir l\'evaluation</a></td><td>'.$a['nommat'].'</td><td>'.$a['date_dev'].'</td><td>'.$a['nom'].'</td><td>'.$a['coeficient'].'</td><td>S'.$a['numsem'].'</td><td>'.$a['n_devoir'].'</td></tr>';
}
?>
 </tbody>
</table>
</center>
<?php
}//fin   if(isset($_POST['radio']
else if(isset($_GET['affich_eval'])){// si on a cliquer sur voir l'evaluation d'un devoir
$semestre=$_SESSION['semestre'];
$nommat=$_SESSION['radio_matiere'];
$nomcl=$_SESSION['classe'];
$promo=$_SESSION['promo'];
$numdev=$_GET['affich_eval'];
$donnee=mysqli_query($conn,"select numeval,date_dev,nommat,nom,nomel,prenomel,note,coeficient,numsem,promotion,n_devoir from devoir,matiere,classe,eleve,evaluation where evaluation.numdev=devoir.numdev and eleve.numel=evaluation.numel and matiere.codemat=devoir.codemat and classe.codecl=devoir.codecl and devoir.numdev='$numdev'");//  and matiere.nommat='$nommat'      and devoir.numsem='$semestre'
?>
<div class="fond">
  <div class="retour">
    <a class="prev" href="afficher_evaluation.php"><i class="fa fa-arrow-left"></i>retour</a>
  </div>
  <p class="p-text" style="text-align: center;">affichage des evauation</p>
  <center><table id="rounded-corner" >
    <thead>
      <th class="<?php echo rond(); ?>">Nom</th>
      <th>Prenom</th>
      <th>classe</th>
      <th>Promotion</th>
      <th>Matiere</th>
      <th>Date devoir</th>
      <th>Coefficient</th>
      <th>Semestre</th>
      <th >N de devoir</th>
      <th class="rounded-q2">Note</th>
      <?php echo Edition();?>
    </thead>
    <tfoot>
      <tr>
        <td colspan="<?php echo colspan2(9,11); ?>" class="rounded-foot-left"><em>&nbsp;</em></td>
        <td class="rounded-foot-right">&nbsp;</td>
      </tr>
    </tfoot>
    <tbody>
      <?php
while($a=($donnee)->fetch_array()){
  ?> <tr> <?php
  if(isset($_SESSION['admin']) or isset($_SESSION['prof'])){ 
    echo '<td>'.$a['nomel'].'</td><td>'.$a['prenomel'].'</td><td>'.$a['nom'].'</td><td>'.$a['promotion'].'</td><td>'.$a['nommat'].'</td><td>'.$a['date_dev'].'</td><td>'.$a['coeficient'].'</td><td>S'.$a['numsem'].'</td><td>'.$a['n_devoir'].'</td><td>'.$a['note'].'</td>';
    echo '<td><a href="modif_eval.php?modif_eval='.$a['numeval'].'"><i class="fa fa-edit" style="font-size:15px;"></i></a></td><td><a href="modif_eval.php?supp_eval='.$a['numeval'].'" onclick="return(confirm(\'Etes-vous sur de vouloir supprimer cette entrée?\'));"><i class="fa fa-trash" ></i></a></td> </tr>';}
  }
  ?>
</tbody>
</table>
</div>
<?php }
else {
$retour=mysqli_query($conn,"select distinct nom from classe");
?>
<section class="fond">
  <div class="retour">
        <a href="index.php" class="prev"><i class="fa fa-arrow-left"></i>retour</a>
    </div>
<div class="corpy">

    <h1 align=top class="text-h1" style=" font-size: 25px;font-family: 'genshin';text-align: center; font-size: 40px;">Voir evaluation<h1> 
        <form method="post" action="afficher_evaluation.php" class="formulaire">
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
<?php } 
 include "footer.php";
 ?>
