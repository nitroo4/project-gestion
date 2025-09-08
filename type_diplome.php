<?php
session_start();
$title="Type de diplôme";
include('cadre.php');
?>

<?php
$donnee=mysqli_query($conn,"select * from diplome");
?>
<div class="fond">
    <div class="retour">
        <a class="prev" href="index.php"><i class="fa fa-arrow-left"></i>retour</a>
    </div>
    <h1 align=top class="text-h1" style=" font-size: 25px;font-family: 'genshin';text-align: center; font-size: 40px; margin-bottom: 1.2rem;">List des diplome<h1> 
    <center><table id="rounded-corner">
        <thead><tr><?php if(isset($_SESSION['admin']))?> 
        <th class="rounded-company" >Titre du diplôme</th> 
        <?php echo '<th class="rounded-q4">Edition</th>'; ?>
    </tr></thead>
    <tfoot>
        <tr>
            <td colspan="<?php echo colspan(0,2); ?>" class="rounded-foot-left"><em>&nbsp;</em></td>
        </tr>
    </tfoot>
    <tbody>
        <?php
while($a=($donnee)->fetch_array()){
    if(isset($_SESSION['admin'])){
        echo '<td>'.$a['titre_dip'].'</td>'; 
        echo '<td><a class="sup" href="type_diplome.php?supp_type='.$a['numdip'].'" onclick="return(confirm(\'Etes-vous sur de vouloir supprimer cette entrée?\'));" >Supprimer</td></tr>'; } 
    }
    ?>
</tbody>
</table></center>
</div>
<?php
if(isset($_GET['supp_type'])){ 
$id=$_GET['supp_type'];
mysqli_query($conn, "delete from diplome where numdip='$id'"); }

include "footer.php";
?>
