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
	background-image: url("img/earp.jpg");
 
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
</style>
</head>
<body>
<div class="navbar">
  <a class="active" href="events1.php"><i class="fa fa-fw fa-home"></i> Home</a> 
 
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
$id=$_SESSION['id'];
//echo $id;
$q="select P_event_name as e from p_event,booking where P_event_id=event_id6 and student_id1='$id'
UNION
select N_event_name as e from np_event,group_members_project where N_event_id=event_id5 and P_member_id='$id'";

$result1=mysqli_query($con,$q);
echo "<center><h1>YOUR PARTICIPATION DETAILS</h1></center><br>";
echo "<center><table>
		<tr>
		<th>events you have registered for<br/></th>
		</tr></center>";

while($row= mysqli_fetch_assoc($result1))
	{
			echo "<tr>
			<td>".$row["e"]."</td>
			</tr>";
			
	}
	
?>

<input class='button button3' onclick='location.href="buy.html"' type='button' value='Buy more tickets' />

<input class='button button3' onclick='location.href="cancel.html"' type='button' value="cancel team's participation" />
<br>
</body>
</html>
	



