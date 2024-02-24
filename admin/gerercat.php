 <?php 
 include "../db_conn.php";
 session_start();
 if(!isset($_SESSION['nomAdmin'])&&!isset($_SESSION['prenomAdmin'])){
  header("location:./adminsignin.php");

}
  ?>

 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="admin.css">

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
          <a class="nav-link active" href="./index.php">home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./gereruser.php">Gerer vendeur</a>
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
<br><br>
<section>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form method="POST" class="d-flex">
                <select class="form-select" name="categorie" style="background-color: lightslategrey;">
    <?php 
    $get_cat="SELECT * FROM categorie";
    $run=mysqli_query($conn,$get_cat);
    while($resultat = mysqli_fetch_array($run))
    {
        $selected = (isset($_POST['categorie']) && $_POST['categorie'] == $resultat['idCat']) ? 'selected' : '';
        echo '<option style="text-align:center" value="'.$resultat['idCat'].'" '.$selected.'>'.$resultat['nom'] .' ('.$resultat['nbreVisite'].')</option>';       
    }
    ?>
</select>

                </div>
                <div class="col-md-1">


                    <button type="submit" id="submit" name="submit" class="btn btn-success"><i class="fa fa-search" aria-hidden="true" style="font-size: 20px;"></i></button></div>


                    
               
            </form>

        
    </div>
    <?php 
    
if (isset($_POST['submit'])) {
    echo '<div class="row">
            <div class="col-1"></div>
            <div class="col-10">';
    $categorie = $_POST['categorie'];
    $sql = mysqli_query($conn,"SELECT * FROM categorie WHERE idCat='$categorie'");
    if (mysqli_num_rows($sql) > 0) {
    
    $cat=mysqli_fetch_array($sql);
    
    $getpro = mysqli_query($conn,"SELECT * FROM produit WHERE idCat = '".$cat['idCat']."'");
    $count = mysqli_num_rows($getpro);

    if ($count == 0) {
        echo "<center><b><u>cette categorie est vide</u></b></center>";
    } else {
        echo '<table class="table table-bordered table-striped" style="margin:20px 20px 20px 20px"><thead class="thead-dark"><tr><th>PRODUIT</th><th><center>Clics</center></th><th><center>DESCRIPTION</center></th><th>PRIX</th><th>Img</th><th>Ville</th><th><center>Action</center></th></tr></thead>';

        while ($res = mysqli_fetch_array($getpro)) {
            echo '<tr>';
            echo '<td>'.$res['nom'].'</td>';
            echo '<td>'.$res['nbreClick'].'</td>';
            echo '<td>'.$res['description'].'</td>';
            echo '<td>'.$res['prix'].'</td>';
            echo '<td><img src="../'.$res['img'].'" style="max-width: 120px;"></td>';
            echo '<td>'.$res['ville'].'</td>';
            echo '<td>
                    <form method="POST">
                        <input type="hidden" name="idProduit" value="'.$res['idProduit'].'">
                        <center><button class="btn btn-danger" name="delete" style="width: 100px;"><center>Supprimer</center></button></center>
                    </form>
                </td>';
            echo '</tr>';
        }
        echo '</table>';

        
    }
    echo '</div></div><div class="row"><div class="col-1"></div>
            <div class="col-10">';
    echo '<form method="POST">
                        <input type="hidden" name="idCat" value="'.$cat['idCat'].'">
                        <center><button class="btn btn-danger" name="deletecat" style="width: auto;"><center>Supprimer la Categorie</center></button></center>
                    </form></div></div>';




    }else {
        echo "<center><b><u>cette categorie n'existe pas</u></b></center>";
    }
}

/*if (isset($_POST['delete'])) {
    $id=$_POST['idProduit'];
    $del="DELETE FROM produit WHERE idProduit = $id";
    mysqli_query($conn,$del);
}*/

if (isset($_POST['delete'])) {
  $id = $_POST['idProduit'];
  $query = "DELETE FROM produit WHERE idProduit='$id'";
  $result = mysqli_query($conn, $query);
  if ($result) {
    echo '<script>document.getElementById("submit").click();</script>';
    
    //$categorie = $_POST['categorie'];
    //$getpro = mysqli_query($conn, "SELECT * FROM produit WHERE idCat='$categorie'");
  } else {
    echo "Failed to delete product";
  }
}

if (isset($_POST['deletecat'])) {
    $id=$_POST['idCat'];
    $del="DELETE FROM categorie WHERE idCat = $id";
    mysqli_query($conn,$del);
    $del2="DELETE FROM produit WHERE idcat=$id";
    mysqli_query($conn,$del2);
}


                ?>
           </div>
       </div>


     
    

</section>




</body>
<center><?php include './footeradmin.php'; ?></center>
</html>