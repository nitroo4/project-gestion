<?php
session_start();
$title="Affichage des devoirs";
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
$donnee=mysqli_query($conn,"select nommat from matiere,enseignement,classe where matiere.codemat=enseignement.codemat and enseignement.codecl=classe.codecl and classe.nom='$nomcl' and promotion='$promo' and enseignement.numsem='$semestre'");//select nommat from matiere,classe where matiere.codecl=classe.codecl and classe.nom='$classe'
$_SESSION['classe']=$nomcl;
?>
<div class="fond">
<div class="retour">
        <a href="index.php" class="prev"><i class="fa fa-arrow-left"></i>retour</a>
    </div>
   <form method="post" action="afficher_devoir.php" class="formulair">
      
      <p class="p-text">Les matières étudiées par la classe choisis : </p> 
      <div class="scrollbar" >

         <?php
         while($a=($donnee)->fetch_array()){
            echo '<input type="radio" name="radio" value="'.$a['nommat'].'" id="choix1" /><label for="choix1">'.$a['nommat'].'</label><br/>';
           
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
$nomcl=$_SESSION['classe'];
$promo=$_SESSION['promo'];
$donnee=mysqli_query($conn,"select numdev,date_dev,nommat,nom,coeficient,numsem,n_devoir from devoir,matiere,classe where matiere.codemat=devoir.codemat and classe.codecl=devoir.codecl and classe.nom='$nomcl' and devoir.numsem='$semestre' and matiere.nommat='$nommat' and promotion='$promo'");
?>
<div class="fond">
<div class="retour">
        <a href="afficher_devoir.php" class="prev"><i class="fa fa-arrow-left"></i>retour</a>
    </div>
   <center><table id="rounded-corner">
      <thead><tr>
         <th class="<?php echo rond(); ?>">Matière</th><th class="rounded-q2">Date_devoir</th><th class="rounded-q2">Classe</th><th class="rounded-q2">Coefficient</th><th class="rounded-q2">Semestre</th>
         <th class="rounded-q2">1er/2eme devoir</th>
         <?php echo Edition(); ?>
      </tr></thead>
      <tbody>
      <?php
while($a=($donnee)->fetch_array()){
   if(isset($_SESSION['admin'])){ 
      echo '<tr><td>'.$a['nommat'].'</td><td>'.$a['date_dev'].'</td><td>'.$a['nom'].'</td><td>'.$a['coeficient'].'</td><td>S'.$a['numsem'].'</td><td>'.$a['n_devoir'].'</td>';
      echo '<td><a href="modif_devoir.php?modif_dev='.$a['numdev'].'"><i class="fa fa-edit" style="font-size:15px;"></i></a></td><td><a href="modif_devoir.php?supp_dev='.$a['numdev'].'" onclick="return(confirm(\'Etes-vous sur de vouloir supprimer cette entrée?\ntous les enregistrements en relation avec cette entrée seront perdus\'));"><i class="fa fa-trash" ></i></td></tr>';} 
   }
   ?>
</tbody>
<tfoot>
   <tr>
      <td colspan="<?php echo colspan(5,7); ?>" class="rounded-foot-left"><em>&nbsp;</em></td>
      <td class="rounded-foot-right">&nbsp;</td>
   </tr>
</tfoot>
</table>
</div>
</center>
<?php
}//fin   if(isset($_POST['radio']
else {
   $retour=mysqli_query($conn,"select distinct nom from classe"); // afficher les classes
   ?>
<section class="fond">
   <div class="retour">
        <a href="afficher_devoir.php" class="prev"><i class="fa fa-arrow-left"></i>retour</a>
    </div>
   <div class="corpy">
        <h1 align=top class="text-h1" style=" font-size: 25px;font-family: 'genshin';text-align: center; font-size: 40px;">Afficher devoir<h1>
        <form method="post" action="afficher_devoir.php" class="formulaire">
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
            <input type="submit" value="suivant" class="btn-modif">
        </form>
    </div>
   </section>
   <?php } 
   ?>
</div>
   <?php 
   include 'footer.php';
   ?>
