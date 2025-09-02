<?php
//session_start();
/*****Verification du mot de passe ****/
require_once("config.php");
if(isset($_POST['mdp'])){
if($_POST['mdp']!="" and $_POST['pseudo']!=""){
	$mdp=$_POST['mdp'];
	$pseudo=$_POST['pseudo'];


	// avec erreur 
	$sql = mysqli_query($conn, "SELECT type, Num FROM login WHERE pseudo='$pseudo' AND passe='$mdp'");

	// en desous sans erreur
	// $sql = mysqli_query($conn, "SELECT COUNT(*) AS nb, type, Num FROM login WHERE pseudo='$pseudo' AND passe='$mdp' GROUP BY type, Num");
	$nb = $sql->fetch_assoc();
	if(mysqli_num_rows($sql) == 1){
		if($nb['type']=="etudiant")
			$_SESSION['etudiant']=$nb['Num'];
		else if($nb['type']=="prof")
			$_SESSION['prof']=$nb['Num'];
		else if($nb['type']=="admin")
			$_SESSION['admin']=$nb['Num'];
	}
	else{
	?>	<SCRIPT LANGUAGE="Javascript">alert("Login ou mot de passe incorrect");</SCRIPT><?php
	// if($nb == null){
	// 	header("Location: index.php");
	// }
	}
	}
	else{
	?> 	<SCRIPT LANGUAGE="Javascript">alert("Vous devez remplir tous les champs!");	</SCRIPT> 	<?php
	}
}
else if(isset($_GET['sortir'])){
session_destroy();
header("location:index.php");
}
function colspan($min,$max){
if(isset($_SESSION['admin']))
	return $max;
else
	return $min;
}
function rond(){
if(isset($_SESSION['admin']))
	return 'rounded-company';	
else
	return 'rounded-company';
}
function Edition(){
 if(isset($_SESSION['admin']))
 return '<th colspan="2" class="rounded-q4">EDITION</th>';
 else
 return '';
}
function Edition2(){//si on veut affcher edtition pour le prof aussi
 if(isset($_SESSION['admin']) or isset($_SESSION['prof']))
 return '<th colspan="2" class="rounded-company">EDITION</th>';
 else
 return '';
}
function rond2(){//si on veut affcher edtition pour le prof aussi
if(isset($_SESSION['admin']) or isset($_SESSION['prof']))
	return 'rounded-q1';	
else
	return 'rounded-company';
}
Function colspan2($min,$max){//si on veut affcher edtition pour le prof aussi
if(isset($_SESSION['admin']) or isset($_SESSION['prof']))
	return $max;
else
	return $min;
}
Function choixpardefault2($var1,$var2)//pour selection l'element � modifier par defautl
{
if($var1==$var2)
return 'selected="selected"';
else
return "";
}
$data=mysqli_query($conn,"select distinct nom from classe");
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" media="screen" type="text/css" title="Essai" href="styles.css" />
<link rel="stylesheet" media="screen" type="text/css" title="Essai" href="table.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>

<script>

document.addEventListener("DOMContentLoaded", function() {
    const toggles = document.querySelectorAll(".toggle");

    toggles.forEach(toggle => {
        toggle.addEventListener("click", function(e){
            e.preventDefault();   
            e.stopPropagation();  

            const parentLi = this.parentElement;
            const subList = parentLi.querySelector("ul");
			const subDisplay = window.getComputedStyle(subList).display;
			
			if (!subList) return; 

			const siblingLis = parentLi.parentElement.querySelectorAll(":scope > li");
			siblingLis.forEach(sibling => {
				if (sibling !== parentLi) {
					const siblingUl = sibling.querySelector("ul");
					if (siblingUl) {
					siblingUl.style.display = "none";
					}
				}
			});

			if(subDisplay === "flex"){
				subList.style.display = "none";
			} else {
				subList.style.display = "block";
			}
        });
    });
    const menu = document.querySelector(".burger");
    const monmenu = document.querySelector("#monmenu");
    const niv0 = document.querySelector("#monmenu .niv0");

    // --- Toggle menu burger ---
    menu.addEventListener("click", function(e){
        e.preventDefault();
        monmenu.classList.toggle("mobile"); // ajoute/enlève la classe

        // toggle display de niv0 pour mobile
        if(window.innerWidth <= 1120){
            const display = window.getComputedStyle(niv0).display;
            niv0.style.display = (display === "block") ? "none" : "block";
        }
    });

    // --- Gestion responsive au resize ---
    function checkWidth() {
        if(window.innerWidth > 1120){
            monmenu.classList.remove("mobile"); // desktop : enlever la classe
            niv0.style.display = ""; // reset display inline pour desktop
        } else {
            // mobile : cacher le menu si pas ouvert
            if(!monmenu.classList.contains("mobile")) {
                niv0.style.display = "none";
            }
        }
    }

    window.addEventListener("resize", checkWidth);
    checkWidth(); // initial
});

