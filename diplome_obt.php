<?php
session_start();
include('cadre.php');
require_once("config.php");
?>

<?php
if(isset($_POST['nomcl']) and isset($_POST['promotion'])){
$nomcl=$_POST['nomcl'];
$promo=$_POST['promotion'];
$donnee=mysqli_query($conn,"select id,titre_dip,nomel,prenomel,nom,promotion,note,commentaire,etablissement,lieu,annee_obtention from eleve,eleve_diplome,classe,diplome where diplome.numdip=eleve_diplome.numdip and classe.codecl=eleve.codecl and eleve.numel=eleve_diplome.numel and classe.nom='$nomcl' and promotion='$promo'");//select nommat from matiere,classe where matiere.codecl=classe.codecl and classe.nom='$classe'
?>
<div class="fond">

    <div class="retour">
        <a class="prev" href="diplome_obt.php"><i class="fa fa-arrow-left"></i>retour</a>
    </div>
    <p class="p-text" style="text-align: center;">List des diplomes en <?php echo $nomcl ?></p>
    <center><table id="rounded-corner">
        <thead><tr>
            <th class="<?php echo rond(); ?>">Nom</th>
            <th class="rounded-q2">Prenom</th>
            <th class="rounded-q2">Classe</th>
            <th class="rounded-q2">Promo</th>
            <th class="rounded-q2">Titre_dip</th>
            <th class="rounded-q2">Note</th>
            <th class="rounded-q2">Commentaire</th>
            <th class="rounded-q2">Etablissement</th>
            <th class="rounded-q2">Lieu</th>
            <th class="rounded-q2">Année_obtention</th>
            <?php echo Edition(); ?>
        </tr></thead>
        <tfoot>
            <tr>
                <td colspan="<?php echo colspan(9,11); ?>" class="rounded-foot-left"><em>&nbsp;</em></td>
                <td class="rounded-foot-right">&nbsp;</td>
            </tr>
        </tfoot>
        <tbody>
            <?php
while($a=($donnee)->fetch_array()){
    if(isset($_SESSION['admin'])){
        echo '<td>'.$a['nomel'].'</td><td>'.$a['prenomel'].'</td><td>'.$a['nom'].'</td><td>'.$a['promotion'].'</td><td>'.$a['titre_dip'].'</td><td>'.$a['note'].'</td><td>'.$a['commentaire'].'</td><td>'.$a['etablissement'].'</td><td>'.$a['lieu'].'</td><td>'.$a['annee_obtention'].'</td>'; //style="width:100px; height:22px; background-image: url(\'ajouter.png\'); color:red;  padding: 2px 0 2px 20px; display:block; background-repeat:no-repeat;"
        echo '<td><a href="modif_diplome.php?modif_dip='.$a['id'].'" ><i class="fa fa-edit" style="font-size:15px;"></i></a></td><td><a href="modif_diplome.php?supp_dip='.$a['id'].'" onclick="return(confirm(\'Etes-vous sur de vouloir supprimer cette entrée?\'));"><i class="fa fa-trash" ></i></td></tr>'; }
    }
    ?>
</tbody>
</table></center>
</div>
<?php
}//fin   if(isset($_POST['radio']
else{ 
$data=mysqli_query($conn,"select distinct promotion from classe order by promotion desc");
$retour=mysqli_query($conn,"select distinct nom from classe");
?>
<section class="fond">
    <div class="retour" >
        <a href="index.php" class="prev"><i class="fa fa-arrow-left"></i>retour</a>
    </div>
    <div class="corpy">

        <h1 align=top class="text-h1" style=" font-size: 25px;font-family: 'genshin';text-align: center; font-size: 40px;">Voir diplome<h1> 
        <form method="post" action="diplome_obt.php" class="formulaire">
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
            <input type="submit" value="Afficher les diplomes" class="btn-modif">
        </form>
    </div>
</section>
<?php }
include "footer.php";
?>
