<?php 
include '../db_conn.php';
$x=0;
$getproduct =mysqli_query($conn,"select * from produit") ;
$count=mysqli_num_rows($getproduct);
while ($res=mysqli_fetch_array($getproduct)) {
	
	echo '<div class="col-sm-2">';
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


 
        
         
  
  
    
  
