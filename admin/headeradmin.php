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
          <a class="nav-link" href="#">Gerer Categories&Produits</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./demande.php">Demande deposition : <?php include '../db_conn.php';
          $count_query = mysqli_query($conn, "SELECT COUNT(*) AS total FROM commande");
$count_array = mysqli_fetch_array($count_query);
$count = $count_array['total'];
echo $count; ?> </a>
        </li>        
      </ul>
    </div>
  </div>
</nav>
</section>