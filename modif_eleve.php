<?php
session_start();
$title="Modification des étudiants";
include('cadre.php');
include('calendrier.html');
if(isset($_GET['modif_el'])){//modif_el qu'on a recup�rer de l'affichage (modifier)
$id=$_GET['modif_el'];
$ligne=mysqli_query($conn,"select * from eleve,classe where eleve.codecl=classe.codecl and numel='$id'")->fetch_array();
$nom=stripslashes($ligne['nomel']);
$prenom=stripslashes($ligne['prenomel']);
$date=stripslashes($ligne['date_naissance']);
$phone=stripslashes($ligne['telephone']);
$adresse=str_replace("<br />",' ',$ligne['adresse']);
$codecl=stripslashes($ligne['codecl']);
?>
<section class="fond">

<div class="corpy">
	
	<h1 align=top style=" font-size: 25px;font-family: 'genshin';text-align: center; font-size: 40px;">Modifier un étudiant<h1> 
	<form action="modif_eleve.php" method="POST" class="formulaire">
		<div>
			<label for="">Nom:</label><br>
			<input type="text" name="firstname" value="<?php echo $nom; ?>">
		</div>
		<div>
			<label for="">Date de naissance:</label><br>
			</label><input type="text" name="date" class="calendrier" value="<?php echo $date; ?>">
		</div>
		<div>
			<label for="">Prenom:</label><br>
			<input type="text" name="name" value="<?php echo $prenom; ?>">
		</div>
		<div>
			<label for="">Telephone:</label><br>
			<input type="text" name="phone" value="<?php echo $phone; ?>">
		</div>
		<div>
			<label for="">Class: <?php echo $ligne['nom']; ?></label><br>
			<label for="">Promotion: <?php echo $ligne['promotion']; ?></label><br>
		</div>
		<div>
			<label for="">Adresse: </label><br><textarea name="adresse" style="resize: none; height: max-content;"><?php echo $adresse; ?></textarea>
		</div>
		
		<input type="submit" value="ajouter" class="btn-modif">
		<button type="button" class="btn-modif" style="background: red; padding:.5rem 1.5rem;"><a href="listeEtudiant.php?nomcl=<?php echo $ligne['nom']; ?>" style="color: white;">annuler</a></button>
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		
	</form>
</div>
<?php
}
if(isset($_POST['adresse'])){
    if($_POST['date']!="" && $_POST['adresse']!="" && $_POST['phone']!=""){

        $id = $_POST['id'];
        $firstname = addslashes(htmlspecialchars($_POST['firstname']));
        $name = addslashes(htmlspecialchars($_POST['name']));
        $date = addslashes(htmlspecialchars($_POST['date']));
        $phone = addslashes(htmlspecialchars($_POST['phone']));
        $adresse = addslashes(nl2br(htmlspecialchars($_POST['adresse'])));

        // Mettre à jour l'étudiant
        mysqli_query($conn,"UPDATE eleve SET nomel='$firstname', prenomel='$name', date_naissance='$date', adresse='$adresse', telephone='$phone' WHERE numel='$id'");

        // Récupérer la classe et la promotion pour la redirection
        $ligne = mysqli_query($conn,"SELECT nom, promotion FROM classe WHERE codecl=(SELECT codecl FROM eleve WHERE numel='$id')")->fetch_array();
        $nomcl = $ligne['nom'];
        $promotion = $ligne['promotion'];

        // Message et redirection
        echo "<script>
                alert('Modifié avec succès!');
                window.location.href='listeEtudiant.php?nomcl=".addslashes($nomcl)."&promotion=".addslashes($promotion)."';
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


if(isset($_GET['supp_el'])){
$id=$_GET['supp_el'];
mysqli_query($conn,"delete from eleve where numel='$id'");
mysqli_query($conn,"delete from evaluation where numel='$id'");/*	Supprimier tous les entres en relation		*/
mysqli_query($conn,"delete from stage where numel='$id'");
mysqli_query($conn,"delete from bulletin where numel='$id'");
?> <SCRIPT LANGUAGE="Javascript">	alert("Supprimé avec succés!"); </SCRIPT> <?php
echo '<br/><br/><a href="index.php?"><i class="fa fa-left-arrow"></a>';
}
?>
</section>
<?php
include('footer.php');
?>