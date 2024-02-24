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
            <li><a class="dropdown-item" href="./addadmin.php">Ajouter un Admin</a></li>
            <li><a class="dropdown-item" href="./adminlogout.php">Logout</a></li>
          </ul>
        </li>
        
      </ul>
    </div>
  </div>
</nav>
</section>
<span><br></span>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-4"></div>
			<div class="col-md-4"> <h1><center><u>DEMANDES :</u><img src="../demmande.jpg" style="width:80px;"> </center></h1>
			</div></div>
	<span><br><br><br></span>
  <?php 

  if (isset($_POST['delete'])) {
    $id = $_POST['idProd'];
    $query = "DELETE FROM commande WHERE idProd = $id";
    mysqli_query($conn, $query);
}
if(isset($_POST['aprove'])){
$id=$_POST['idProd'];

$query = "INSERT INTO produit (nom,description,prix,idCat,img,ville,idUser) SELECT nom,description,prix,idCat,img,ville,idUser FROM commande WHERE idProd=$id";
mysqli_query($conn,$query);


    $id = $_POST['idProd'];
    
    
    
    $query2 = "DELETE FROM commande WHERE idProd=$id";
    mysqli_query($conn, $query2);
}

$getcommande=mysqli_query($conn,"SELECT * FROM commande");
$count = mysqli_num_rows($getcommande);
echo '<div class="row"><div class="col-md-1"></div><div class="col-md-10">';

if ($count ==  0) {
    echo "<center><b><u>Vous n'avez aucune commande</u></b></center>";
} else {
   
echo '<table class="table table-bordered table-striped" style="margin:20px 20px 20px 20px;border:solid black" ><thead class="thead-dark"><tr><th>PRODUIT</th><th><center>DESCRIPTION</center></th><th>PRIX</th><th>Categorie</th><th>Img</th><th>Ville</th><th><center>Action</center></th></tr></thead>';

while ($res = mysqli_fetch_array($getcommande)) {
$sql = mysqli_query($conn, "SELECT nom FROM categorie WHERE idCat='{$res['idCat']}'");
    $categorie = mysqli_fetch_assoc($sql)['nom'];
    echo '<tr>';
    echo '<td>'.$res['nom'].'</td>';
    echo '<td>'.$res['description'].'</td>';
    echo '<td>'.$res['prix'].'</td>';
    echo '<td>'.$categorie.'</td>';
    echo '<td><img src="../'.$res['img'].'" style="max-width: 120px;"></td>';
    echo '<td>'.$res['ville'].'</td>';
   
    echo '<td><form method="POST">
                  <input type="hidden" name="idProd" value="'.$res['idProd'].'">
                  <center><button class="btn btn-danger" name="delete" style="width: 100px;"><center>Supprimer</center></button></center><br>
                  <input type="hidden" name="idProd" value="'.$res['idProd'].'">
                  <center><button class="btn btn-success" name="aprove" style="width: 100px;"><center>Approuver</center></button></center>
                  
              </form></td>';
     
    echo '</tr>';
}

echo '</table></div>';
}
   ?>
</body>
<?php include './footeradmin.php'; ?>  

</html>