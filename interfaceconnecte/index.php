<?php 
session_start();
 ?>
<!doctype html>
<html>
<head>


	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

	<link rel="stylesheet" href="style.css">


</head>
<body>
  
	<section>
<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="./index.php"><h4><b>SELL&BUY</b></h4></a>
    <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
          <li class="nav-item">
          <a class="nav-link active"  href="./index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../addproduct/index.php" style="background:green;border-radius: 30px 30px 30px 30px;"><i class="fas fa-plus"></i> Vendre produit</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../userinfo.php"  ><i class="fas fa-user-alt"></i> <?php 
          if (isset($_SESSION['nom']) && isset($_SESSION['prenom'])) {
            echo $_SESSION['nom'].' '.$_SESSION['prenom'];
          }else{
            header("location:../interface/index.php");
          }
        


        ?></a>
        </li>
        
        
        
      </ul>
    </div>
  </div>
</nav>
</section>
<section>
    <font size="5" face="Georgia, Arial">
      <marquee behavior="scroll" direction="left" scrollamount="10" style="border-top: 1px solid black;border-bottom: 1px solid black;">
            WELCOME TO OUR WEBSITE! HERE YOU CAN BUY YOU CAN SELL EASILY YOUR PRODUCTS 
      </marquee>
    </font>
</section>

<section>
  <div class="container-fluid">
  <div class="row">
    <div class="col-md-3">
      <div class="list-group">
  <h3 class="font-weight-bold"><center><b>Categories</b></center></h3>

  <?php 
        
        include '../db_conn.php';
        $get_cat="select * from categorie";
        $run=mysqli_query($conn,$get_cat);
        while($resultat = mysqli_fetch_array($run))
        {

          echo '<a href="../categorie/index.php?idCat='.$resultat['idCat'].'" class="list-group-item list-group-item-action ">'.$resultat['nom'].'</a>';
        }

 ?>
</div>
    </div>

    <div class="col-md-8">
      <div id="carouselExampleFade" class="carousel slide carousel-fade">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="intel2.png" class="rounded" style="width: 600px; display: block;height: 250px; margin: 0 auto;">
    </div>
    <div class="carousel-item">
      <img src="tele.jpg" class="rounded" alt="Ma photo" style="width: 800px; display: block;height: 200px; margin: 0 auto;">
    </div>
    <div class="carousel-item">
      <img src="tele.jpg" alt="Ma photo" style="width: 800px; display: block;height: 200px; margin: 0 auto;">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<script>
  $(document).ready(function(){
    setInterval(function(){
      $('#carouselExampleFade .carousel-item:first-child').fadeOut(1000)
         .next('.carousel-item').fadeIn(1000)
         .end().appendTo('#carouselExampleFade .carousel-inner');
    }, 5000);
  });
</script>

<h2 class="font-weight-bold" style="font-size: 2rem;color: #07001f;"><center>ANNONCES TENDENCE</center></h2>





<div class="row">
 
<?php include '../topsells.php'; ?>



</div>
      
<center><h2 class="font-weight-bold">LATESTS</h2></center><br>
    </div>
  </div> 
</div>
</section>
<section>
   
     <div class="row";>
      <div class="col-sm-3"></div>
      
      <?php 
      include '../latest.php';

       ?>
       
     </div>


</section>
<section>
  <section class="">
  <!-- Footer -->
  <footer class="text-center text-white" style="background-color: #B2B2B2;">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: CTA -->
      <section class="">
        
      </section>
    </div>
    <!-- Grid container -->

    <div class="container p-4 pb-0"  style="margin: 0 auto 0 auto;">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-facebook-f"></i
      ></a>

      <!-- Twitter -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-twitter"></i
      ></a>

      <!-- Google -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-google"></i
      ></a>

      <!-- Instagram -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-instagram"></i
      ></a>

      <!-- Linkedin -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-linkedin-in"></i>
      </a>

      <!-- Github -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-github"></i
      ></a>
    </section>
    <!-- Section: Social media -->
  </div>
  <!-- Grid container -->
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
</section>

</section>



</body>
</html>