<?php
include('db.php');
if(isset($_POST['submit'])){
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$password=$_POST['password'];
$gender=$_POST['gender'];
$skills=$_POST['skills'];
$afterImplode=implode('/',$skills);
$image=$_FILES['image']['name'];
$tmpName=$_FILES['image']['tmp_name'];
$folder_path='images/'.$image;
move_uploaded_file($tmpName, $folder_path);

$feedback=$_POST['feedback'];
$mobile=$_POST['phone'];
$city=$_POST['city'];
 $insertRecord=$con->query("insert into register(firstname,lastname,email,city,feedback,mobile,skills,image,gender,password)values('$fname','$lname','$email','$city','$feedback','$mobile','$afterImplode','$image','$gender','$password')");


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
<form action="#" method="post" enctype="multipart/form-data">
	<p><label for="fname">First Name:</label>
  <input type="text" name="fname" value="" required="">
</p>
<p><label for="lname">Last Name:</label>
  <input type="date" name="lname" value="" required="">
</p>
<p><label for="mobile">Mobile:</label>
  <input type="text" name="phone"  required="" placeholder="###" size="40" value="">
  
</p>
<p><label for="password">Password:</label>
  <input type="password" name="password" value="" required="">
</p>
<p><label for="email">Email:</label>
  <input type="email" name="email" value="test@gmail.com" required="" placeholder="Enter your name here.." size="50" maxlength="3" autocomplete="off">
</p>
<p><label for="file">Upload File:</label>
  <input type="file" name="image" value="">
</p>
<p><label for="gender">Gender:</label>
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="Female">Female
</p>
<p><label for="skills">Skills:</label>
  <input type="checkbox" name="skills[]" value="PHP">PHP
  <input type="checkbox" name="skills[]" value="HTMl5">HTMl5
</p>
<textarea name="feedback" rows="10" cols="20"></textarea>
<select name="city">
	<option value="">Select City</option>
	<option value="punjab">Punjab</option>
	<option value="">Haryana</option>
</select>
<button type="submit" name="submit">Register</button>
</form></fieldset>
</body>
</html>