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
  <a class="active" href="adminpage.php"><i class="fa fa-fw fa-home"></i> Home</a> 
 
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
$q="select * from stalls";

$result1=mysqli_query($con,$q);

echo "<center><h1>Stall Details</h1></center><br>";
echo "<center><table>
		<tr>
		<th>Stall name<br/></th>
		<th>Venue<br/></th>
		<th>Rent<br/></th>
		<th>Fest<br/></th>
		<th>Edit rent<br/></th>
		</tr></center>";

while($row= mysqli_fetch_assoc($result1))
	{$name=$row["stall_name"];
	$venue=$row["S_venue"];
	$rent=$row["stall_rent"];
	$fid=$row['fest_id3'];
	$j="select fest_name from fest where fest_id='$fid'";
	$res=mysqli_query($con,$j);
	while($row1= mysqli_fetch_assoc($res))
	{
		$fname=$row1["fest_name"];
	}
	//session_start();
	
			echo "<tr>
			<td>".$name."</td>
			<td>".$venue."</td>
			<td>".$rent."</td>
			<td>".$fname."</td>
			<form action='editrent.html' method='post'>
			<input type='hidden' name='a' >
			<td><button class='button button3' type='submit'>Update rent</button></td></form>
			</tr>";
			
	}
	
?>

</body>
</html>
	



