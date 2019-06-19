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
$user2=$_POST['user2'];
$id2=$_POST['id2'];
$user3=$_POST['user3'];
$id3=$_POST['id3'];
$tname=$_POST['tname'];
$ev_id=$_POST['a'];
echo $ev_id;
#$ename


$s = "select * from group_members_project where teamname = '$tname'";
$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);
if($num >= 1){
	#$message = "Ooops!!! this teamname already exists";
	#echo "<script type='text/javascript'>alert('$message');</script>";
	header('location:sform_team.html');
	$message = "Ooops!!! this teamname already exists";
	echo "<script type='text/javascript'>alert('$message');</script>";
}
else{
$q1="INSERT INTO group_members_project VALUES('$id1','$user1','$ev_id','$tname')";
$q2="INSERT INTO group_members_project VALUES('$id2','$user2','$ev_id','$tname')";
$q3="INSERT INTO group_members_project VALUES('$id3','$user3','$ev_id','$tname')";

mysqli_query($con, $q1);//to run the query
mysqli_query($con, $q2);
mysqli_query($con, $q3);
//echo "Registration Successfull";
header('location:events1.php');
}
?>

