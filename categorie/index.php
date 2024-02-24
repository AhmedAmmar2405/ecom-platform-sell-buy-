<?php 
include '../db_conn.php';
session_start();

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sign-in.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <title>Document</title>
</head>
<body>
 <section>

<?php 
if(isset($_SESSION['idUser'])){
?>


<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="./index.php"><h4><b>SELL&BUY</b></h4></a>
    <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
          <li class="nav-item">
          <a class="nav-link active"  href="../interface/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../addproduct/index.php" style="background:green;border-radius: 30px 30px 30px 30px;"><i class="fas fa-plus"></i> Vendre produit</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../interfaceconnecte/logout.php">Logout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../userinfo.php"  ><i class="fas fa-user-alt"></i> <?php 
          if (isset($_SESSION['nom']) && isset($_SESSION['prenom'])) {
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
<?php }else{ ?>
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
          <a class="nav-link disabled" href="#">Vendre produit</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="http://localhost/pfe/signin/">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/pfe/signup/">Sign up</a>
        </li>
        
        
      </ul>
    </div>
  </div>
</nav>
<?php } ?>
</section>
<span><br></span>
<section>
<?php 

$idcat = $_GET['idCat'];
if($idcat == NULL){
  header("location:../interface/index.php");
}else{
  $get_cat=mysqli_query($conn,"SELECT * FROM categorie where idCat= '$idcat'");
$cat=mysqli_fetch_array($get_cat);
}

 ?>
  <div class="row"><div class="col-md-3"></div>
  <div class="col-md-8">
    <font size="5" face="Georgia, Arial" >
      <center><h1 style="font-size: 2.5em;
      text-align: center;
      margin-top: 20px;
      margin-bottom: 20px;
      padding: 20px;
      border: 2px solid ;
      border-radius: 20px;
      max-width: 600px;
      margin: 0 auto;"><?php echo $cat['nom']; ?></h1></center>
    </font></div></div>
</section>
<br>
<?php /*<section>
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-7">
      <form method="POST"><center>
        <input style="width: 300px;border: solid 1px black;background-color: white;" type="text" name="search" placeholder="Chercher"></center></div>
        <div class="col-md-2">
        <button name="srh" style="width:50px;" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button></div>
      </form>

    
  </div>
</section>
*/ ?> 
<section>
  <div class="container-fluid">
  <div class="row">
    <div class="col-md-3">
      <div class="list-group">
  <h3 class="font-weight-bold"><center><b>Categories</b></center></h3>

  <?php 
    $get_cat = "SELECT * FROM categorie";
    $run = mysqli_query($conn, $get_cat);

    while ($resultat = mysqli_fetch_array($run)) {
        echo '<a href="index.php?idCat='.$resultat['idCat'].'" class="list-group-item list-group-item-action">'.$resultat['nom'].'</a>';

        if (isset($_GET['idCat']) && $_GET['idCat'] == $resultat['idCat']) {
            $nbrvisite = $resultat['nbreVisite'] + 1;
            $maj = "UPDATE categorie SET nbreVisite = '$nbrvisite' WHERE idCat = '".$resultat['idCat']."'";
            mysqli_query($conn, $maj);
        }
    }
?>
 
</div>
    </div>
    
    
     
      <?php 
      

      $x=0;
$getproduct =mysqli_query($conn,"select * from produit where idCat = '$idcat' order by produit.date_appro DESC") ;
$count=mysqli_num_rows($getproduct);
while ($res=mysqli_fetch_array($getproduct)) {
  
  echo '<div class="col-md-2">';
  echo '<a href="../product/index.php?idProduit='.$res['idProduit'].'" class="btn text-light btn-transparant">';
  echo '<div class="card border-dark mb-3" style="max-width: 18rem;">';
  echo '<div class="card-header bg-secondary border-success"><b>'.$res['nom'].'</b></div>';
  echo '<div class="card-body text-success">';
  echo '<img src="../'.$res['img'].'" style="width: 150px; display: block;height: 150px; margin: 0 auto";>';
  echo '</div> <div class="card-footer bg-secondary border-success"><b>'.$res['prix'].'DH</b></div>';
  echo '</div></a></div>';
  $x++;
  if($x%4 === 0)
  {
    echo '<div class="col-sm-3"></div>';
  }

}
      

      ?>
       
      

    
  </div> 
</div>
</section>

     <div class="row";>
      
     </div>
<br><br><br>
<section>
  <section class="">
  <!-- Footer -->
  <footer class="text-center text-white" style="background-color: #B2B2B2;margin-top: 100px;">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: CTA -->
      <section class="">
        <p class="d-flex justify-content-center align-items-center" style="margin: 0 auto 0 auto;">
          <span class="me-3" style="margin-right: 20px;margin-top:20px;color: BLACK;font-weight: bold;">Register for free : </span>
          <button type="button" class="btn btn-outline-dark" style="border-radius: 30px 30px 30px 30px;font-weight: bold;width: auto;">
            <a href="signup.html" style="color:black;text-decoration: none;">Sign up!</a> 
          </button>
        </p>
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