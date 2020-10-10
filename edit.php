Welcome <?php  
session_start();
echo $_SESSION['username'];?>
<?php
include('db.php');
if($_SESSION['id']==""){
	header("location:login.php?act=loginFirst");
}

 $get_id=$_GET['uid'];
$selectRecord=$con->query("select * from register where userid='$get_id'");
	  $count=$selectRecord->num_rows;
	  $fetch=$selectRecord->fetch_object();
	 $skills=$fetch->skills;

	 // print_r($skills=$fetch->skills);
	 $res=explode(',',$skills);
	  $res[1];
	  //print_r($fetch);
?>
<?php
if(isset($_POST['submit'])){
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$password=$_POST['password'];
$gender=$_POST['gender'];
$skills=$_POST['skills'];
$afterImplode=implode('/',$skills);
$image=$_POST['image'];
$feedback=$_POST['feedback'];
$mobile=$_POST['phone'];
$city=$_POST['city'];
 $update=$con->query("update register set firstname='$fname',lastname='$lname' where userid='$get_id' ");

if($insertRecord){
  //echo "Record Inserted";
  header("location:viewRecord.php");
}
else{
  echo "Record Not Inserted".mysqli_error($con);
}

}
?>

<html>
<head>
	<title>table</title>
</head>
<body><fieldset><legend>Registraion Form</legend>
<form action="#" method="post">
	<p><label for="fname">First Name:</label>
  <input type="text" name="fname" value="<?php echo $fetch->firstname;?>" required="">
</p>
<p><label for="lname">Last Name:</label>
  <input type="date" name="lname" value="<?php echo $fetch->lastname;?>" required="">
</p>
<p><label for="mobile">Mobile:</label>
  <input type="text" name="phone"  required="" placeholder="###" size="40" value="<?php echo $fetch->mobile;?>">
  
</p>
<p><label for="password">Password:</label>
  <input type="password" name="password" value="<?php echo $fetch->password;?>" required="">
</p>
<p><label for="email">Email:</label>
  <input type="email" name="email" value="<?php echo $fetch->email;?>" required="" placeholder="Enter your name here.." size="50" maxlength="3" autocomplete="off">
</p>
<p><label for="file">Upload File:</label>
  <input type="file" name="image" value="">
</p>
<p><label for="gender">Gender:</label>
  <input type="radio" name="gender" value="male"<?php if($fetch->gender=='male'){ echo 'checked';}?>>Male
  <input type="radio" name="gender" value="Female" <?php if($fetch->gender=='Female'){ echo 'checked';}?>>Female
</p>
<p><label for="skills">Skills:</label>
  <input type="checkbox" name="skills[]" value="PHP">PHP
  <input type="checkbox" name="skills[]" value="HTMl5">HTMl5
</p>
<textarea name="feedback" rows="10" cols="20"><?php echo $fetch->feedback;?></textarea>
<select name="city">
	<option value="">Select City</option>
	<option value="punjab" <?php if($fetch->city=='punjab'){ echo 'selected';}?>>Punjab</option>
	<option value="">Haryana</option>
</select>
<button type="submit" name="submit">Register</button>
</form></fieldset>
</body>
</html>