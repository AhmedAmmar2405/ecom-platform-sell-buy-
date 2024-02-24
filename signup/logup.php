<?php 
session_start();
include '../db_conn.php';

if(isset($_POST['submit'])){

  function validate($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $prenom = validate($_POST['prenom']);
  $nom = validate($_POST['nom']);
  $mail = validate($_POST['mail']);
  $num = validate($_POST['num']);
  $adress = validate($_POST['adress']);
  $password = validate($_POST['password']);
  $r_password = validate($_POST['r_password']);

  $verif_mail="select * from user where email='$mail'";
  $run_mail=mysqli_query($conn,$verif_mail);
  $count=mysqli_num_rows($run_mail);



  if(empty($prenom)){
    header("location:index.php?error=prenom requis");
    exit();
  }elseif (empty($nom)) {
    header("location:index.php?error=nom requis");
    exit();
  }elseif (empty($mail)) {
    header("location:index.php?error=mail requis");
  }elseif (empty($num)) {
    header("location:index.php?error=Numero de tel requis");
  }elseif (empty($adress)) {
    header("location:index.php?error=Adresse requis");
  }elseif(empty($password)){
    header("location:index.php?error=password requis");
  }elseif (empty($r_password)) {
    header("location:index.php?error= veulliez confirmer votre password");
  }elseif (8>strlen($password)) {
   header("location:index.php?error= password trop court");
  }elseif ($password!==$r_password){
    header("location:index.php?error=Password incorrect");
  }elseif ($count > 0) {
    header("location:index.php?error= Email deja existant");
  }else{
     $add_user = "INSERT INTO user (nom,prenom,email,adress,tel,password) VALUES ( '$nom' , '$prenom' , '$mail' , '$adress' , '$num' , '$password' )";
  mysqli_query($conn,$add_user);
  header("location:../signin/index.php");

  }

 
}

 ?>