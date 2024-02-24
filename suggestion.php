
                
                <?php

                $sugg=mysqli_query($conn,"SELECT * FROM produit WHERE idProduit <> {$produit['idProduit']}  AND idCat = {$produit['idCat']} order by rand() limit 3");
                $count=mysqli_num_rows($sugg);
                if($count>0){


                while($sug=mysqli_fetch_array($sugg)){

                    echo '<a href="./index.php?idProduit='.$sug['idProduit'].'" class="btn text-dark btn-transparant">
                    <div class="card border-dark mb-3" style="max-width: 18rem;">
                        <div class="card-header bg-secondary border-success"><b>'.$sug['nom'].'</b></div>
                        <div class="card-body text-dark">
                            <img src="../'.$sug['img'].'" style="width: 150px; display: block;height: 150px; margin: 0 auto";>
                        </div>
                        <div class="card-footer bg-light border-dark"><b>'.$sug['prix'].' DH</b></div>
                    </div>
                </a><br>';
                }
}

 

                 ?>
        