
<?php 
include '../db_conn.php';
$idproduit = $_GET['idProduit'];
if($idproduit==NULL){
    header("location:../interface/index.php");
}else{






// Récupérer les informations sur le produit
$getpro = mysqli_query($conn, "SELECT * FROM produit WHERE idProduit = '$idproduit'");
$produit = mysqli_fetch_assoc($getpro);
}

if (isset($_GET['idProduit']) && ($_GET['idProduit'] == $produit['idProduit'])) {
            $nbrclic = $produit['nbreClick'] + 1;
            mysqli_query($conn, "UPDATE produit SET nbreClick = '$nbrclic' WHERE idProduit = '" . $produit['idProduit'] . "'");
        }
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-8" style="background-color: white;border-radius: 15px 15px 15px 15px;">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" style="border-radius: 30px 30px 30px 30px;">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?php echo "../".$produit['img']; ?>" class="rounded" style="width: 500px; display: block;height: 350px; margin: 0 auto;">
                    </div>               
                </div>
            </div>
            <span><br></span>
            <div class="product-disc" style="">
                <div class="row">
                    <div class="col-md-8" style="">
                        <h1><?php echo $produit['nom']; ?></h1>
                        <p><?php echo $produit['description']; ?><br>ville : <?php echo $produit['ville']; ?></p>
                    </div>
                    <div class="col-md-2 ml-auto">
                        <p style="color:rgb(46, 107, 255);font-size: 25px;"><b><?php echo $produit['prix']; ?> DH</b></p>
                    </div>
                </div><br>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4">
                  <?php  $getvendeur=mysqli_query($conn,"SELECT * FROM user WHERE idUser = '{$produit['idUser']}'") ;
                         


                  $run=mysqli_fetch_assoc($getvendeur);
                  echo '<center style="border:solid 2px">Vendeur :'.$run['nom'].' '.$run['prenom'].'<br></center>';
                  



                  ?>
                    
                </div>
                <div class="col-md-6 ml-auto" style="margin-bottom:20px">
                    <p >contactez le vendeur :</p>
                    <a href=""><button class="btn btn-success" style="margin-bottom: 5px;"><?php echo  'Numero : 0'.$run['tel']; ?></button></a>
                    <a href="https://mail.google.com/"><button class="btn btn-dark"style="margin-bottom: 5px;width: 100%;"><?php echo 'Mail : '.$run['email'] ?></button></a>
                </div>
                <span><br></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="col-sm-2">
                <h1><center>Suggestions</center></h1>
                <?php
                include '../suggestion.php';


                 ?>
                
            </div>
        </div>
    </div>
</div>
