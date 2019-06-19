<html>
<head>

<style>

body, html {
  height: 100%;
  margin: 0;
  font-size: 20px;
}

* {
  box-sizing: border-box;
}

body{
	font-family: Poppins-Regular;
	background-image: url("img/earp.jpg");
 
  background-size: cover;
}
.bg-text {
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0, 0); 
  color: black;
  font-weight: bold;
  border: #000000;
  position: absolute;
  top: 40%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 1;
  width: 50%;
  height:65%;
  padding: 20px;
  text-align: center;
}

.navbar {
  width: 100%;
  background-color: #555;
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
  background-color: maroon;
}
table {
    border-collapse: collapse;
    width: 60%;
}

th, td {
    text-align: left;
    padding: 8px;
}
tr{background-color:#FFFFFF}
tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: maroon;
    color: white;
}

.button {
    background-color: #4CAF50; 
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
caption{
	font-size:25;
}
.ash{
	border-radius:25px;
  width: 300px;
  border: 2px solid black;
  padding: 50px;
  margin: 20px;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0, 0.4); 
  color:white;
  position: absolute;
  top: 40%;
  left: 50%;
  transform: translate(-50%, -50%);
}
</style>
</head>
<body>

<div class="navbar">
  <a class="active" href="evento1.php"><i class="fa fa-fw fa-home"></i> Home</a> 
  <a href="oinfo.php"><i class="fa fa-arrow-left"></i> back</a>
  <!--<a href="#"><i class="fa fa-fw fa-envelope"></i> Contact Us</a>--> 
  <!--<a href="select_final.html"><i class="fa fa-fw fa-square"></i> Categories</a>-->
</div>

<div class="bg-image">
 <div class="bg-text">
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
$ev_id=$_POST['evn'];

$s = "select N_event_id from np_event";
$s1 = "select P_event_id from p_event";
$result = mysqli_query($con, $s);
$result1 = mysqli_query($con,$s1);
#$num = mysqli_num_rows($result);
$track_np=0;
while($row6=mysqli_fetch_assoc($result))
{
	$evid=$row6["N_event_id"];
	if($ev_id==$evid)
	{
		$track_np=1;
		break;
	}
}

$track_p=0;
while($row7=mysqli_fetch_assoc($result1))
{
	$evid=$row7["P_event_id"];
	if($ev_id==$evid)
	{
		$track_p=1;
		break;
	}
}

if($track_np==1)
{
	$q4="select N_event_name from np_event where N_event_id='$ev_id'";
	$res4=mysqli_query($con,$q4);
	$row1=mysqli_fetch_assoc($res4);
	echo "<center><h2>".$row1['N_event_name']."</h3></center><hr/>";
	
	$q1="select count(distinct(teamname)) as c from group_members_project,np_event where N_event_id='$ev_id' and event_id5=N_event_id";
	$res1=mysqli_query($con,$q1);
	$row4=mysqli_fetch_assoc($res1);
	echo "<center><p >Number of Teams Participating:".$row4['c']."</p></center>\n";
	
	$q = "select P_member_id,P_member_name,teamname from group_members_project where event_id5='$ev_id'";
	$res=mysqli_query($con,$q);

	echo "
	
	<center><table>
	<center><caption>Participant list</caption></center>
		<tr>
		<th>Name<br/><br/></th>
		<th>ID<br/><br/></th>
		<th>Teamname</br></br></th>
		</tr></center>";
	while($row=mysqli_fetch_assoc($res))
	{
		echo "<tr>
		
		<td><br/>".$row["P_member_name"]."</td>
		<td>".$row["P_member_id"]."</td>
		<td>".$row["teamname"]."</td>
		</tr>";
	}
	

	
	$q6="SELECT winner_name,rank_secured,prize_amt from prizes where event_id2='$ev_id'";
	$res6=mysqli_query($con,$q6);

	echo "<div><table>
	<center><caption >List of Winners</caption></center><center>
		<tr>
		<th>Name<br/><br/></th>
		<th>Rank_Secured<br/><br/></th>
		<th>Prize_Amount</br></br></th>
		</tr></center></div>";
	
	while($row3=mysqli_fetch_assoc($res6))
	{
		echo "<tr>
		<td><br/>".$row3["winner_name"]."</td>
		<td>".$row3["rank_secured"]."</td>
		<td>".$row3["prize_amt"]."</td>
		</tr>";
	}
	echo "<br/>";
	
	//$q2="select sum(prize_amt) as s from prizes where event_id2='$ev_id' group by N_event_id";
	//$res2=mysqli_query($con,$q2);
	//$row4=mysqli_fetch_assoc($res2);
	//echo "Amount spent on prizes:".$row4['s']."/n";
	
}
else
{
	$q5="select P_event_name from p_event where P_event_id='$ev_id'";
	$res5=mysqli_query($con,$q5);
	$row2=mysqli_fetch_assoc($res5);
	echo "<div class='ash'>".$row2['P_event_name'];
	
	$q3="select sum(no_of_tickets) as s from ticket,booking,p_event where student_id=student_id1 and event_id6=P_event_id and P_event_id='$ev_id'";
	$res3=mysqli_query($con,$q3);
	$row10=mysqli_fetch_assoc($res3);
	echo " : Total Number of Tickets Sold:".$row10['s']."</div></br>";
}
?>

</div>
</div>
</body>
</html>


<!--/*4.total no of tickets sold for each event*/
select sum(no_of_tickets) from ticket,booking,p_event where student_id=student_id1 and event_id6=P_event_id and P_event_name='Amittrivedi';

/* 5.total number of groups participating in a non payable event say pes pubg tounament*/
select count(distinct(teamname)) from group_members_project,np_event where N_event_name='Pes Pubg Tournament' and event_id5=N_event_id;

/*7.Total amount spent on prizes for each event*/
select N_event_name,sum(prize_amt) from prizes,np_event where N_event_id=event_id2 group by N_event_name;-->