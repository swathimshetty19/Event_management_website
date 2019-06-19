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
$id=$_SESSION['id'];
echo $id;
#assigning variables 
$ename= $_POST['ename'];
echo $ename;
$tic=$_POST['tic'];
echo $tic;


$q="select * from ticket where t_event_name='$ename' and student_id='$id'";
$res=mysqli_query($con,$q);

$s1 = "select P_event_name,ticket_price from p_event";
$result = mysqli_query($con, $s1);

$track_p=0;
while($row=mysqli_fetch_assoc($result))
{
	$e_n1=$row["P_event_name"];
	//echo $ename1;
	if($e_n1==$ename)
	{
		$price=$row["ticket_price"];
		//echo $eid;
		
		break;
	}
}
while($row=mysqli_fetch_assoc($res))
{
	$extic=$row['no_of_tickets'];
	$exprice=$row['price'];
}

$uptic = ($extic -0)+$tic;
$uppri = $exprice + ($tic * $price);

$e="update ticket set no_of_tickets='$uptic',price='$uppri' where student_id='$id' and t_event_name='$ename'";
mysqli_query($con,$e);

$message = "Updated..! ";
	echo "<script type='text/javascript'>
	alert('$message');
	window.location.href='sinfo.php';
	</script>";
?>
