<?php 

$top=mysqli_query($conn,"SELECT * FROM produit ORDER BY nbreClick  DESC limit 2 ");
$count=mysqli_num_rows($top);
if($count>0){
 while ($res=mysqli_fetch_array($top)) {
echo '<div class="col-sm-6 mb-3" >
    <div class="card" style="border:solid 2px;border-radius:20px;">
      <div class="card-body" >
      <h3 class="card-title">'.$res['nom'].'</h3>
      <img src="../'.$res['img'].'" style="width=100px;">
      <a href="../product/index.php?idProduit='.$res['idProduit'].'" class="btn btn-primary" style="margin-top: 15px;">more information</a>
      </div>
    </div>
  </div>';

 	
 }
}
?>

