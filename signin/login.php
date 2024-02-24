<?php 

session_start();
include '../db_conn.php';


  

if(isset($_POST['email'])){
        
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        
        $pass = mysqli_real_escape_string($conn,$_POST['password']);

        
        if(empty($email)){
    header("location:index.php?error=Email is required");
  }else if (empty($pass)) {
    header("location:index.php?error=Password is required");
  }else{
        $get_user = "select * from user where email='$email' AND password='$pass'";
        
        $run_user = mysqli_query($conn,$get_user);
        
        $count = mysqli_num_rows($run_user);
        
        if($count==1){
          $row=mysqli_fetch_array($run_user);
            
          $_SESSION['email']=$email;
           $_SESSION['prenom']=$row['prenom'];
           $_SESSION['idUser']=$row['idUser'];
           $_SESSION['nom']=$row['nom'];
           $_SESSION['adress']=$row['adress'];
           $_SESSION['tel']=$row['tel'];
           $_SESSION['password']=$pass;

            
            header("location:../interfaceconnecte/index.php");
            
        }else{
            
            header("location:index.php?error=incorrect username or password");

          }}
            
        }
        
  
    ?>