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
$id1=$_POST['id1'];
$user2=$_POST['user2'];
$id2=$_POST['id2'];
$venue=$_POST['venue'];
$rent=$_POST['rent'];
$id=$_POST['id'];
$sname=$_POST['sname'];
$fest=$_POST['fest'];



$q="select * from fest where fest_name='$fest'";
$result1=mysqli_query($con,$q);
while($row= mysqli_fetch_assoc($result1))
	{
		$festid=$row['fest_id'];
	}

echo $id1;
echo $user1;
echo $id;
echo $id2;
$q3="insert into stalls values('$id','$sname','$venue','$rent','$festid')";

$result3=mysqli_query($con,$q3);
$q1="insert into group_members_stall values('$id1','$user1','$id')";

$result2=mysqli_query($con,$q1);
$q2="insert into group_members_stall values('$id2','$user2','$id')";

$result4=mysqli_query($con,$q2);


echo 'done';

$message = "Regisration of stall successful!redirecting to home page.. ";
	echo "<script type='text/javascript'>
	alert('$message');
	window.location.href='events1.php';
	</script>";
	
	?>
