<?php
$title="Inscription";
include('cadre.php');
?>
<head>
<style>
    * {
      box-sizing: border-box;
    }

      .body1{
        margin: auto;
        background-image: url('clear.jpg');
        background-position: center;
        background-size: contain;
        background-repeat: no-repeat;
      }

      @media(max-width:900px){
        .body1{
          background-image: none;
        }
      }
    form {
    max-width: 400px;
    height:max-content;
    margin: 50px auto;
    background-color: transparent;
    border: 2px solid rgba(255, 255, 255, 0.884);
    padding: 30px 40px;
    border-radius: 8px;
    color: black;
    font-family: Arial, sans-serif;
    }

    h2 {
      color: white;
      margin-bottom: 20px;
      text-align: center;
      
    }

    label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
      color: #444;
    }

    input[type="text"],
    input[type="password"],
    select {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
      font-size: 14px;
    }

    button {
      width: 100%;
      padding: 10px;
      margin-top: 25px;
      background-color: #3498db;
      border: none;
      border-radius: 5px;
      color: white;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
    }

    button:hover {
      background-color: #2980b9;
    }

    .success {
      color: green;
      font-weight: bold;
      margin-bottom: 20px;
    }

    .error {
      color: red;
      font-weight: bold;
      margin-bottom: 20px;
    }
  </style>
</head>

<body class="body1">
<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pseudo = mysqli_real_escape_string($conn, $_POST["pseudo"]);
    $passe = mysqli_real_escape_string($conn, $_POST["passe"]);
    $num = mysqli_real_escape_string($conn, $_POST["num"]);
    $type = mysqli_real_escape_string($conn, $_POST["type"]);

    // $passe = password_hash($passe, PASSWORD_DEFAULT); // Sécurité (optionnel)

    $sql = "INSERT INTO login (Num, pseudo, passe, type) VALUES ('$num','$pseudo', '$passe', '$type')";

    if (mysqli_query($conn, $sql)) 
      { ?>
      <script >
        alert("Inscription reussi");
        window.location.href = "connexion.php";

      </script>      
      <?php

    } else {
        echo "<p class='error'>Erreur : " . mysqli_error($conn) . "</p>";
    }

    mysqli_close($conn);
}
?>

  <h2>Inscription</h2>

  <form action="inscription.php" method="post">
    <label for="pseudo">Pseudo :</label>
    <input type="text" name="pseudo" id="pseudo" required>

    <label for="passe">Mot de passe :</label>
    <input type="password" name="passe" id="passe" required>
    
    <label for="passe">Numero badge:</label>
    <input type="password" name="num" id="passe" required>

    <label for="type">Type :</label>
    <select name="type" id="type" required>
      <option value="admin">Admin</option>
      <option value="prof">Prof</option>
      <option value="etudiant">Étudiant</option>
    </select>

    <button type="submit">S'inscrire</button>
  </form>

  <?php include("footer.php"); ?>
</body>