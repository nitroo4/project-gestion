<?php
session_start();
$title="Affichage des conseils de classe";
include('cadre.php');
$data=mysqli_query($conn,"select distinct promotion from classe order by promotion desc");
$retour=mysqli_query($conn,"select distinct nom from classe"); //pour afficher les classe existantes
?>
<?php
if(isset($_GET['supp_conseil'])){
$id=$_GET['supp_conseil'];
mysqli_query($conn,"delete from conseil where id='$id'");
?> <SCRIPT LANGUAGE="Javascript">	alert("Supprimé avec succés!"); window.location.href = "affiche_conseil.php"</SCRIPT> <?php
}
else if(isset($_POST['nomcl']) and isset($_POST['numsem'])){
$nomcl=$_POST['nomcl'];
$promo=$_POST['promotion'];
$numsem=$_POST['numsem'];
$donnee=mysqli_query($conn,"select * from classe,conseil where classe.codecl=conseil.codecl and classe.codecl=(select codecl from classe where nom='$nomcl' and promotion='$promo') and numsem='$numsem'");//select nommat from matiere,classe where matiere.codecl=classe.codecl and classe.nom='$classe'
?>
<section class="fond">
    <div class="retour">
        <a href="index.php" class="prev"><i class="fa fa-arrow-left"></i>retour</a>
    </div>
    <center><table id="rounded-corner">
        <thead><tr>
            <th class="<?php echo rond(); ?>">Semestre</th>
            <th class="rounded-q2">Classe</th>
            <?php if(isset($_SESSION['admin'])) echo '<th class="rounded-q4">Supprimer</th>'; ?>
        </tr></thead>
        <tfoot>
            <tr>
                <td colspan="<?php echo colspan(1,2); ?>" class="rounded-foot-left"><em>&nbsp;</em></td>
                <td class="rounded-foot-right">&nbsp;</td>
            </tr>
        </tfoot>
        <tbody>
            <?php
while($a=($donnee)->fetch_array()){
    if(isset($_SESSION['admin'])){
        echo '<td>'.$a['numsem'].'</td><td>'.$a['nom'].'</td>';
        echo '</td><td><a href="affiche_conseil.php?supp_conseil='.$a['id'].'" onclick="return(confirm(\'Etes-vous sur de vouloir supprimer cette entrée?\'));"><i class="fa fa-trash" ></i></td></tr>'; } 
    }
    ?>
</tbody>
</table></center>
</section>
<?php
}//fin   if(isset($_POST['radio']
else{ ?>
<section class="fond">
    <div class="retour">
  <a href="index.php" class="prev"><i class="fa fa-arrow-left"></i>retour</a>
</div>
<div class="corpy">

    <h1 align=top class="text-h1" style=" font-size: 25px;font-family: 'genshin';text-align: center; font-size: 40px;">Voir conseil<h1> 
        <form method="post" action="affiche_conseil.php" class="formulaire">
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
                <select name="numsem" class="control-select"><?php for($i=1;$i<=4;$i++){ echo '<option value="'.$i.'">Semestre'.$i.'</option>'; } ?>
                </select>
            </div>
            <div>
                <input type="hidden">
            </div>
        <input type="submit" value="Afficher les stages" class="btn-modif">
        </form>
</div>
</section>
<?php }
    include "footer.php";
?>
