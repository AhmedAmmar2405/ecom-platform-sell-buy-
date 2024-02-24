<?php 

session_start();
include '../db_conn.php';
if(isset($_POST['email'])){
        
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        
        $pass = mysqli_real_escape_string($conn,$_POST['password']);

        
        if(empty($email)){
    header("location:./adminsignin.php?error=Email is required");
  }else if (empty($pass)) {
    header("location:./adminsignin.php?error=Password is required");
  }else{
        $get_admin = "select * from admin where email='$email' AND password='$pass'";
        
        $run_admin = mysqli_query($conn,$get_admin);
        
        $count = mysqli_num_rows($run_admin);
        
        if($count==1){
          $row=mysqli_fetch_array($run_admin);
            
          $_SESSION['email']=$email;
          $_SESSION['nomAdmin'] = $row['nom'];
           $_SESSION['prenomAdmin']=$row['prenom'];
           $_SESSION['idAdmin']=$row['idAdmin'];
           
           $_SESSION['adress']=$row['adress'];
           $_SESSION['tel']=$row['tel'];
           $_SESSION['password']=$pass;


            
            header("location:./index.php");
            
        }else{
            
            header("location:./adminsignin.php?error=incorrect username or password");

          }}
            
        }
        
  
    ?>