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
$user=$_POST['user1'];
$id=$_POST['id1'];
$pass=$_POST['pass'];

$_SESSION['id']=$id;
//echo $id;
$_SESSION['name']=$user;

if($id == "pesadmin")
{
	if($pass=='1234')
	{
		header('location:adminpage.php');
	}
	else
	{
		$message = "Incorrect Password";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header('location:dblogin.html');
		//either we can alert or take him back to the same login page.
	}
		
}

else
{

$s = "select * from sign_up where id = '$id' and password='$pass'";



$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);
$track=0;
if($num == 1){
	#$message = "Ooops!!! this teamname already exists";
	#echo "<script type='text/javascript'>alert('$message');</script>";
	$track=1;
}
echo $track;
if($track==1)
{
	$row=mysqli_fetch_assoc($result);
	$r=$row['role'];
	
	if($r == "Organiser")
	{
		
		header('location:evento1.php');
		//echo "<form action='event'>";
	}
	if($r == "Student")
	{
		//echo "<form method='post' action='events1.php'>
			//<input type='hidden' name='id' value='$id'>
			//</form>"
		header('location:events1.php');
	}
	if($r == "Sponsorer")
	{
		header('location:event1sp.php');
	}

}
else
{
	$message = "Username not identified";
	echo "<script type='text/javascript'>alert('$message');window.location.href='home.html';</script>";
}
}
?>