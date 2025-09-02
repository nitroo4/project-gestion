<?php
session_start();
require_once("config.php");
include('cadre.php');
?>

<link rel="stylesheet" href="style1.css">

    
<h2>Liste des étudiants</h2>

<?php
$data = mysqli_query($conn, "SELECT numel, nomel, prenomel, classe.nom AS nomcl, promotion FROM eleve INNER JOIN classe ON eleve.codecl = classe.codecl ORDER BY promotion DESC");

if ($data->num_rows > 0) {
?>
    <div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Action</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Classe</th>
                <th>Promotion</th>
                <?php echo Edition(); ?>
            </tr>
        </thead>
        <tbody>
        <?php while ($a = $data->fetch_array()) { ?>
            <tr>
                <td><a href="listeSimpleEtudiant.php?voir_ensei=<?php echo $a['numel']; ?>"><i class="fa fa-eye"></i> Voir</a></td>
                <td><?php echo $a['nomel']; ?></td>
                <td><?php echo $a['prenomel']; ?></td>
                <td><?php echo $a['nomcl']; ?></td>
                <td><?php echo $a['promotion']; ?></td>
                <?php
                if (isset($_SESSION['admin']) || isset($_SESSION['prof'])) {
                    echo '<td><a href="modif_eleve.php?modif_el='.$a['numel'].'"><i class="fa fa-edit"></i></a></td>';
                    echo '<td><a href="modif_eleve.php?supp_el='.$a['numel'].'" onclick="return confirm(\'Supprimer cet étudiant ?\')"><i class="fa fa-trash"></i></a></td>';
                }
                ?>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    </div>
<?php } else {
    echo "<p>Aucun étudiant trouvé.</p>";
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
    margin-top: 20px;
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
    margin: 20px auto;
    max-width: 95%;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
    background-color: white;
    border-radius: 8px;
    overflow: hidden;
}

th, td {
    border: 1px solid #cce0ff;
    padding: 10px;
    text-align: center;
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