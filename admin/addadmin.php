<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Demande</title>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="../styleinfo.css">
  <link rel="stylesheet" href="../style.css">
  <style type="text/css">
   
  .submit-button {
    background-color: black;
    color: white;
  }

  .submit-button:hover {
    background-color: lightgreen;
    color: black;
  }
</style>
</head>
<body>
  <?php  session_start();
  include '../db_conn.php';
  if(!isset($_SESSION['nomAdmin'])&&!isset($_SESSION['prenomAdmin'])){
  header("location:./adminsignin.php");
}?> 
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
          <a class="nav-link active" href="./index.php">home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Gerer vendeur</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./gerercat.php">Gerer Categories&Produits</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $_SESSION['nomAdmin'].' '.$_SESSION['prenomAdmin']; ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color:darkgrey;">
            <li><a class="dropdown-item" href="./demande.php">Demandes <?php 
          $count_query = mysqli_query($conn, "SELECT COUNT(*) AS total FROM commande");
$count_array = mysqli_fetch_array($count_query);
$count = $count_array["total"];
echo '('.$count.')'; ?></a></li>
            <li><a class="dropdown-item" href="#">Ajouter un Admin</a></li>
            <li><a class="dropdown-item" href="./adminlogout.php">Logout</a></li>
          </ul>
        </li>
        
      </ul>
    </div>
  </div>
</nav>
</section>
<span><br></span>

<section>

    <div class="wrapper" style="background-color: floralwhite;">
      <h1><u><b><i class="fa fa-plus" aria-hidden="true" style="width:80px;margin-bottom: 10px;"></i>AJOUTER UN ADMIN</b></u></h1>
      <form method="POST" action="ajtadmin.php">
        <center><?php if (isset($_GET['error'])){ ?>
      <div class="alert alert-danger" role="alert">
        <?=$_GET['error']?>
      </div>
    <?php } ?></center>


      <input type="text" placeholder="Nom" name="nom">
      <input type="text" placeholder="Prenom" name="prenom">
      <input type="email" placeholder="Email" name="email">
      <input type="password" placeholder="Password" name="mdp">
      <input type="password" placeholder="Confirmer Password" name="mdpcon">
      <input type="submit" name="submit" value="Deposer" class="submit-button">
    </form>
    </div>
</section>

</body>
<center><?php include './footeradmin.php'; ?></center>  

</html>
