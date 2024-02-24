<?php 
session_start();
if(isset($_SESSION['idAdmin']))
{
  header("location:./index.php");
  exit;
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="sign-in.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	
   <!-- Font Awesome Cdn Link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body style="background: #dfe9f5;">
	<section>
<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="../interface/index.php"><h4><b>SELL&BUY</b></h4></a>
    <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="margin:0 10px 0 auto;width:60px;">
      <span class="navbar-toggler-icon"></span>
      
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
          <li class="nav-item">
          <a class="nav-link"  href="../interface/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Vendre produit</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active"  href="./index.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../signup/index.php">Sign up</a>
        </li>
        
        
      </ul>
    </div>
  </div>
</nav>
</section>
  <div class="wrapper">
    <h1>ADMIN LOGIN </h1>
    <form method="POST" action="adminlogin.php">
    <?php if (isset($_GET['error'])){ ?>
      <div class="alert alert-danger" role="alert">
        <?=$_GET['error']?>
      </div>
    <?php } ?>

    
      <input type="text" name="email" placeholder="Enter Email">
      <input type="password" name="password" placeholder="Password">
      <button type="submit" name="submit" class="btn btn-dark">Sign in</button>
    </form>
    
    
    
  </div>
<section>
 

  <!-- Footer -->
  <footer class="text-center">
    <div class="container p-4 pb-0"  style="margin: 0 auto 0 auto;">
      <p>Suivez-nous sur :</p>
    <section class="mb-4">
      <!-- Facebook -->
      <a class="btn btn-outline-dark btn-floating m-1" href="https://www.facebook.com/" role="button"
        ><i class="fab fa-facebook-f"></i
      ></a>

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
