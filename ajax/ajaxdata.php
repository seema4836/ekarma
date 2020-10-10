<?php
include('db.php');
if(isset($_POST["country_id"])){
    //Get all state data
	$country_id= $_POST['country_id'];
    $query = "SELECT * FROM state WHERE cid = '$country_id' 
	ORDER BY state ASC";
	$run_query = mysqli_query($con, $query);
    
    //Count total number of rows
    $count = mysqli_num_rows($run_query);
    
    //Display states list
    if($count > 0){
        echo '<option value="">Select state</option>';
        while($row = mysqli_fetch_array($run_query)){
		$state_id=$row['state_id'];
		$state_name=$row['state'];
        echo "<option value='$state_id'>$state_name</option>";
        }
    }else{
        echo '<option value="">State not available</option>';
    }
}

// city
if(isset($_POST["state_id"])){
	$state_id= $_POST['state_id'];
    //Get all city data
    $query = "SELECT * FROM city WHERE s_id = '$state_id' 
	ORDER BY city ASC";
    $run_query = mysqli_query($con, $query);
    //Count total number of rows
    $count = mysqli_num_rows($run_query);
    
    //Display cities list
    if($count > 0){
        echo '<option value="">Select city</option>';
        while($row = mysqli_fetch_array($run_query)){
		$city_id=$row['city_id'];
		$city=$row['city']; 
        echo "<option value='$city_id'>$city</option>";
        }
    }else{
        echo '<option value="">City not available</option>';
    }
}
?>
?>