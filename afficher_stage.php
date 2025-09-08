<?php
session_start();
$title="Affichage des stages";
include('cadre.php');
require_once("config.php");
$data=mysqli_query($conn, "select distinct promotion from classe order by promotion desc");
$retour=mysqli_query($conn,"select distinct nom from classe"); //pour afficher les classe existantes
?>

<?php
if(isset($_POST['nomcl']) and isset($_POST['promotion'])){
$nomcl=$_POST['nomcl'];
$promo=$_POST['promotion'];
$donnee=mysqli_query($conn,"select numstage,nomel,prenomel,nom,promotion,date_debut,date_fin,lieu_stage from eleve,stage,classe where classe.codecl=eleve.codecl and eleve.numel=stage.numel and classe.nom='$nomcl' and promotion='$promo'");//select nommat from matiere,classe where matiere.codecl=classe.codecl and classe.nom='$classe'
?>
<section class="fond">
   <div class="retour">
        <a href="index.php" class="prev"><i class="fa fa-arrow-left"></i>retour</a>
    </div>
    <center>
    <table id="rounded-corner">
        <thead><tr>
            <th class="<?php echo rond();?>">Nom de l'etudiant</th>
            <th class="rounded-q2">Prenom</th>
            <th class="rounded-q2">Classe</th>
            <th class="rounded-q2">Promotion</th>
            <th class="rounded-q2">date de debut</th>
            <th class="rounded-q2">date de fin</th>
            <th class="rounded-q2">lieu_stage</th>
        <?php echo Edition(); ?>
    </tr></thead>
    <tfoot>
    <tr>
    <td colspan="<?php echo colspan(6,8); ?>" class="rounded-foot-left"><em>&nbsp;</em></td>
    <td class="rounded-foot-right">&nbsp;</td>
    </tr>
    </tfoot>
    <tbody>
        <?php
    while($a=$donnee->fetch_array()){
        if(isset($_SESSION['admin'])){
            
            echo '<td>'.$a['nomel'].'</td><td>'.$a['prenomel'].'</td><td>'.$a['nom'].'</td><td>'.$a['promotion'].'</td><td>'.$a['date_debut'].'</td><td>'.$a['date_fin'].'</td><td>'.$a['lieu_stage'].'</td>'; 
            echo '<td><a href="ajout_stage.php?modif_stage='.$a['numstage'].'" ><i class="fa fa-edit" style="font-size:15px;"></i></a></td>
            <td><a href="supp_stage.php?supp_stage='.$a['numstage'].'" onclick="return(confirm(\'Etes-vous sur de vouloir supprimer cette entrée?\'));"><i class="fa fa-trash" ></i>    </td></tr>'; }
        }
        ?>
    </tbody>
    </table>

    </center>
</section>
<?php
}
else{ ?>

<section class="fond">
    <div class="retour">
        <a href="index.php" class="prev"><i class="fa fa-arrow-left"></i>retour</a>
    </div>
    <div class="corpy">

        <h1 align=top class="text-h1" style=" font-size: 25px;font-family: 'genshin';text-align: center; font-size: 40px;">Veuillez choisir la classe et la promotion <h1> 
        <form method="post" action="afficher_stage.php" class="formulaire">
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
                    <?php while($a=($retour)->fetch_array()){
                        echo '<option value="'.$a['nom'].'">'.$a['nom'].'</option>';
                    }?>
                </select>
            </div>
            <input type="submit" value="Afficher les stages" class="btn-modif">
        </form>
    </div>
</section>
<?php }

include "footer.php";
?>
