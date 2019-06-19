<html>
<head>

<style>

@font-face {
  font-family: Poppins-Regular;
  src: url('fonts/poppins/Poppins-Regular.ttf'); 
}

@font-face {
  font-family: Poppins-Bold;
  src: url('fonts/poppins/Poppins-Bold.ttf'); 
}

@font-face {
  font-family: Poppins-Medium;
  src: url('fonts/poppins/Poppins-Medium.ttf'); 
}

@font-face {
  font-family: Montserrat-Bold;
  src: url('fonts/montserrat/Montserrat-Bold.ttf'); 
}

body{
	font-family: Poppins-Regular;
	background-image: url("img/phone.jpg");
 
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
.navbar {
  width: 100%;
  background-color: transparent;
  overflow: auto;
}

.navbar a {
  float: left;
  padding: 12px;
  color: white;
  text-decoration: none;
  font-size: 17px;
}

.navbar a:hover {
  background-color: #000;
}

.active {
  background-color: #B22222;
}
table {
    border-collapse: collapse;
    width: 50%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr{background-color: #fffdd0}

th {
    background-color: #B22222;
    color: black;
}

.button {
    background-color: #800000; 
    border: none;
    color: white;
    padding: 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
.button3 {border-radius: 8px;}
h1{
	font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
}

.ash{
	border-radius:25px;
  width: 300px;
  border: 2px solid black;
  padding: 50px;
  margin: 20px;
}
</style>
</head>
<body>
<div class="navbar">
  <a class="active" href="event1sp.php"><i class="fa fa-fw fa-home"></i> Home</a> 
 
  <!--<a href="#"><i class="fa fa-fw fa-envelope"></i> Contact Us</a>--> 
  <!--<a href="select_final.html"><i class="fa fa-fw fa-square"></i> Categories</a>-->
</div>


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
//echo $id;
$q="select sponsored_event,amount from sponsorer where spons_name='$name'";

$result2=mysqli_query($con,$q);
while($row= mysqli_fetch_assoc($result2))
	{
			echo "<div class='ash'>
			<p>".$row["sponsored_event"]."</p>";
$nam=$row['sponsored_event'];
//echo $nam;	
$s = "select N_event_name from np_event";
$s1 = "select P_event_name from p_event";
$result = mysqli_query($con, $s);
$result1 = mysqli_query($con,$s1);
#$num = mysqli_num_rows($result);
$track_np=0;
while($row=mysqli_fetch_assoc($result))
{
	$evname=$row["N_event_name"];
	//echo $evname;
	if($nam==$evname)
	{
		$track_np=1;
		break;
	}
}

$track_p=0;
while($row=mysqli_fetch_assoc($result1))
{
	$evname=$row["P_event_name"];
	if($nam==$evname)
	{
		$track_p=1;
		break;
	}
}
//echo $track_np;
if($track_np==1)
{
	$r="select count(P_member_id) as cnt from group_members_project,np_event where N_event_name='$nam' and event_id5=N_event_id";
	$result3=mysqli_query($con,$r);
	$res2_np="select sum(prize_amt) as tot from prizes,np_event where N_event_id=event_id2 and N_event_name='$nam'";
	$result4=mysqli_query($con,$res2_np);
}
else
{$r="select count(student_name) as cnt from ticket where t_event_name='$nam'";
	$result3=mysqli_query($con,$r);
	$res2_p="select sum(price) as tot from ticket where t_event_name='$nam'";
	$result4=mysqli_query($con,$res2_p);
}

while($r= mysqli_fetch_assoc($result3)){
echo " <p>Number of students participating: ".$r['cnt']."</p>";
			}
			
			
while($r= mysqli_fetch_assoc($result4)){
if($track_np==1){
echo " <p>Money spent on prizes: ".$r['tot']."</p>";
			}
else{
	echo " <p>Money gained from tickets: ".$r['tot']."</p>";
			}
	
echo"</div>";
			
	}
	}
?>

</body>
</html>