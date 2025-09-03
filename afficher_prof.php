<?php
session_start();
require_once("config.php");
include('cadre.php');
?>

<link rel="stylesheet" href="style1.css">
<div class="corp">
<h2>Liste des Enseignants</h2>
<?php
$data = mysqli_query($conn, "
SELECT prof.numprof, prof.nom, prof.prenom, classe.nom AS nomcl, matiere.nommat, prof.telephone
FROM prof
JOIN enseignement ON prof.numprof = enseignement.numprof
JOIN classe ON enseignement.codecl = classe.codecl
JOIN matiere ON enseignement.codemat = matiere.codemat
ORDER BY classe.nom, matiere.nommat
");

if ($data->num_rows > 0) {
?>
    <div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <!-- <th>Prénom</th> -->
                <th>Classe</th>
                <th class="contact">Matière</th>
                <th class="contact">Téléphone</th>
                <?php  echo Edition2(); ?>
            </tr>
        </thead>
        <tbody>
        <?php while ($a = $data->fetch_array()) { ?>
            <tr>

                <td><?php echo $a['nom']; ?></td>
                <!-- <td><?php echo $a['prenom']; ?></td> -->
                <td><?php echo $a['nomcl']; ?></td>
                <td class="contact"><?php echo $a['nommat']; ?></td>
                <td class="contact"><i class="fa fa-phone" style="color:green;"></i> <?php echo $a['telephone']; ?></td>
                <?php
                if (isset($_SESSION['admin']) || isset($_SESSION['prof'])) {
                    echo '<td><a href="supprimer_prof.php?numprof='.$a['numprof'].'" onclick="return confirm(\'Supprimer cet enseignant ?\')"><i class="fa fa-trash" style="color:red;"></i></a></td>';
                }
                ?>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    </div>
<?php } else {
    echo "<p>Aucun enseignant trouvé.</p>";
} ?>
<br><a href="index.php">← Revenir à la page précédente</a>
</div>


<style>
  .corp {
    padding: 20px;
    background-color: #f5faff;
    font-family: Arial, sans-serif;
    min-height: 100vh;
}

h2 {
    color: #004080;
    text-align: center;
    margin-bottom: 20px;
}

.formulaire {
    background-color: #e6f0ff;
    padding: 15px;
    border-radius: 8px;
    width: 60%;
    margin: auto;
    box-shadow: 0 0 8px rgba(0,0,0,0.1);
}

label, select, input[type="submit"] {
    display: block;
    width: 100%;
    margin-top: 10px;
    font-size: 1rem;
}

input[type="submit"] {
    background-color: #007acc;
    color: white;
    padding: 10px;
    border: none;
    cursor: pointer;
    border-radius: 4px;
    transition: 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #005a99;
}

.table-container {
    overflow-x: auto;
    margin:  auto;
    max-width: 95%;
}

table {
    width: 80%;
    border-collapse: collapse;
    margin-top: 10px;
    background-color: white;
    border-radius: 8px;
    overflow: hidden;
    margin: auto;
}

th, td {
    border: 1px solid #cce0ff;
    padding: 5px;
    text-align: center;
}
th.contact, td.contact {
    width: 160px; /* ou 100px, selon ce qui te convient */
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

th {
    background-color: #007acc;
    color: white;
    font-weight: bold;
}

tr:nth-child(even) {
    background-color: #f2f7ff;
}

tr:hover {
    background-color: #d9ecff;
}

a {
    color: #004080;
    text-decoration: none;
}
</style>
<?php include("footer.php"); ?>