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
$name=$_POST['name'];
$rank=$_POST['rank']-0;
$amt=$_POST['amt']-0;
session_start();
$evn=$_SESSION['evnm'];


$s1 = "select N_event_name,N_event_id from np_event";
$result1 = mysqli_query($con,$s1);
while($row7=mysqli_fetch_assoc($result1))
{
	$ev_n=$row7["N_event_name"];
	if($ev_n==$evn)
	{
		$ev_id=$row7["N_event_id"];
		break;
	}
}
//echo $ev_id;

$r="select count(winner_name) as cnt from prizes where event_id2='$ev_id'";
$res1=mysqli_query($con,$r);
while($row1=mysqli_fetch_assoc($res1))
{$count=$row1["cnt"];
}
if($count==3)
{$message = "Prizes for this event have already been declared, Redirecting to home..";
	echo "<script type='text/javascript'>
	alert('$message');
	window.location.href='adminpage.php';
	</script>";
}	
else{
$a="insert into prizes values('$name','$rank','$amt','$ev_id')";
$res=mysqli_query($con,$a);

$message = "Updated..! ";
	echo "<script type='text/javascript'>
	alert('$message');
	window.location.href='adminpage.php';
	</script>";
}
?>
