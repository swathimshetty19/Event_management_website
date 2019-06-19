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
#assigning variables 
$user1= $_POST['user1'];
$id1=$_POST['id1'];
$pass=$_POST['pass'];
$role=$_POST['role'];

$s = "select * from sign_up where id = '$id1'";
$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);
if($num >= 1){
	#$message = "Ooops!!! this teamname already exists";
	#echo "<script type='text/javascript'>alert('$message');</script>";
	header('location:dbsign_up.html');
	$message = "Ooops!!! this teamname already exists";
	echo "<script type='text/javascript'>alert('$message');</script>";
}
else{
$q1="INSERT INTO sign_up VALUES('$id1','$pass','$role')";


mysqli_query($con, $q1);//to run the query
$message = "Account created,you will be redirected to login page";
echo "<script type='text/javascript'>alert('$message');
window.location.href='dblogin.html';</script>";

//echo "Registration Successfull";
//header('location:sform_team.html');
}
?>