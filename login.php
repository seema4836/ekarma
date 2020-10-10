<?php
session_start();
include('db.php');
if(isset($_POST['submit'])){

	$email=$_POST['email'];
	$pass=$_POST['pwd'];
	$selectRecord=$con->query("select * from register where email='$email' AND password='$pass'");
	  $count=$selectRecord->num_rows;
	  $fetch=$selectRecord->fetch_object();
	  if($count==1){
	  	 $_SESSION['username']=$fetch->firstname;
	  	 $_SESSION['id']=$fetch->userid;
	  	header("location:viewRecord.php");

	  }else{
	  	echo "Invalid username or password";
	  }
}


?>
<form action="#" method="post">
	<p><label for="fname">Email/Username:</label>
  <input type="text" name="email" value="" required="" autocomplete="off">
</p>
<p><label for="lname">Password:</label>
  <input type="password" name="pwd" value="" required="" autocomplete="off">
</p>
<button type="submit" name="submit">Login</button>
</form>
<p><a href="forgetpass.php">Forgot your password?</a></p>
