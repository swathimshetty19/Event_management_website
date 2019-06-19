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
	color: maroon;
	
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
//echo $name;
$q="select sponsored_event,amount from sponsorer where spons_name='$name'";
$result1=mysqli_query($con,$q);
echo "<center><h1>YOUR SPONSOR DETAILS</h1></center><br>";
echo "<center><table>
		<tr>
		<th>events you have sponsored for<br/></th>
		<th>Amount<br/></th>
		</tr></center>";
while($row= mysqli_fetch_assoc($result1))
	{
			echo "<tr>
			<td>".$row["sponsored_event"]."</td>
			<td>".$row["amount"]."</td>
			</tr><br/>";
			
	}

	
?>

<input class='button button3' onclick='location.href="sponmore.html"' type='button' value='Sponsor more money' />

<input class='button button3' onclick='location.href="spon_evdetails.php"' type='button' value='Details of events you have sponsored for' />
<br>
</body>
</html>
	
