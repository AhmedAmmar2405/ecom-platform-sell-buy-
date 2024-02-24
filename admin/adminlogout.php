<?php 
session_start();

    unset($_SESSION['nomAdmin']);
    unset($_SESSION['prenomAdmin']);
    unset($_SESSION['idAdmin']);


header("location:../admin/adminsignin.php");
exit();
 ?>