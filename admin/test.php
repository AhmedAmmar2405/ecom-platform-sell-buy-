<?php
if (isset($_POST['submit']) && isset($_POST['categorie'])) {
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

if (isset($_POST['delete'])) {
    $id=$_POST['idProduit'];
    $del="DELETE FROM produit WHERE idProduit = $id";
    mysqli_query($conn,$del);
}
if (isset($_POST['deletecat'])) {
    $id=$_POST['idCat'];
    $del="DELETE FROM categorie WHERE idCat = $id";
    mysqli_query($conn,$del);
}



?>