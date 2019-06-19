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
session_start();
$evn=$_SESSION['evnm'];

$pri=$_POST['upd_pri'];
//echo $pri;

$pr=$pri-0;
$q="update p_event set ticket_price='$pr' where P_event_name='$evn'";
$res=mysqli_query($con,$q);

$message = "Updated..! ";
	echo "<script type='text/javascript'>
	alert('$message');
	window.location.href='adminpage.php';
	</script>";
?>
