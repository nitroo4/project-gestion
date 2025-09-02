<?php
session_start();
include('cadre.php');
require_once("config.php");
echo '<div class="corp">';
if(isset($_GET['matiere'])){
$id=$_GET['matiere'];
$data=mysqli_query($conn,"SELECT prof.nom,prenom,nommat,classe.nom AS nomcl,promotion,numsem FROM prof,enseignement,matiere,classe WHERE enseignement.numprof=prof.numprof AND classe.codecl=enseignement.codecl AND matiere.codemat=enseignement.codemat AND  enseignement.numprof='$id' ORDER BY promotion DESC");
?>
<section class="fond">
<center>
<h1 style="margin-top: -4rem;color: rgba(45, 45, 45, 0.886);text-shadow: blue .5px .5px 1px;font-size: 35px;font-family: 'genshin';">Matieres enseignées par cet enseignant</h1>

<table id="rounded-corner">
    <thead><tr> <th scope="col" class="rounded-company">Nom</th>
    <th scope="col" class="rounded-q2">Prenom</th>
    <th scope="col" class="rounded-q2">Matière</th>
    <th scope="col" class="rounded-q2">Classe</th>
    <th scope="col" class="rounded-q2">Promotion</th>
    <th scope="col" class="rounded-q4">Semestre</th></tr></thead>
    <tfoot>
        <tr>
            <td colspan="5"class="rounded-foot-left"><em>&nbsp;</em></td>
            <td class="rounded-foot-right">&nbsp;</td>
        </tr>
    </tfoot>
    <tbody>
    <?php while($a=$data->fetch_array()){
        echo '<tr><td>'.$a['nom'].'</td><td>'.$a['prenom'].'</td><td>'.$a['nommat'].'</td><td>'.$a['nomcl'].'</td><td>'.$a['promotion'].'</td><td>'.$a['numsem'].'</td></tr>';
    }?>
    <tbody>
</table>
</center>
</section>
<?php 
}
else if(isset($_GET['classe'])){
$id=$_GET['classe'];
$data=mysqli_query($conn,"SELECT * from prof,classe where numprof=numprofcoord and numprof='$id' order by promotion desc");
?>
<section class="fond" >

<center><h1 style="margin-top: -4rem;color: rgba(45, 45, 45, 0.886);text-shadow: blue .5px .5px 1px;font-size: 35px;font-family: 'genshin';">Classe coordonées par cet enseignant</h1>
<table id="rounded-corner" style="margin-top: 1rem;">
    <thead><tr> <th scope="col" class="rounded-company">Nom</th>
    <th scope="col" class="rounded-q2">Prenom</th>
    <th scope="col" class="rounded-q2">Classes coordonées</th>
    <th scope="col" class="rounded-q4">Promotion</th></tr></thead>
    <tfoot>
        <tr>
            <td colspan="3" class="rounded-foot-left">&nbsp;</td>
            <td class="rounded-foot-right">&nbsp;</td>
        </tr>
    </tfoot>
    <tbody>
        <?php
while($a=$data->fetch_array()){
    echo '<tr><td>'.$a['nom'].'</td><td>'.$a['prenom'].'</td><td>'.$a['nom'].'</td><td>'.$a['promotion'].'</td></tr>';
}
?>
<tbody>
</table>
</center>
</section>

<?php
}
?>


