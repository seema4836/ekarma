<?php
require('db.php');
echo $get_id=$_GET['uid'];
$delete=$con->query("delete from register where userid='$get_id'");
if($delete){
	header("location:viewRecord.php?act=success");

}else{
	header("location:viewRecord.php?act=failed");
}
?>