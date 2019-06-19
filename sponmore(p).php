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
$name=$_SESSION['name'];
#echo $id;
#assigning variables 
$ename= $_POST['ename'];
#echo $ename;
$amt=$_POST['amt'];
#echo $tic;


$q="select * from sponsorer where sponsored_event='$ename' and spons_name='$name'";
$res=mysqli_query($con,$q);

while($row=mysqli_fetch_assoc($res))
{
	
		$amount=$row["amount"];
	
}


$upamt = ($amount -0)+$amt;


$e="update sponsorer set amount='$upamt' where sponsored_event='$ename' and spons_name='$name'";
mysqli_query($con,$e);

$message = "Updated..! ";
	echo "<script type='text/javascript'>
	alert('$message');
	window.location.href='sponinfo.php';
	</script>";
?>
