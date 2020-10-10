<?php
	include 'db.php';
	$sql = "SELECT * FROM users";
	$result = $con->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
?>	
		<tr>
			
			<td><?=$row['email'];?></td>
			<td><?=$row['password'];?></td>
			<td><?=$row['mobile'];?></td>

			<td>
		<button type="button"  id="<?php echo $row['user_id'];?>" class="delete btn btn-danger btn-sm update" 
		
			>Delete</button></td>
		</tr>
<?php	
	}
	}
	else {
		echo "0 results";
	}
	mysqli_close($conn);
?>