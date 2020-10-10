<?php 
include('db.php');

?>
<html><head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
 
  $('#submit').on('click', function() {
    var email=$("#email").val();
    var password=$("#psw").val();
    var mobile=$("#mobile").val();

var data=$("#myform").serialize();
     // alert(email);
     if(email!="" && mobile!="" && password!=""){
        $.ajax({
        url: "insert.php",
        type: "POST",
        data: data,
        cache: false,
        success: function(result){
         if(result==1){
          window.location.href="viewRecord.php"

         }
         else{
            $("#res").html("Record not Inserted");
         }
       }
        });


     }else{
      alert('Please fill all the field !');
     }


    });
});
$(document).ready(function() {
$('#country').on('change',function(){
        var countryID = $(this).val();
       // alert(countryID)
        if(countryID){
            $.ajax({
                type:'POST',
                url:'ajaxdata.php',
                data:'country_id='+countryID,
                success:function(html){
                    $('#state').html(html);
                    $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            $('#state').html('<option value="">Select country first</option>');
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });

    // state 
    $('#state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'ajaxdata.php',
                data:'state_id='+stateID,
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
});
</script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div id="res"></div>
<form method="post" id="myform">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" value="" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" value="" name="psw" id="psw" required>
    

    <label for="psw-repeat"><b>Mobile</b></label>
    <input type="text" placeholder="Mobile" name="psw-repeat" value="" id="mobile" required>
    <hr>
    <label for="psw-repeat"><b>Country</b></label>

    <select name="country" id="country">
      <option value="">Select Country</option>
      <?php 
      //Get all country data
    $query = "SELECT * FROM country  ORDER BY country_name ASC";
    $run_query = mysqli_query($con, $query);
    //Count total number of rows
  $count = mysqli_num_rows($run_query);
    
     
        if($count > 0){
            while($row = mysqli_fetch_array($run_query)){
        $country_id=$row['country_id'];
        $country_name=$row['country_name'];
                echo "<option value='$country_id'>$country_name</option>";
            }
        }else{
            echo '<option value="">Country not available</option>';
        }
        ?>
      
    </select>
    <label for="psw-repeat"><b>State</b></label>
    <select name="state" id="state">
        <option value="">Select country first</option>
    </select>
  
    <label for="psw-repeat"><b>City</b></label>
    <select name="city" id="city">
        <option value="">Select state first</option>
    </select>
    <br/>
    <br />


   
    <button type="submit" name="register" class="registerbtn" id="submit">Register</button>
  </div>

  <div class="container signin">
    <p>Already have an account? <a href="#">Sign in</a>.</p>
  </div>
</form></body>
</html>