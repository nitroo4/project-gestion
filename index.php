<?php
session_start();
$title="Page d'accueil";
require_once("config.php");
?>

<?php
include('cadre.php');
?>
<div class="corps">
    <h1>Bienvenue
        <br>
        <span>
            dans notre gestion scolaire
        </span>
    </h1>
</div>

<?php 

include("footer.php")
?>