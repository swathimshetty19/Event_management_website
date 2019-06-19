
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

$name=$_POST['user1'];
$id=$_POST['id1'];
$tic=$_POST['not'];
$e_id=$_POST['a'];
echo $id;

$s="select * from p_event where P_event_id='$e_id'";

$result = mysqli_query($con, $s);

while($row=mysqli_fetch_assoc($result))
{
	$cost=$row['ticket_price'];
	$e_n=$row['P_event_name'];
	//echo $cost;
}
	
echo $e_n;

$price=($tic -0)*($cost);
//echo $price;
$p="select count(student_name) as sum from ticket where student_id='$id' and t_event_name='$e_n' ";
$re = mysqli_query($con, $p);
while($row=mysqli_fetch_assoc($re))
{
	$cnt=$row["sum"];
}
if($cnt>0)
{
	//echo $cnt;
	
	$message = "You have already registered for this event.. ";
	echo "<script type='text/javascript'>
	alert('$message');
	window.location.href='events1.php';
	</script>";
	
}

else
{
$q="insert into ticket values('$id','$name','$tic','$price','$e_n')";
mysqli_query($con,$q);

$s1 = "select P_event_name,P_event_id from p_event";
$result = mysqli_query($con, $s1);

$track_p=0;
while($row=mysqli_fetch_assoc($result))
{
	$e_n1=$row["P_event_name"];
	//echo $ename1;
	if($e_n1==$e_n)
	{
		$eid=$row["P_event_id"];
		echo $eid;
		$track_p=1;
		break;
	}
}
$q1="insert into booking values('$id','$eid')";
mysqli_query($con,$q1);

$message = "Regisration successful!redirecting to home page.. ";
	echo "<script type='text/javascript'>
	alert('$message');
	window.location.href='events1.php';
	</script>";
}
	?>
