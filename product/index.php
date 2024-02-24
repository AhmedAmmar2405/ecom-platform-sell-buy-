<?php 
session_start();
include '../db_conn.php';

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
    <section>
        <center><h1>SELL&BUY</h1></center><br>
        <?php  include ('../interprod.php'); ?>
        </section>
<section>
  <br><br>
  <h1><center><b>NEW OFFER</b></center></h1>
  <div class="row";><div class="col-sm-1"></div>
    <?php 
    $getnewoffre=mysqli_query($conn,"SELECT * FROM produit WHERE idProduit <> {$produit['idProduit']} order by date_appro DESC limit 4 ");
    while($new=mysqli_fetch_array($getnewoffre)) {
     ?>

      
       <div class="col-sm-2">
        <?php 
        echo '<a href="./index.php?idProduit='.$new['idProduit'].'" class="btn text-light btn-transparant">'; ?>
         <div class="card border-dark mb-3" style="max-width: 18rem;">
  <div class="card-header bg-secondary border-success"><b><?php echo $new['nom']; ?></b></div>
  <div class="card-body text-success">
    <img src="<?php echo '../'.$new['img']; ?>" style="width: 150px; display: block;height: 150px; margin: 0 auto";>
  </div>
  <div class="card-footer bg-secondary border-success"><b><?php echo $new['prix'].'DH'; ?></b></div>
</div>
       </a></div>
     <?php  } ?>
     </div>
</section>
<section>
  <section class="">
  <!-- Footer -->
  <footer class="text-center" style="margin-top: 100px;">
    <div class="container p-4 pb-0"  style="margin: 0 auto 0 auto;">
      <p>Suivez-nous sur :</p>
    <section class="mb-4">

      <a class="btn btn-outline-dark btn-floating m-1" href="https://www.facebook.com/" role="button"
        ><i class="fab fa-facebook-f"></i
      ></a>

      <a class="btn btn-outline-dark btn-floating m-1" href="https://www.twitter.com/" role="button"
        ><i class="fab fa-twitter"></i
      ></a>

      <a class="btn btn-outline-dark btn-floating m-1" href="https://www.google.com/" role="button"
        ><i class="fab fa-google"></i
      ></a>

     
      <a class="btn btn-outline-dark btn-floating m-1" href="https://www.instagram.com/" role="button"
        ><i class="fab fa-instagram"></i
      ></a>

      <a class="btn btn-outline-dark btn-floating m-1" href="https://www.linkedin.com/" role="button"
        ><i class="fab fa-linkedin-in"></i>
      </a>

      <a class="btn btn-outline-dark btn-floating m-1" href="https://github.com/" role="button"
        ><i class="fab fa-github"></i
      ></a>
    </section>
    <section style="display: flex;justify-content: center;align-items: center;">
        <p class="d-flex justify-content-center align-items-center" style="margin: 0 auto 0 auto;">
          <span class="me-3" style="color: BLACK;font-weight: bold;display: inline-flex;">Register for free:</span>
          <button type="button" class="btn btn-outline-primary" style="border-radius: 30px 30px 30px 30px;font-weight: bold;margin-left: 20px;">
            <a href="signup.html" style="color:black;text-decoration: none;">Sign up!</a>   
          </button>
          <span class="me-3" style="color: BLACK;font-weight: bold;margin-left:50px;display: block;">Signalez un problem:</span>
          <button type="button" class="btn btn-outline-danger" style="border-radius: 30px 30px 30px 30px;font-weight: bold;margin-left: 20px;">
            <a href="https://mail.google.com/" style="color:black;text-decoration: none;">signalez!</a>   
          </button>
        </p>
      </section>
    
  </div>
  
  
  </footer>
  
</section>

</section>


    

</body>
</html>