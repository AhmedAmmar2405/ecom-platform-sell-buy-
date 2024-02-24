<?php 
session_start();
include '../db_conn.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" href="style.css">


  
</head>
<body>
	<section>
<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="../interfaceconnecte/index.php"><h4><b>SELL&BUY</b></h4></a>
    <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
          <li class="nav-item">
          <a class="nav-link "  href="../interfaceconnecte/index.php"><i class="fas fa-home"></i> Home</a>
        </li>
        <li class="nav-item">
          
          <a class="nav-link active" href="./index.php" style="background:green;border-radius: 30px 30px 30px 30px;"><i class="fas fa-plus"></i> Vendre produit</a>
        </li>
        <li class="nav-item">

          <a class="nav-link"  href="../interfaceconnecte/index.php"><i class="fas fa-sign-in-alt"></i> Quitter</a>
        </li>
        <li class="nav-item">
          
          <a class="nav-link " href="../userinfo.php"><i class="fas fa-user-alt"></i> <?php 
          if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
            echo $_SESSION['nom'].' '.$_SESSION['prenom'];
          }else{
            header("location:../signin/index.php");
          }
        


        ?></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</section>

<section>
    <div class="wrapper">
      <h1>VOTRE ANNONCE ICI</h1>
      <form method="POST" action="addproduit.php">
        <?php if (isset($_GET['error'])){ ?>
      <div class="alert alert-danger" role="alert">
        <?=$_GET['error']?>
      </div>
    <?php } ?>


      <input type="text" placeholder="Nom Produit" name="nom">
      <input type="text" placeholder="Description de produit" name="description">
      
      <select class="form-select" name="categorie">
        <?php 
        $get_cat="select * from categorie";
        $run=mysqli_query($conn,$get_cat);
        while($resultat = mysqli_fetch_array($run))
        {
          echo '<option>'.$resultat['nom'].'</option>';
        }

         ?>
        
      </select>
      <input type="number" placeholder="Prix en DH" min="1" name="prix">
      <input type="file" id="photos" name="photos" accept="image/*" multiple >
      <select class="form-select" name="ville">
        <option>Casablanca</option>
        <option>Rabat</option>
        <option>Tanger</option> 
        <option>Oujda</option>
        <option>Agadir</option>
        <option>Sale</option>
        <option>Fes</option>
        <option>OTHER</option>
      </select>
      <input type="submit" name="submit" value="Deposer" style="background-color: lightgreen;">
    </form>
    </div>
</section>
<section>
  <section class="">
  <!-- Footer -->
  <footer class="text-center" style="margin-bottom: 0;">
    <div class="container p-4 pb-0"  style="margin: 0 auto 0 auto;">
      <p>Suivez-nous sur :</p>
    <section class="mb-4">
      <!-- Facebook -->
      <a class="btn btn-outline-dark btn-floating m-1" href="https://www.facebook.com/" role="button"
        ><i class="fab fa-facebook-f"></i></a>

      <!-- Twitter -->
      <a class="btn btn-outline-dark btn-floating m-1" href="https://www.twitter.com/" role="button"
        ><i class="fab fa-twitter"></i
      ></a>

      <!-- Google -->
      <a class="btn btn-outline-dark btn-floating m-1" href="https://www.google.com/" role="button"
        ><i class="fab fa-google"></i
      ></a>

      <!-- Instagram -->
      <a class="btn btn-outline-dark btn-floating m-1" href="https://www.instagram.com/" role="button"
        ><i class="fab fa-instagram"></i
      ></a>

      <!-- Linkedin -->
      <a class="btn btn-outline-dark btn-floating m-1" href="https://www.linkedin.com/" role="button"
        ><i class="fab fa-linkedin-in"></i>
      </a>

      <!-- Github -->
      <a class="btn btn-outline-dark btn-floating m-1" href="https://github.com/" role="button"
        ><i class="fab fa-github"></i
      ></a>
    </section>
    <!-- Section: Social media -->
  </div>
  
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
</section>

</section>

</body>
</html>