<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
footer {
  color: #ecf0f1;
  padding: 30px 20px;
  font-family: Arial, sans-serif;
  background-image: url('img/Images de Fond Degrade – Téléchargement gratuit sur Freepik.jpg');
  background-size: cover;      
  background-repeat: no-repeat;
  background-position: center; 
   
}

.footer-container {
  max-width: 1200px;
  margin: auto;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
 
}

.footer-column {
  flex: 1;
  min-width: 220px;
  margin: 20px 10px;
}

.footer-column h3 {
  font-size: 18px;
  margin-bottom: 15px;
}

.footer-column p,
.footer-column ul li {
  font-size: 14px;
  margin-bottom: 10px;
}

.footer-column ul {
  list-style: none;
  padding: 0;
}

.footer-column ul li a {
  color: #bdc3c7;
  text-decoration: none;
}

.footer-column ul li a:hover {
  text-decoration: underline;
}

.social-icons i {
  margin-right: 10px;
  color: #bdc3c7;
  font-size: 16px;
  cursor: pointer;
}

.footer-bottom {
  text-align: center;
  margin-top: 30px;
  border-top: 1px solid #7f8c8d;
  padding-top: 15px;
  font-size: 13px;
  color: #95a5a6;
}

.footer-bottom a {
  color: #bdc3c7;
  margin: 0 5px;
  text-decoration: none;
}
.footer-bottom a:hover {
  text-decoration: underline;
}
.span{
    color: blue;
}

@media (max-width: 768px) {
  .footer-container {
    flex-direction: column;
    align-items: center;
  }

  .footer-column {
    width: 100%;
    margin: 10px 0;
    text-align: center;
  }

  .top-block {
    order: 1;
  }

  .bottom-block {
    order: 2;
  }
}


</style>
<footer>
  <div class="footer-container">
    <div class="footer-column">
        <h1>Univers<span class="span">Life</span></h1>
        <p>Transforming education through comprehensive learning management solutions that empower students and educators to achieve excellence.</p>
    </div>

    <div class="footer-column">
      <h3>Contact Us</h3>
      <p><i class="fa fa-map-marker-alt"></i>123 Education Street, Learning City</p>
      <p><i class="fa fa-phone"></i> (123) 456-7890</p>
      <p><i class="fa fa-envelope"></i> info@universlife.com</p>
      <div class="social-icons">
        <i class="fab fa-facebook-f"></i>
        <i class="fab fa-twitter"></i>
        <i class="fab fa-linkedin-in"></i>
        <i class="fab fa-instagram"></i>
      </div>
    </div>

    <div class="footer-column">
      <h3>Quick Links</h3>
      <ul>

        <li><a href="index.php">accueil</a></li>
        <li><a href="listeEtudiants.php">Student list</a></li>
        <li><a href="afficher_prof.php">Teacher list</a></li>
      <?php if (isset($_SESSION["admin"]) or isset($_SESSION["etudiant"]) or isset($_SESSION["prof"])) {
      ?> 
        <li><a href="afficher_note.php">Note</a></li>
        <li><a href="type_diplome.php">Grade/Outcome</a></li>
      <?php 
      }
      ?> 
      </ul>
    </div>

    <div class="footer-column">
      <h3>Academic Services</h3>
      <ul>
        <li><a href="#">Semester Calendar</a></li>
        <li><a href="#">Diploma Records</a></li>
        <li><a href="#">Assignments</a></li>
        <li><a href="#">Join Us</a></li>
      </ul>
    </div>
  </div>

  <div class="footer-bottom">
    &copy; 2025 UniversLife. All rights reserved. 
    <a href="#">Privacy Policy</a> 
    <a href="#">Terms of Service</a> 
    <a href="#">Cookie Policy</a>
  </div>
</footer>
