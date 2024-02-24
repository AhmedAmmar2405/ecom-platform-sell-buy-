<?php 
include '../db_conn.php';

$getsubcat = mysqli_query($conn,"select * from subcategorie");
while($res=mysqli_fetch_array($getsubcat))
{
	echo '<a href="#" class="list-group-item list-group-item-action ">'.$res['nom'].'</a>';

}


 ?>