</script>


<div class="menu">
	<!-- &nbsp;&nbsp;&nbsp;<font color="white">Menu</font><br/><br/> -->
	<div id="monmenu">
		<div class="key-logo">
			<img src="img/logo.png" alt="" class="nav-logo">
		</div>
		<div class="niv00">
			<div class="burger">&#9776;</div>
			<div class="niv0 mobile">
				<ul class="niveau1">
					<!-- Ressources humaines -->
					<li>
						<a href="index.php">Accueil</a>
					</li>
					<li>
						<a href="#" class="toggle">Personnes</a>
					
						<ul class="niveau2">				
							<li>
								<a href="#" class="toggle">Étudiants</a>
								<ul class="niveau3">
									<li><a href="listeEtudiants.php?list=true" class="toggle">Consulter la liste</a>
										<ul class="niveau4">
											<?php 
											foreach ($data as $datas){
												echo '<li><a  href="listeEtudiant.php?nomcl='.$datas['nom'].'">'.$datas['nom'].'</a></li>';
											}
											?>
										</ul>
									</li>
									<?php 
									if(isset($_SESSION['admin']) or isset($_SESSION['prof'])){
										echo '<li><a href="afficher_note.php">Consulter les notes</a><ul class="niveau4">';
										foreach($data as $nomcl){
											echo '<li><a href="afficher_note.php?nomcl='.$nomcl['nom'].'">'.$nomcl['nom'].'</a></li>';
										}
										echo '</ul></li>';
										if(!isset($_SESSION['prof'])){
											echo '<li><a href="Ajout_etudiant.php">Ajouter un etudiant</a></li>';
										}
									}
									if(isset($_SESSION['etudiant'])){
										echo '<li><a href="note_etudiant.php">Consulter les notes</a></li>';
									}
									?>
									<li><a href="chercher_eleve.php?cherche_eleve=true">Chercher un étudiant</a></li>
								</ul>
							</li>

							<li><a href="#" class="toggle">Enseignants</a>
								<ul class="niveau3">
									<li><a href="afficher_prof.php">Liste des enseignants</a></li>
									<?php if((isset($_SESSION['admin'])) or (isset($_SESSION['prof']))){
										if(!isset($_SESSION['prof'])){
											echo '<li><a href="ajout_prof.php">Ajouter un enseignant</a></li>';
										}
									} ?>	
									<li><a href="chercher_prof.php?cherche_prof=true">Chercher un enseignant</a></li>
								</ul>
							</li>
						</ul>
					</li>

					<!-- Organisation scolaire -->
					<li><a href="#" class="toggle">Organisation</a>
						<ul class="niveau2">
							<li><a href="#" class="toggle">Classes</a>
								<ul class="niveau3">
									<li><a href="affiche_classe.php">Voir les classes</a></li>
									<?php if(isset($_SESSION['admin'])) echo '<li><a href="ajout_classe.php">Ajouter une classe</a></li>'; ?>
								</ul>
							</li>
							<li><a href="#" class="toggle">Stages</a>
								<ul class="niveau3">
									<li><a href="afficher_stage.php">Voir les stages</a></li>
									<?php if(isset($_SESSION['admin'])) echo '<li><a href="ajout_stage.php">Ajouter un stage</a></li>'; ?>
									<li><a href="chercher_stage.php?cherche_stage=true">Chercher un stage</a></li>
								</ul>
							</li>
							<?php if(isset($_SESSION['admin']) or isset($_SESSION['prof'])) { ?>
							<li><a href="#" class="toggle">Conseil</a>
								<ul class="niveau3">
									<li><a href="affiche_conseil.php">Voir les conseils</a></li>
									<?php if(isset($_SESSION['admin'])) echo '<li><a href="ajout_conseil.php">Ajouter un conseil</a></li>'; ?>
								</ul>
							</li>
							<?php } ?>
						</ul>
					</li>

					<!-- Gestion pédagogique -->
					<li><a href="#" class="toggle">Gestion cours</a>
						<ul class="niveau2">
							<li><a href="#" class="toggle">Matières</a>
								<ul class="niveau3">
									<li><a href="#" class="toggle">Voir les matières</a>
										<ul class="niveau4">
											<?php foreach ($data as $datas) {
												echo '<li><a href="afficher_matiere.php?nomcl='.$datas['nom'].'">'.$datas['nom'].'</a></li>';
											} ?>
										</ul>
									</li>
									<?php if(isset($_SESSION['admin'])) echo '<li><a href="ajout_matiere.php">Ajouter une matière</a></li>'; ?>
								</ul>
							</li>
							<?php if(isset($_SESSION['admin']) or isset($_SESSION['prof'])) { ?>
							<li><a href="#" class="toggle">Évaluation</a>
								<ul class="niveau3">
									<li><a href="ajout_eval.php">Ajouter une évaluation</a></li>
									<li><a href="afficher_evaluation.php">Voir les évaluations</a></li>
								</ul>
							</li>
							<li><a href="#" class="toggle">Devoirs</a>
								<ul class="niveau3">
									<li><a href="ajout_devoir.php">Ajouter un devoir</a></li>
									<li><a href="afficher_devoir.php">Voir les devoirs</a></li>
								</ul>
							</li>
							<?php } ?>
							<li><a href="#" class="toggle">Enseignement</a>
								<ul class="niveau3">
									<li><a href="afficher_enseign.php">Voir les enseignements</a></li>
									<?php if(isset($_SESSION['admin'])) echo '<li><a href="ajout_enseignement.php">Ajouter un enseignement</a></li>'; ?>
								</ul>
							</li>
						</ul>
					</li>

					<!-- Suivi et résultats -->
					<li><a href="#" class="toggle">Resultat</a>
						<ul class="niveau2">
							<?php if(isset($_SESSION['admin']) or isset($_SESSION['prof'])) { ?>
							<li><a href="#" class="toggle">Bulletins</a>
								<ul class="niveau3">
									<li><a href="afficher_bulettin.php">Note finale d'un étudiant</a></li>
								</ul>
							</li>
							<?php } ?>
							<li><a href="#" class="toggle">Diplômes</a>
								<ul class="niveau3">
									<li><a href="type_diplome.php">Types de diplômes</a></li>
									<?php if(isset($_SESSION['admin']) or isset($_SESSION['prof'])) echo '<li><a href="diplome_obt.php">Diplômes obtenus</a></li>'; ?>
									<?php if(isset($_SESSION['admin'])) {
										echo '<li><a href="ajout_diplome.php?ajout_type">Ajouter un nouveau type</a></li>';
										echo '<li><a href="ajout_diplome.php?ajout_diplome">Ajouter une obtention</a></li>';
									} ?>
								</ul>
							</li>
						</ul>
					</li>

				</ul>
				<?php if (isset($_SESSION['admin']) or isset($_SESSION['prof']) or isset($_SESSION['etudiant'])){ ?>
					<div class="key-sign">
						<a class="a" href="index.php?sortir=true" >Deconnexion</a>
					</div>
				<?php } else { ?>
					<div class="key-sign">
						<a class="a" href="connexion.php" >connexion</a>
						<a class="a" href="inscription.php" >inscription</a>
					</div>
				<?php } ?>
			</div>
		</div>		
	</div>
</div>
