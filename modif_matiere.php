<?php
session_start();
include('cadre.php');

echo '<div class="corp">';
if(isset($_GET['modif_matiere'])){//modif_el qu'on a recup�rer de l'affichage (modifier)
$id=$_GET['modif_matiere'];
$ligne=mysqli_query($conn,"select * from matiere,classe where classe.codecl=matiere.codecl and codemat='$id'")->fetch_array();//classe pour afficher la promotion
$nom=stripslashes($ligne['nommat']);
$codecl=stripslashes($ligne['codecl']);
$promo=mysqli_query($conn,"select promotion,nom from classe where codecl='$codecl'")->fetch_array();//pour selection la classe par defualt et afficher la promotion
?>
<div class="fond">
	<div class="retour">
		<a href="afficher_matiere.php?nomcl=<?php echo $ligne['nom']; ?>" class="prev"><i class="fa fa-arrow-left"></i>prev</a>
	</div>
	<form action="modif_matiere.php" method="POST" class="formulair" style="line-height: 1rem;">
    <h1 class="p-text" style="margin-bottom: 1rem;">Modifier une matière</h1>
    Matière : <input type="text" class="btn-modife" name="nommat" value="<?php echo $nom; ?>"><br/><br/>
    Classe : <p name="name"><?php echo $promo['nom']; ?></p><br/><br/>
    Promotion : <?php echo $promo['promotion']; ?><br/><br/>

    <!-- Champs cachés pour filtrage -->
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="hidden" name="nomcl" value="<?php echo $promo['nom']; ?>">
    <input type="hidden" name="promotion" value="<?php echo $promo['promotion']; ?>">

    <input type="submit" value="ajouter" class="btn-modi">
</form>


</div>
<?php


}
if(isset($_POST['nommat'])) {
    if($_POST['nommat'] != "") {
        $id = $_POST['id'];
        $nommat = addslashes(htmlspecialchars($_POST['nommat']));
        $nomcl = $_POST['nomcl'];
        $promotion = $_POST['promotion'];

        mysqli_query($conn, "UPDATE matiere SET nommat='$nommat' WHERE codemat='$id'");

        echo "<script>
            alert('Modifié avec succès!');
            window.location.href='afficher_matiere.php?nomcl=".addslashes($nomcl)."&promotion=".addslashes($promotion)."';
        </script>";
        exit();
    } else {
        echo "<script>
            alert('Erreur! Vous devez remplir tous les champs.');
            history.back();
        </script>";
        exit();
    }
}

if(isset($_GET['supp_matiere'])){
$id=$_GET['supp_matiere'];
mysqli_query($conn,"delete from matiere where codemat='$id'");
?> <SCRIPT LANGUAGE="Javascript">	alert("Supprimé avec succés!"); 
window.location.href = "index.php"</SCRIPT> <?php
}
?>
</div>