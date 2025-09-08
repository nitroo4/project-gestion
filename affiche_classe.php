<?php
session_start();
require_once("config.php");
$title="Affichage des classes";
include('cadre.php');
?>
<div class="fond">

<div class="retour" >
    <a href="index.php" class="prev"><i class="fa fa-arrow-left"></i>retour</a>
</div>
<center>
<?php
$data=mysqli_query($conn,"select codecl,classe.nom as nomcl,promotion,prof.nom as nomprof from classe,prof where classe.numprofcoord=prof.numprof");
?>
<table id="rounded-corner" style="background-color: red; " >
<thead class="radius"><tr>
    <th class="<?php echo rond(); ?>">Nom de la classe</th>
    <th class="rounded-q1">Promotion</th>
    <th class="rounded-q2">Prof coordinataire</th>
    <?php echo Edition();?>
</tr></thead>
<tfoot>
<tr>
<td colspan="<?php echo colspan(2,4); ?>" class="rounded-foot-left"><em>&nbsp;</em></td>
<td class="rounded-foot-right">&nbsp;</td>
</tr>
</tfoot>
 <tbody>
<?php
while($a=$data->fetch_array()){
?>
<tr>
  <?php if(isset($_SESSION['admin'])){ 
  echo '<td>'.$a['nomcl'].'</td><td>'.$a['promotion'].'</td><td>'.$a['nomprof'].'</td>';
  ?><td><a href="modif_classe.php?modif_classe=<?php echo $a['codecl']; ?>"><i class="fa fa-edit" style="font-size:15px;"></i></a></td><td><a href="modif_classe.php?supp_classe=<?php echo $a['codecl']; ?>" onclick="return(confirm('Etes-vous sur de vouloir supprimer cette entrée?\ntous les enregistrements en relation avec cette entrée seront perdus'));"><i class="fa fa-trash" ></i></a></td><?php }
  
echo '</tr>';
?>
  <?php  if (isset($_SESSION['prof']) or isset($_SESSION['etudiant'])) {
  echo '<td>'.$a['nomcl'].'</td><td>'.$a['promotion'].'</td><td>'.$a['nomprof'].'</td>';
  ?><?php 
  
  }
  echo '</tr>';}
?>

<tbody>
</table>
</center>
</div>
<?php 
    include("footer.php");
?>