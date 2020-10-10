<!DOCTYPE html>
<html lang="en">
<head>
  <title>View Ajax</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h2>View data</h2>
	<table class="table table-bordered table-sm" >
    <thead>
      <tr>
        
        <th>Email</th>
        <th>Password</th>
        <th>Phone</th>
		
      </tr>
    </thead>
    <tbody id="table">
      
    </tbody>
  </table>
</div>
<script>
	$.ajax({
		url: "view.php",
		type: "POST",
		cache: false,
		success: function(data){
			//alert(data);
			$('#table').html(data); 
		}
	});



  // delete from database
  $(document).on('click','.delete',function (){
        var del_id = $(this).attr('id');
        //alert(del_id)
        if(confirm("Are you sure you want to remove this?"))
   {
    $.ajax({
      url:"delete.php",
      method:"post",
      data:{del_id:del_id},
      success:function(data){
        //$('#show_data').html(data);
        //alert(data)
        window.location.href = "viewRecord.php";
      }
    });
  }
    });
   
</script>
</body>
</html>

 