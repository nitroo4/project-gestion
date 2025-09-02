<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include('cadre.php');
?>

<?php

if(isset($_GET['nomcl'])){//affichage de la promotion
   $nomcl=$_GET['nomcl'];
   $_SESSION['nomcl']=$_GET['nomcl'];//session du nomcl choisis dans le menu pour laisser la variable jusqu'a la page ou on va afficher la liste
$data=mysqli_query($conn,"select promotion from classe where nom='$nomcl' order by promotion desc");
?>
<section class="fond">
   <div class="retour">
  <a href="index.php" class="prev"><i class="fa fa-arrow-left"></i>retour</a>
</div>
  <pre>
  <form action="afficher_note.php" method="POST" class="formulair" style="margin-top: -5rem;">
    <p class="sous-titre">Critères d'affichage <?php echo $_GET['nomcl']; ?>: </p>
    <legend>Promotion:<legend>
      <div class="form-group">
        <select name="promotion"> 
          <?php while($a=$data->fetch_array()){
            echo '<option value="'.$a['promotion'].'">'.$a['promotion'].'</option>';
          }?>
        </select>
        
        <select name="radiosem"><?php for($i=1;$i<=4;$i++){ echo '<option value="'.$i.'">Semestre'.$i.'</option>'; } ?>
      </select>
      <input type="submit" value="afficher" >
    </div>
  </form>
</pre>
  
</section>
<?php } 

if(isset($_POST['radiosem'])){
$nomcl=$_SESSION['nomcl'];
$_SESSION['semestre']=$_POST['radiosem'];
$promo=$_POST['promotion'];
$semestre=$_SESSION['semestre'];//seulement pour la requete
$donnee=mysqli_query($conn,"select nommat from matiere,enseignement,classe where matiere.codemat=enseignement.codemat and enseignement.codecl=classe.codecl and nom='$nomcl' and enseignement.numsem='$semestre' and promotion='$promo'");//select nommat from matiere,classe where matiere.codecl=classe.codecl and classe.nom='$classe'
$a=0;
//$_SESSION['classe']=$classe;
?>
<section class="fond">
 <div class="retour">
  <a href="index.php" class="prev"><i class="fa fa-arrow-left"></i>retour</a>
</div>
  <form method="post" action="afficher_note.php" class="formulair" style="margin-top: -4rem;">  
    <p class="sous-titre"> Matières étudiée</p>
   
    <?php
   $i=1;
  //  var_dump($a);
   while($a=$donnee->fetch_array()){
     echo '<input style="margin-top:1rem;" type="radio" name="radio" value="'.$a['nommat'].'" id="choix'.$i.'" /> <label for="choix'.$i.'">'.$a['nommat'].'</label><br /><br />';
     $i++;
    }
    ?>
  
    <div class="form-group" style="margin-top: .1rem;">
      <?php if ($i<2) {
        echo 'vide';
      } else {?>
        <input type="submit" value="Afficher les notes">
      <?php  }?> 
    </div>
  </form>
</section>

<?php
}else if(isset($_POST['radio'])){
$semestre=$_SESSION['semestre'];
$nommat=$_POST['radio'];
$nomcl=$_SESSION['nomcl'];
$donnee=mysqli_query($conn,"select nomel,prenomel,nom,nommat,date_dev,coeficient,note from eleve,classe,matiere,devoir,evaluation where eleve.codecl=classe.codecl and evaluation.numdev=devoir.numdev and devoir.codemat=matiere.codemat and evaluation.numel=eleve.numel and matiere.nommat='$nommat' and nom='$nomcl' and devoir.numsem='$semestre'");
?>
<section class="fond">
<div class="retour">
<a href="index.php" class="prev"><i class="fa fa-arrow-left"></i>retour</a>
</div>
	<h1 align=top style=" font-size: 25px;font-family: 'genshin';text-align: center; font-size: 40px;">liste des notes: <h1> 

<center><table id="rounded-corner">
<thead><tr><th class="rounded-company">Nom d'éleve</th>
<th scope="col" class="rounded-q2">Prenom d'éleve</th>
<th scope="col" class="rounded-q2">Classe</th>
<th scope="col" class="rounded-q2">Matiere</th>
<th scope="col" class="rounded-q2">Date du devoir</th>
<th scope="col" class="rounded-q2">Coefficient</th><th scope="col" class="rounded-q4">Note</th></tr></thead>
<tfoot>
<tr>
<td colspan="6" class="rounded-foot-left"><em>&nbsp;</em></td>
<td class="rounded-foot-right">&nbsp;</td>
</tr>
</tfoot>
<tbody>
<?php 
while($a=($donnee)->fetch_array()){
echo '<tr><td>'.$a['nomel'].'</td><td>'.$a['prenomel'].'</td><td>'.$a['nom'].'</td><td>'.$a['nommat'].'</td><td>'.$a['date_dev'].'</td><td>'.$a['coeficient'].'</td><td>'.$a['note'].'</td></tr>';
}
?>
</tbody>
</table></center>
</section>

<?php
}
include "footer.php" //fin   if(isset($_POST['radio']
?>



