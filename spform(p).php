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
$user1= $_POST['user1'];
$eid=$_POST['a'];
$amt=$_POST['amount'];
$randnum = rand(111111,999999);
echo $randnum;
$q1="insert into sponsorer values('$randnum','$user1','$eid','$amt')";
mysqli_query($con,$q1);

$s = "select * from np_event";
$s1 = "select * from p_event";
$result = mysqli_query($con, $s);
$result1 = mysqli_query($con,$s1);
#$num = mysqli_num_rows($result);
$track_np=0;
while($row=mysqli_fetch_assoc($result))
{
	$evid=$row["N_event_name"];
	if($eid==$evid)
	{
		$track_np=1;
		break;
	}
}

$track_p=0;
while($row1=mysqli_fetch_assoc($result1))
{
	$evid=$row1["P_event_name"];
	if($eid==$evid)
	{
		$track_p=1;
		break;
	}
}

if($track_np==1)
{
	$q22=$row["fest_id1"];
	
}
else
{
	$q22=$row1["fest_id2"];
}
#echo $q22;
$j="INSERT INTO sponsor VALUES('$randnum','$q22')";
mysqli_query($con,$j);

$message = "you are registered as a sponsorer ";
	echo "<script type='text/javascript'>
	alert('$message');
	window.location.href='event1sp.php';
	</script>";


?>