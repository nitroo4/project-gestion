<?php
session_start();
include('cadre.php');
require_once("config.php");
$data=mysqli_query($conn,"select distinct promotion from classe order by promotion desc");
?>

<?php
if(isset($_POST['nomcl']) and isset($_POST['radiosem'])){
	$nomcl=$_POST['nomcl'];
	$semestre=$_POST['radiosem'];
	$promo=$_POST['promotion'];
	$donnee=mysqli_query($conn,"select enseignement.id,classe.nom as nomcl,nommat,prof.nom,numsem,promotion from enseignement,classe,matiere,prof where matiere.codemat=enseignement.codemat and enseignement.codecl=classe.codecl and prof.numprof=enseignement.numprof and classe.nom='$nomcl' and promotion='$promo' and enseignement.numsem='$semestre'");
	?>
	<div class="fond">
    <div class="retour">
        <a href="index.php" class="prev"><i class="fa fa-arrow-left"></i>retour</a>
    </div>
		<center><table id="rounded-corner">
			<thead><tr>
				<th class="<?php echo rond(); ?>">Classe</th>
				<th class="rounded-q1">Promotion</th>
				<th class="rounded-q1">Matière</th><th class="rounded-q1">Professeur</th><th class="rounded-q2">Semestre</th>
				<?php echo Edition();?>
			</tr></thead>
			<tfoot>
				<tr>
					<td colspan="<?php echo colspan(4,6); ?>" class="rounded-foot-left"><em>&nbsp;</em></td>
					<td class="rounded-foot-right">&nbsp;</td>
				</tr>
			</tfoot>
			<tbody>
				<?php
		while($a=($donnee)->fetch_array()){
			if(isset($_SESSION['admin'])){
				echo '<td>'.$a['nomcl'].'</td><td>'.$a['promotion'].'</td><td>'.$a['nommat'].'</td><td>'.$a['nom'].'</td><td>S'.$a['numsem'].'</td>';
				echo '<td><a href="modif_enseign.php?modif_ensein='.$a['id'].'" ><i class="fa fa-edit" style="font-size:15px;"></i></a></td><td><a href="modif_enseign.php?supp_ensein='.$a['id'].'" onclick="return(confirm(\'Etes-vous sur de vouloir supprimer cette entrée?\ntous les enregistrements en relation avec cette entrée seront perdus\'));"><i class="fa fa-trash" ></i></td> </tr>';}
			}
			?>
	<tbody>
	</table>
	</div>
	
	<?php
}
else {
$retour=mysqli_query($conn,"select distinct nom from classe");
?>

<section class="fond">
	<div class="retour">
		<a class="prev" href="afficher_enseign.php"><i class="fa fa-arrow-left"></i>retour</a>
	</div>
<div class="corpy">

    <h1 align=top class="text-h1" style=" font-size: 25px;font-family: 'genshin';text-align: center; font-size: 40px;">voir enseignement<h1> 
        <form method="post" action="afficher_enseign.php" class="formulaire">
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
			<br>
			<input type="submit" value="afficher" class="btn-modif">
      </form>
</div>
</section>
<?php }
    include "footer.php";
?>
