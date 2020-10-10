<?php
include('db.php');
$email=$_POST['email'];
$pass=$_POST['password'];
$mobile=$_POST['phone'];
$insertRecord=$con->query("insert into users(email,password,mobile)values('$email','$pass','$mobile')");
if($insertRecord==1){
	echo "record inserted"
}
else{
	echo "record not inserted";
}


?>