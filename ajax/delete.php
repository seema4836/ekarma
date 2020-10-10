<?php
include 'db.php';
$id = $_POST['del_id'];
$del = "delete from users where user_id='".$id."'";
   $query = mysqli_query($con,$del);
   if($del){
   	echo "Record Deleted";
   }else{
   	echo "Record not deleted";
   }
?>