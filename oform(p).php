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
$number=$_POST['number'];
$email=$_POST['email'];
$eid=$_POST['a'];
$q1="INSERT INTO organiser VALUES('$id1','$user1')";
mysqli_query($con,$q1);

$s = "select N_event_id from np_event";
$s1 = "select P_event_id from p_event";
$result = mysqli_query($con, $s);
$result1 = mysqli_query($con,$s1);
#$num = mysqli_num_rows($result);
$track_np=0;
while($row=mysqli_fetch_assoc($result))
{
	$evid=$row["N_event_id"];
	if($eid==$evid)
	{
		$track_np=1;
		break;
	}
}

$track_p=0;
while($row=mysqli_fetch_assoc($result1))
{
	$evid=$row["P_event_id"];
	if($eid==$evid)
	{
		$track_p=1;
		break;
	}
}

if($track_np==1)
{
	$q11 = "insert into organise_n values('$id1','$eid')";
	mysqli_query($con,$q11);
}
else
{
	$q12 = "insert into organise_p values('$id1','$eid')";
	mysqli_query($con,$q12);
}
header('location:evento1.php');
?>
