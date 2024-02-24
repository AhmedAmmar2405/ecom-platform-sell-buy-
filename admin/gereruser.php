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
          <a class="nav-link" href="./index.php">home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="./gereruser.php">Gerer vendeur</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./gerercat.php">Gerer Categories&Produits</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $_SESSION['nomAdmin'].' '.$_SESSION['prenomAdmin']; ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color:darkgrey;border: 2px solid;margin-top: 10px;">
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
            

    <h1><center><u><br>GERER LES UTILISATEURS :</u></center></h1>    
    <?php 
    

    echo '<div class="row">
            <div class="col-1"></div>
            <div class="col-10">';
            $email = mysqli_real_escape_string($conn, $_SESSION['email']);


            //;

    
    $sql = mysqli_query($conn,"SELECT * FROM user WHERE email <> '$_SESSION[email]' AND email NOT IN (SELECT email FROM admin)");
            echo '<table class="table table-bordered table-striped" style="margin:20px 20px 20px 20px"><thead class="thead-dark"><tr><th>NOM</th><th><center>PRENOM</center></th><th><center>EMAIL</center></th><th><center>NOMBRE D\'ANNONCES</center></th><th><center>Action</center></th></tr></thead>';

        while ($res=mysqli_fetch_array($sql)) {
            echo '<tr>';
            echo '<td><center>'.$res['nom'].'</center></td>';
            echo '<td><center>'.$res['prenom'].'</center></td>';
            echo '<td><center>'.$res['email'].'</center></td>';
            $getpro = mysqli_query($conn,"SELECT * FROM produit WHERE idUser = '".$res['idUser']."'");
    $count = mysqli_num_rows($getpro);



            echo '<td><center>'.$count.'</center></td>';
            
            
            echo '<td>
                    <form method="POST">
                        <input type="hidden" name="idUser" value="'.$res['idUser'].'">
                        <center><button class="btn btn-success" name="proum" style="width: 100%;"><center>Rendre admin</center></button></center>
                        <input type="hidden" name="idUser" value="'.$res['idUser'].'">
                        <center><button class="btn btn-danger" name="delete" style="width: 100%;"><center>Supprimer User</center></button></center>

                    </form>
                </td>';
            echo '</tr>';
       }
        echo '</table>';


echo '<center><button class="btn btn-dark" style="width: 80%;color:black;"><center><a href="./addadmin.php" style="color:white;">AJOUTER UN ADMIN</a></center></button></center>';
        

 



if (isset($_POST['delete'])) {
  $id = $_POST['idUser'];
  $query = "DELETE FROM user WHERE idUser='$id'";
  $result = mysqli_query($conn, $query);
  if ($result) {
    echo '<script>document.getElementById("submit").click();</script>';
    
    
  } else {
    echo "Failed to delete User";
  }
}

if (isset($_POST['proum'])) {
    $id=$_POST['idUser'];
    $sqli=mysqli_query($conn,"SELECT * FROM user WHERE idUser='$id'");
    $res=mysqli_fetch_array($sqli);
    $nom = $res['nom'];
    $prenom = $res['prenom'];
    $email = $res['email'];
    $password = $res['password'];
    
    $proum="INSERT INTO admin (nom, prenom, email, password) VALUES ('$nom', '$prenom', '$email', '$password')";
    mysqli_query($conn,$proum);
}


                ?>
           </div>
       </div>


     
    

</section>




</body>
<center><?php include './footeradmin.php'; ?></center>
</html>