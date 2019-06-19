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

$ename=$_POST['ename'];
//$id=$_POST['id'];
echo $id;

$s = "select N_event_name,N_event_id from np_event";

$result = mysqli_query($con, $s);


$track_np=0;
while($row=mysqli_fetch_assoc($result))
{
	$ename1=$row["N_event_name"];
	echo $ename1;
	if($ename==$ename1)
	{
		$eid=$row["N_event_id"];
		echo $eid;
		$track_np=1;
		break;
	}
}

echo $track_np;

if($track_np==1)
{
	$s1="select teamname from group_members_project where P_member_id='$id' and event_id5='$eid'";
	
	$res=mysqli_query($con,$s1);
	
	while($row=mysqli_fetch_assoc($res))
	{
		$tname=$row['teamname'];
		echo $tname;
	}
	
	$s2="delete from group_members_project where teamname='$tname'";
	$res1=mysqli_query($con,$s2);
	
	$message = "Regisration withdrawn..! ";
	echo "<script type='text/javascript'>
	alert('$message');
	window.location.href='sinfo.php';
	</script>";
}
?>


