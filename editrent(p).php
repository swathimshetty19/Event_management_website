<?php
#checking for connection
$servername="localhost";
$username="root";
$password="";
$dbname="eventmanagement";

$con=mysqli_connect($servername,$username,$password,$dbname);

if(!$con){
	die("connection failed:".mysqli_connect_error());
}

$name=$_POST['stname'];
//echo $name;

$rent=$_POST['rent']-0;
//echo $rent;
$q="update stalls set stall_rent='$rent' where stall_name='$name'";
$res=mysqli_query($con,$q);



$message = "Updated..! ";
	echo "<script type='text/javascript'>
	alert('$message');
	window.location.href='all_stall(p).php';
	</script>";
?>
