<?php 
session_start();
unset($_SESSION['nom']);
unset($_SESSION['prenom']);
unset($_SESSION['idUser']);
header("location:../signin/index.php");
exit();
 ?>