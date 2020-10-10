<html>
<head>
	<title>record</title>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</head>

<?php
error_reporting('E_ALL ^ E_NOTICE');

require('db.php');
session_start();
// if($_SESSION['id']==""){
// 	header("location:login.php?act=loginFirst");
// }
?>
Welcome <?php  echo $_SESSION['username'];?>
<?php
if(isset($_POST['search'])){
$search=$_POST['search'];
$select=$con->query("select * from register where firstname LIKE '%$search%'");
 $count=$select->num_rows;
while($fetch=$select->fetch_object()){
	print_r($fetch);
}
}
?>
<form method="post">
<input type="text" name="search" value="" />
<button type="submit" name="seacrh">Search</button>
	
</button>
</form>
<center> <a href="logout.php">Logout</a>
<table border="" cellspacing="5" cellpadding="10">
	<tr>
		
		<th>First Name</th>
		<th>Last Name</th>
		<th>Email</th>
		<th>City</th>
		<th>Skills</th>
		<th>Gender</th>
		<th>Image</th>
		<th>Feedback</th>
		<th colspan="2">Action</th>
	</tr>
	<?php
	$limit = 2;  
if (isset($_GET["page"])) {
	$page  = $_GET["page"]; 
	} 
	else{ 
	$page=1;
	};  
$start_from = ($page-1) * $limit; 
	$selectRecord=$con->query("select * from register ORDER BY userid ASC LIMIT $start_from, $limit");
	  $count=$selectRecord->num_rows;

	  $i=1;
	  while($fetch=$selectRecord->fetch_array()){
	  //print_r($fetch);
	  	
	?>
	<tr>
	
		<td><?php echo $fetch['firstname'];?></td>
		<td><?php echo $fetch['lastname'];?></td>
		<td><?php echo $fetch['email'];?></td>
		<td><?php echo $fetch['city'];?></td>
		<td><?php echo $fetch['skills'];?></td>
		<td><?php echo $fetch['firstname'];?></td>
		<td><img src="images/<?php echo $fetch['image'];?>" height="70" width="70"></td>
		<td><?php echo $fetch['feedback'];?></td>
		<td><a href="edit.php?uid=<?php echo $fetch['userid']; ?>">Edit</a></td>
		<td><a href="delete.php?uid=<?php echo $fetch['userid']; ?>">Delete</a></td>
	</tr>
<?php
$i++;
}

?>
</table>
<center>
<?php  

$result_db = mysqli_query($con,"SELECT COUNT(userid) FROM register"); 
$row_db = mysqli_fetch_row($result_db);  
$total_records = $row_db[0];  
$total_pages = ceil($total_records / $limit); 
/* echo  $total_pages; */
$pagLink = "<ul class='pagination'>";  
for ($i=1; $i<=$total_pages; $i++) {
              $pagLink .= "<li class='page-item'><a class='page-link' href='viewRecord.php?page=".$i."'>".$i."</a></li>";	
}
echo $pagLink . "</ul>";  
?>

<?php
if($_GET['act']=='success'){
	echo "Record Deleted successfully";
}
?>
</center>