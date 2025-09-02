<?php
include('cadre.php');
?>
<div class="connexion2">
  <?php if (!isset($_SESSION['admin']) && !isset($_SESSION['prof']) && !isset($_SESSION['etudiant'])): ?>
    <form action="index.php" method="post">
      <fieldset>
        <legend>Authentification</legend>
        <label for="pseudo">Pseudo :</label>
        <input type="text" name="pseudo" id="pseudo" required>

        <label for="mdp">Mot de passe :</label>
        <input type="password" name="mdp" id="mdp" required>

        <button type="submit">Connexion</button>
      </fieldset>
    </form>
  <?php else: ?>
    <li><a href="index.php?sortir=1">Déconnexion</a></li>
  <?php endif; ?>
</div>
<?php include "./footer.php";?>
<style>
  body {
  /* padding: 0; */
  background-image: url('clear.jpg'); 
  background-repeat: no-repeat;
  /* min-height: 100vh; */
  font-family: Arial, sans-serif;
  background-position: center ;
  /* background-size: 270vh;  */
  /* margin: auto; */
  background-size: contain;
      
}
.connexion2 {
  max-width: 400px;
  height: 350px;
  margin: 50px auto;
  border: 2px solid rgba(255, 255, 255, 1);
  padding: 30px 40px;
  border-radius: 8px;
  color: black;
  font-family: Arial, sans-serif;
  margin-top: 80px; 
}


fieldset {
  border: none;
}

legend {
  font-size: 1.4em;
  /* margin-bottom: 15px; */
  /* color: #ecf0f1; */
  color: blue;
  margin:auto;
}

label {
  display: block;
  margin-bottom: 6px;
}

input[type="text"],
input[type="password"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 15px;
  border: none;
  border-radius: 4px;
  background: #ecf0f1;
  color: #2c3e50;
}

button {
  width: 50%;
  padding: 10px;
  background-color: #3498db;
  border: none;
  border-radius: 4px;
  color: white;
  font-weight: bold;
  cursor: pointer;
  margin-top: 30px;
  display: block;         
  margin: 30px auto 0;    
}

button:hover {
  background-color: #2980b9;
}

a {
  text-decoration: none;
}

</style>