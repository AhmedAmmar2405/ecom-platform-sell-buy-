<?php 
echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="styleinfo.css">';

session_start();
include './db_conn.php';
if (isset($_POST['delete'])) {
    $id = $_POST['idProduit'];
    $query = "DELETE FROM produit WHERE idProduit = $id";
    mysqli_query($conn, $query);
}


echo '<section>
<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="./interface/index.php"><h4><b>SELL&BUY</b></h4></a>
    <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="./interface/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./addproduct/index.php" style="background:green;border-radius: 30px 30px 30px 30px;"><i class="fas fa-plus"></i> Vendre produit</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./interfaceconnecte/logout.php">Logout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="./userinfo.php"><i class="fas fa-user-alt"></i> ';

          
          if (isset($_SESSION['nom']) && isset($_SESSION['prenom'])) {
            echo $_SESSION['nom'].' '.$_SESSION['prenom'];
          } else {
            header("location:./signin/index.php");
          }

echo '</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</section>';


$getproduct = mysqli_query($conn, "SELECT * FROM produit WHERE idUser = '{$_SESSION['idUser']}'");
echo '<div class="row"><div class="col-md-1"></div><div class="col-md-10">';

echo '<h1><center>'.$_SESSION['nom'].' '.$_SESSION['prenom'].'</center></h1>';


$count = mysqli_num_rows($getproduct);
echo '<h3><u>  Produit disponible :</u></h3>';
if ($count ==  0) {
    echo "<center><b><u>Vous n'avez aucun produit publier</u></b></center>";
} else {
    





echo '<table class="table table-bordered" style="margin:20px 20px 20px 20px"><thead class="thead-dark"><tr><th>PRODUIT</th><th><center>DESCRIPTION</center></th><th>PRIX</th><th>Categorie</th><th>Img</th><th>Ville</th><th><center>Action</center></th></tr></thead>';

while ($res = mysqli_fetch_array($getproduct)) {
$sql = mysqli_query($conn, "SELECT nom FROM categorie WHERE idCat='{$res['idCat']}'");
    $categorie = mysqli_fetch_assoc($sql)['nom'];



    echo '<tr>';
    echo '<td>'.$res['nom'].'</td>';
    echo '<td>'.$res['description'].'</td>';
    echo '<td>'.$res['prix'].'</td>';
    echo '<td>'.$categorie.'</td>';
    echo '<td><img src="./'.$res['img'].'" style="max-width: 120px;"></td>';

    echo '<td>'.$res['ville'].'</td>';
   
    echo '<td><form method="POST">
                  <input type="hidden" name="idProduit" value="'.$res['idProduit'].'">
                  <center><button class="btn btn-danger" name="delete" style="width: 100px;"><center>Supprimer</center></button></center>
                  
              </form></td>';
    echo '</tr>';
}

echo '</table>';
}
//afficher mes commande

if (isset($_POST['delet'])) {
    $id = $_POST['idProd'];
    $query = "DELETE FROM commande WHERE idProd = $id";
    mysqli_query($conn, $query);
}

$getcommande = mysqli_query($conn, "SELECT * FROM commande WHERE idUser = '{$_SESSION['idUser']}'");


echo '<h3>  <u>Vos demande de publication en cours de traitement :</u></h3><br>';
$count = mysqli_num_rows($getcommande);

if ($count ==  0) {

    echo "<center><b><u>Vous n'avez aucune demande</u></b></center>";
} else {

echo '<table class="table table-bordered table-striped" style="margin:20px 20px 20px 20px"><thead class="thead-dark"><tr><th>PRODUIT</th><th><center>DESCRIPTION</center></th><th>PRIX</th><th>Categorie</th><th>Img</th><th>Ville</th><th><center>Action</center></th></tr></thead>';

while ($cmd = mysqli_fetch_array($getcommande)) {
$sql2 = mysqli_query($conn, "SELECT nom FROM categorie WHERE idCat='{$cmd['idCat']}'");
    $categorie = mysqli_fetch_assoc($sql2)['nom'];



    echo '<tr>';
    echo '<td>'.$cmd['nom'].'</td>';
    echo '<td>'.$cmd['description'].'</td>';
    echo '<td>'.$cmd['prix'].'DH'.'</td>';
    echo '<td>'.$categorie.'</td>';
    echo '<td><img src="./'.$cmd['img'].'" style="max-width: 100px;"></td>';
    
    echo '<td>'.$cmd['ville'].'</td>';
   
    echo '<td><form method="POST">
                  <input type="hidden" name="idProd" value="'.$cmd['idProd'].'">
                  <center><button class="btn btn-danger" name="delet" style="width: 100px;">Supprimer</button></center>
                  
              </form></td>';
    echo '</tr>';
}

echo '</table></div></div>';

}
?>
