<html>
<head>

<style>
body{
	background-image: url("img/a.jpg");
	 
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
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


$q="select P_event_name as e,P_event_id as d from p_event
UNION
select N_event_name as e,N_event_id as d from np_event;";

$res=mysqli_query($con,$q);

$a=array();
$i=1;
while($r=mysqli_fetch_assoc($res))
{
	$a[$i]=$r['e'];
	//echo $a[$i];
	$i++;
}

$q1="select P_event_name as e,P_event_id as d from p_event
UNION
select N_event_name as e,N_event_id as d from np_event;";

$res1=mysqli_query($con,$q1);
$b=array();
$j=1;
while($ro=mysqli_fetch_assoc($res1))
{
	$b[$j]=$ro['d'];
	//echo $b[$j];
	$j++;
}
$k=1;
//for($k=1;$k<=count($a);$k++){
while($k<=count($a))
{
	$e_name=$a[$k];
	//echo $e_name;
	$e_id=$b[$k];
	//echo $e_id;
	echo "<button type='submit' class='button button3'>Event Name: '$e_name'</button>";
	echo "\n";
	$q1="select sponsored_event,sum(amount) as sp from sponsorer group by sponsored_event having sponsored_event ='$e_name';";
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
	
		$q2="select P_event_name,sum(no_of_tickets) as c from ticket,booking,p_event where student_id=student_id1 and event_id6=P_event_id and P_event_id='$e_id';";
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
	
		
	//$q3="select N_event_name,sum(prize_amt) as r from prizes,np_event where N_event_id=event_id2 group by N_event_name having N_event_id='$e_id'";
	$q3="select sum(prize_amt) as c from prizes where event_id2='$e_id';";
	$res3=mysqli_query($con,$q3);
	$row3=mysqli_fetch_assoc($res3);
	if($row3['c']=="")
	{
		echo "<center><h3>Amount Spent on Prizes:0Rs</h3></center>";
	}
	else
	{
		echo "<center><h3>Amount Spent on prizes:".$row3['c']."Rs</h3></center>";
	}
	
	
	$q4="select P_event_name,sum(price) as c from ticket,booking,p_event where student_id=student_id1 and event_id6=P_event_id and P_event_id='$e_id';";	

	$res4=mysqli_query($con,$q4);
	$row4=mysqli_fetch_assoc($res4);
	if($row4['c']=="")
	{
		echo "<center><h3>Amount gained through tickets:0Rs</h3></center>";
	}
	else
	{
		echo "<center><h3>Amount gained through tickets:".$row4['c']."Rs</h3></center>";
	}
	
	
	$k=$k+1;
}


?>
</body>
</html>