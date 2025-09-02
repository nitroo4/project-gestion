<?php
session_start();
require_once("config.php");
include('cadre.php');
?>

<?php
if(isset($_GET['nomcl'])){//affichage de la promotion
$nomcl=$_GET['nomcl'];
$_SESSION['nomcl']=$_GET['nomcl'];//session du nomcl choisis dans le menu pour laisser la variable jusqu'a la page ou on va afficher la liste
$data=mysqli_query($conn,"SELECT promotion FROM classe WHERE nom='$nomcl' ORDER BY promotion DESC");
?>
<section class="fond">
  <div class="retour">
  <a href="index.php" class="prev"><i class="fa fa-arrow-left"></i>retour</a>
</div>
  <pre>
    <form action="listeEtudiant.php" method="POST" class="formulair">
      <p class="sous-titre">choisir la Promotion pour <br>la classe <?php echo $_GET['nomcl']; ?>: </p>
      <legend>Promotion:<legend>
        <div class="form-group">
          <select name="promotion"> 
            <?php while($a=$data->fetch_array()){
              echo '<option value="'.$a['promotion'].'">'.$a['promotion'].'</option>';
            }?></select>
          <input type="submit" value="afficher" >
        </div>
    </form>
  </pre>
    
</section>

<?php } 
if(isset($_POST['promotion'])){
$nomcl=$_SESSION['nomcl'];
$promo=$_POST['promotion'];
$donnee=mysqli_query($conn,"SELECT numel,nomel,prenomel,date_naissance,adresse,telephone,eleve.codecl,nom,promotion from eleve,classe where eleve.codecl=classe.codecl and nom='$nomcl' and promotion='$promo'");
?>
<section class="fond">
 <div class="retour">
  <a href="index.php" class="prev"><i class="fa fa-arrow-left"></i>retour</a>
</div>
<center><table id="rounded-corner" style="margin-top: 5rem;">
<thead >
  <th class="<?php echo rond();?>">Enseignants</th>
  <th class="rounded-q2">Nom</th>
  <th class="rounded-q2">Prenom</th>
  <th class="rounded-q2">Date de naissance</th>
  <th class="rounded-q2">Adresse</th>
  <th class="rounded-q2">Telephone</th>
  <th class="rounded-q2">Classe</th>
  <th class="rounded-q2">Promotion</th>
  
  <?php echo Edition(); ?>
</thead>
<tfoot>
  <tr>
    <td colspan="<?php echo colspan(7,9); ?>" class="rounded-foot-left" ><em>&nbsp;</em></td>
    <td class="rounded-foot-right">&nbsp;</td>
  </tr>
</tfoot>
 <tbody>
<?php
while($a=$donnee->fetch_array()){
?>
<tr><?php 
echo '<td><a href="listeEtudiant.php?voir_ensei='.$a['numel'].'" class="ttp"><i class="fa fa-eye"></i> voir</a></td> <td>'.$a['nomel'].'</td><td>'.$a['prenomel'].'</td><td>'.$a['date_naissance'].'</td><td >'.$a['adresse'].'</td><td>'.$a['telephone'].'</td><td>'.$a['nom'].'</td><td>'.$a['promotion'].'</td>';

if(isset($_SESSION['admin']) or isset($_SESSION['etudiant']) or isset($_SESSION['prof'])){
echo '<td><a href="modif_eleve.php?modif_el='.$a['numel'].'"><i class="fa fa-edit" style="font-size:15px;"></i></a></td><td><a style="font-size:13px; href="modif_eleve.php?supp_el='.$a['numel'].'" onclick="return(confirm(\'Etes-vous sur de vouloir supprimer cette entrée?\ntous les enregistrements en relation avec cette entrée seront perdus\'));"><i class="fa fa-trash"></i></a></td></tr>';}
}
?>
<tbody>
</table></center>
</section>
<?php
}
if(isset($_GET['voir_ensei'])){
$id=$_GET['voir_ensei'];
$data=mysqli_query($conn,"select prof.nom,prenom,nomel,prenomel,classe.nom as nomcl,numsem,nommat,prof.adresse,promotion from prof,matiere,classe,eleve,enseignement where prof.numprof=enseignement.numprof and enseignement.codemat=matiere.codemat and eleve.codecl=classe.codecl and classe.codecl=enseignement.codecl and numel='$id'");
?>
<h2>Les enseignants de l'etudiant choisis : </h2><br/>
<center><table id="rounded-corner">
<thead><th class="rounded-company">Nom d'etudiant</th>
<th class="rounded-q2">Prenom</th>
<th class="rounded-q2">Classe</th>
<th class="rounded-q2">promotion</th>
<th class="rounded-q2">Nom et prenom d'enseignant</th>
<th class="rounded-q2">Semestre</th>
<th class="rounded-q4">matiere</th></thead>
<tfoot>
<tr>
<td colspan="6" class="rounded-foot-left"><em>&nbsp;</em></td>
<td class="rounded-foot-right">&nbsp;</td>
</tr>
</tfoot>
 <tbody>
<?php
while($a=$data->fetch_array()){
?>
<tr><?php
echo '<td>'.$a['nomel'].'</td><td>'.$a['prenomel'].'</td><td>'.$a['nomcl'].'</td><td>'.$a['promotion'].'</td><td>'.$a['nom'].' '.$a['prenom'].'</td><td>'.$a['numsem'].'</td><td>'.$a['nommat'].'</td></tr>';
}
?>
<tbody>
</table></center> <?php
}

?>

<?php
  include "footer.php"
?>
