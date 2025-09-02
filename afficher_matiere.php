<?php
session_start();
include('cadre.php');
require_once("config.php");
?>


<?php
// var_dump($_GET["nomcl"]);

if(isset($_GET['nomcl'])){
$_SESSION['nomcl']=$_GET['nomcl'];
$nomcl=$_GET['nomcl'];
$data=mysqli_query($conn,"select promotion from classe where nom='$nomcl' order by promotion desc");
?>

<section class="fond">
<div class="retour">
        <a href="index.php" class="prev"><i class="fa fa-arrow-left"></i>retour</a>
    </div>
   <div class="corpy">
      
      <p class="text-h1" style="margin-bottom: 1rem;">Veuillez choisir la promotion et le semestre pour <?php echo $nomcl; ?></p>
      <form method="post" action="afficher_matiere.php" class="formulaire">
         
         <div>
            Promotion      :      <select name="promotion" class="control-select"> 
               <?php while($a=($data)->fetch_array()){
                  echo '<option value="'.$a['promotion'].'">'.$a['promotion'].'</option>';
               }?></select><br/><br/>
      </div>
      <br>
      <div>
         Semestre         :      <select name="radiosem" class="control-select"><?php for($i=1;$i<=4;$i++){ echo '<option value="'.$i.'">Semestre'.$i.'</option>'; } ?>
      </select><br/><br/>
   </div>
   <br>
   
   <input type="submit" value="Afficher les matieres" class="btn-modif">
</form>
</div>
</section>

<?php }  ?>
<?php
if(isset($_POST['radiosem'])){
$nomcl=$_SESSION['nomcl'];
$semestre=$_POST['radiosem'];
$promo=$_POST['promotion'];
$donnee=mysqli_query($conn,"select matiere.codemat,nommat,classe.nom,numsem,prof.nom as nomprof from matiere,enseignement,classe,prof where matiere.codemat=enseignement.codemat and prof.numprof=enseignement.numprof and enseignement.codecl=classe.codecl and classe.nom='$nomcl' and enseignement.numsem='$semestre' and promotion='$promo'");
?>

<section class="fond">
   <div class="retour">
      <a href="afficher_matiere.php?nomcl=<?= urlencode($_SESSION['nomcl']) ?>" class="prev"><i class="fa fa-arrow-left"></i>retour</a>
   </div>
   <center>
   <p class="text-h1">Liste des matiere <?php echo $_SESSION["nomcl"];?></p>
   <table id="rounded-corner"><thead>
   <tr>
      <th class="<?php echo rond(); ?>">Matière</th>
      <th class="rounded-q2">Classe</th>
      <th class="rounded-q2">Nom prof</th>
      <th class="rounded-q2">Semestre</th>
      <?php echo Edition(); ?>
   </tr></thead>
<tfoot>
<tr>
<td colspan="<?php echo colspan(3,5); ?>" class="rounded-foot-left"><em>&nbsp;</em></td>
<td class="rounded-foot-right">&nbsp;</td>
</tr>
</tfoot>
<tbody>
   <?php
   while($a=($donnee)->fetch_array()){
      if(isset($_SESSION['admin'])){ 
         echo '<tr><td>'.$a['nommat'].'</td><td >'.$a['nom'].'</strong></td><td>'.$a['nomprof'].'</td><td>S'.$a['numsem'].'</td>
         ';
         echo '<td><a href="modif_matiere.php?modif_matiere='.$a['codemat'].'"><i class="fa fa-edit" style="font-size:15px;"></</a></td><td><a href="modif_matiere.php?supp_matiere='.$a['codemat'].'" onclick="return(confirm(\'Etes-vous sur de vouloir supprimer cette entrée?\'));"><i class="fa fa-trash" ></i></a></td></tr>'; 
      } 
   }
   ?>

</tbody>
</table></center>
</section>

<?php 
} 
include "footer.php";
?>
