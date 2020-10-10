<?php

// db.php
// conn.php
// config.php
//mysqli_connect("servername","username","password","dbname");
// Procedural way
$con=mysqli_connect("localhost","root","","php3");
if(!$con){
	die("Connection Error");
}



?>