<?php
session_start();
$title="Ajout d'un conseil de classe";
include('cadre.php');
?>

<?php

if(isset($_POST['nomcl']) and isset($_POST['radiosem'])){
$nomcl=$_POST['nomcl'];
$promo=$_POST['promotion'];
$semestre=$_POST['radiosem'];
$code_classe=mysqli_query($conn,"select codecl from classe where nom='$nomcl' and promotion='$promo'")->fetch_array();
$codecl=$code_classe['codecl'];

$compte=(mysqli_query($conn,"select count(*) as nb from conseil where numsem='$semestre' and codecl='$codecl'"))->fetch_array();
if($compte['nb']>0){
?>
<SCRIPT LANGUAGE="Javascript">alert("erreur! Ce conseil existe déja ");
    window.location.href = "ajout_conseil.php";
</SCRIPT>
<?php
}
else{
mysqli_query($conn,"insert into conseil(numsem,codecl) values ('$semestre','$codecl')");
/*
 a la veille de chaque conseil de classe :   on suppose qu'un etudiant passe 2 devoir dans la m�me mati�re dans un semestre,on specifie le semestre dans la requete,alors si on regroup par numel et codemat on va trouver au max 2 notes
*/
$bulletin=mysqli_query($conn,"select eleve.numel,matiere.codemat,avg(note) as moyen from eleve,devoir,matiere,evaluation,classe where matiere.codemat=devoir.codemat and classe.codecl=devoir.codecl and devoir.numdev=evaluation.numdev and evaluation.numel=eleve.numel and devoir.codecl=(select codecl from classe where nom='$nomcl' and promotion='$promo') and numsem='$semestre' group by numel,matiere.codemat");
while($b=($bulletin)->fetch_array()){
$numel=$b['numel'];
$codemat=$b['codemat'];
$notef=$b['moyen'];
mysqli_query($conn,"insert into bulletin(numsem,numel,codemat,notefinal) values('$semestre','$numel','$codemat','$notef')");
}
?>	<SCRIPT LANGUAGE="Javascript">alert("Ajouté avec succés!"); window.location.href = "affiche_conseil.php"</SCRIPT>	<?php
}
?>
<?php
}
else {
$data=mysqli_query($conn,"select distinct promotion from classe order by promotion desc");
$retour=mysqli_query($conn,"select distinct nom from classe"); // afficher les classes
?>
<section class="fond">
    <div class="retour">
        <a href="index.php" class="prev"><i class="fa fa-arrow-left"></i>retour</a>
    </div>
    <div class="corpy">
        <h1 align=top class="text-h1" style=" font-size: 25px;font-family: 'genshin';text-align: center; font-size: 40px;">Ajouter un conseil<h1>
        <form method="post" action="ajout_conseil.php" class="formulaire">
            <div class="form-group">
                <select name="promotion" class="control-select" required> 
                <option value="">choisir un promotion</option>
                <?php while($a=$data->fetch_array()){
                    echo '<option value="'.$a['promotion'].'">'.$a['promotion'].'</option>';
                }?>
                </select>
                <select name="nomcl" class="control-select" required>
                    <option value="">choisir une class</option>
                <?php while($a=$retour->fetch_array()){
                echo '<option value="'.$a['nom'].'">'.$a['nom'].'</option>';
                }?>
                </select>
            </div>
            <div>
                <label for="">Semestre : </label>
                <select name="radiosem" class="control-select" required><?php for($i=1;$i<=4;$i++){ echo '<option value="'.$i.'">Semestre'.$i.'</option>'; } ?>
                </select>
            </div>
            <input type="submit" value="Valider le conseil" class="btn-modif">
        </form>
    </div>
</section>
<?php } 
include 'footer.php'
?>
