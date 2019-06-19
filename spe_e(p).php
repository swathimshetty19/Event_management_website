<html>
<head>

<style>
body{
	background-image: url("img/earp.jpg");
	 
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
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

tr:nth-child(even){background-color: #f2f2f2}

tr:nth-child(odd){background-color: #fffdd0}
th {
    background-color: maroon;
    color: white;
}

.button {
    background-color: maroon; 
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
</style>
</head>
<body>
<div class="navbar">
  <a class="active" href="adminpage.php"><i class="fa fa-fw fa-home"></i> Home</a> 
  <a href="adminpage.php"><i class="fa fa-arrow-left"></i> back</a>
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
$ev_n=$_POST['ev_name'];
//echo $ev_n;
session_start();
$_SESSION['evnm']=$ev_n;
$s = "select N_event_name,N_event_id from np_event";
$s1 = "select P_event_name,P_event_id from p_event";
$result = mysqli_query($con, $s);
$result1 = mysqli_query($con,$s1);
#$num = mysqli_num_rows($result);
$track_np=0;
while($row6=mysqli_fetch_assoc($result))
{   
	
	$evn=$row6["N_event_name"];
	if($ev_n==$evn)
	{
		$track_np=1;
		$ev_id=$row6["N_event_id"];
		//echo $ev_id;
		break;
	}
}

$track_p=0;
while($row7=mysqli_fetch_assoc($result1))
{
	$evn=$row7["P_event_name"];
	if($ev_n==$evn)
	{
		$track_p=1;
		$ev_id=$row7["P_event_id"];
		//echo $ev_id;
		break;
	}
}

if($track_np==1)
{

	echo "<center><h2>".$ev_n."</h3></center>";
	
	echo "<center><form action='update_prizes.html' method='post'>
	<input type='hidden' name='ev_id' value='$ev_id'/>
	<button type='submit' class='button button3'>update prizes</button>
	</form></center>";
	
	
	
	$q="SELECT org_name,org_id from organiser where org_id IN( SELECT org_id2 from organise_n where event_id4='$ev_id')";
	$res=mysqli_query($con,$q);
	
	echo "<center><table>
	<caption><h2>Organiser List</h2></caption>
		<tr>
		<th>Name<br/><br/></th>
		<th>ID<br/><br/></th>
		</tr></center>";
	while($row=mysqli_fetch_assoc($res))
	{
		echo "<tr>
		<td><br/>".$row["org_name"]."</td>
		<td>".$row["org_id"]."</td>
		</tr>";
	}
	
	$q1="select sum(amount) as sp from sponsorer where sponsored_event='$ev_n'";
	$res1=mysqli_query($con,$q1);
	$row1=mysqli_fetch_assoc($res1);
	if($row1['sp']=="")
	{
		echo "<center><h3>Amount sponsored for this event:0Rs</h3></center>";
	}
	else
	{
		echo "<center><h3>Amount sponsored for this event:".$row1['sp']."Rs</h3></center>";
	}
	
	$q2="select count(distinct(teamname)) as c from group_members_project,np_event where N_event_name='$ev_n' and event_id5=N_event_id";
	$res2=mysqli_query($con,$q2);
	$row2=mysqli_fetch_assoc($res2);
	if($row2['c']=="")
	{
		echo "<center><h3>Number of teams participating:0</h3></center>";
	}
	else
	{
		echo "<center><h3>Number of teams participating:".$row2['c']."</h3></center>";
	}
}
else{

	echo "<center><h2>".$ev_n."</h3></center>";
	
	echo "<center><form action='update_price.html' method='post'>
	<input type='hidden' name='ev_id' value='$ev_id'/>
	<button type='submit' class='button button3'>update price</button>
	</form></center>";
	
	
	
	$q="SELECT org_name,org_id from organiser where org_id IN( SELECT org_id1 from organise_p where event_id3='$ev_id')";
	$res=mysqli_query($con,$q);
	//echo "<center><h1>Organisers List...</h1></center>";
	echo "<center><table>
	<caption><h2>Organiser List</h2></caption>
		<tr>
		<th>Name<br/><br/></th>
		<th>ID<br/><br/></th>
		</tr></center>";
	while($row=mysqli_fetch_assoc($res))
	{
		echo "<tr>
		
		<td><br/>".$row["org_name"]."</td>
		<td>".$row["org_id"]."</td>
		</tr>";
	}
	
	$q1="select sum(amount) as sp from sponsorer where sponsored_event='$ev_n'";
	$res1=mysqli_query($con,$q1);
	$row1=mysqli_fetch_assoc($res1);
	if($row1['sp']=="")
	{
		echo "<center><h3>Amount sponsored for this event:0Rs</h3></center>";
	}
	else
	{
		echo "<center><h3>Amount sponsored for this event:".$row1['sp']."Rs</h3></center>";
	}
	
	$q2="select sum(no_of_tickets) as c from ticket,booking,p_event where student_id=student_id1 and event_id6=P_event_id and P_event_id='$ev_id'";
	$res2=mysqli_query($con,$q2);
	$row2=mysqli_fetch_assoc($res2);
	if($row2['c']=="")
	{
		echo "<center><h3>Number of tickets sold:0</h3></center>";
	}
	else
	{
		echo "<center><h3>Number of tickets sold :".$row2['c']."</h3></center>";
	}
	
		
	$q3="select sum(price) as s from ticket,booking,p_event where student_id=student_id1 and event_id6=P_event_id and P_event_id='$ev_id'";
	$res3=mysqli_query($con,$q3);
	$row3=mysqli_fetch_assoc($res3);
	if($row3['s']=="")
	{
		echo "<center><h3>Amount gained through tickets:0Rs</h3></center>";
	}
	else
	{
		echo "<center><h3>Number gained through tickets:".$row3['s']."</h3></center>";
	}
}
//one of the row in ticket related to varun thakur is wrong in db!!!
	
?>
</body>
</html>
<!--/*12.nested:display all organisers of a particular fest(to send mails / to call for meetings)*/(a_s=>names)(a_a=>number)(make it for an event)
SELECT org_id,org_name from organiser where org_id IN( SELECT org_id1 from organise_p,fest,p_event where event_id3=P_event_id and fest_id2=fest_id and fest_name='aatmatrisha19' UNION SELECT org_id2 from organise_n,fest,np_event where event_id4=N_event_id and fest_id1=fest_id and fest_name='aatmatrisha19');
BOTH

/*11.If the admin wants to change the ticket price for a payable event(for example stand up tickets increase to 350 from now on)*/(a_s_up)
update p_event set ticket_price=350 where P_event_name='Varun Thakur';
P_EVENT

/*18.filling up the prizes table*/(a_s_up)
SELECT winner_name,rank_secured,prize_amt,N_event_name,N_department,N_event_type,fest_name from np_event,prizes,fest where N_event_id=event_id2 and fest_id=fest_id1;
N_EVENT

/* 5.total number of groups participating in a non payable event say pes pubg tounament*/(a_s)
select count(distinct(teamname)) from group_members_project,np_event where N_event_name='Pes Pubg Tournament' and event_id5=N_event_id;
N_EVENT

/* 3.total no of tickets sold for a payable evnt x say amit trivedi*/(a_s)
select sum(no_of_tickets) from ticket,booking,p_event where student_id=student_id1 and event_id6=P_event_id and P_event_name='Amittrivedi';
P_EVENT

/*1.calculate amnt sponsored for an event( say amittrivedi concert)*/(a_s,sp)
select sum(amount) from sponsorer where sponsored_event='amittrivedi';
BOTH-->