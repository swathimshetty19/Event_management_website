<html>
<head>

<style>
body{
	background-image: url("imgg16.jpeg");
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
  background-color: #4CAF50;
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

th {
    background-color: #00ff00;
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
</style>
</head>
<body>
<div class="navbar">
  <a class="active" href="homepage1.html"><i class="fa fa-fw fa-home"></i> Home</a> 
  <a href="select_final.html"><i class="fa fa-arrow-left"></i> back</a>
  <!--<a href="#"><i class="fa fa-fw fa-envelope"></i> Contact Us</a>--> 
  <!--<a href="select_final.html"><i class="fa fa-fw fa-square"></i> Categories</a>-->
</div>

<?php

/*<?php include 'header.php'; ?><style><?php include 'CSS/main.css'; ?></style>
<?php> echo '<head><link rel="stylesheet" type="text/css" href="main.css"></head>'; ?>
<?php> include('main.css'); ?>*/

#checking for connection
$servername="localhost";
$username="root";
$password="";
$dbname="userregistration";

$conn=mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){
	die9("connection failed:".mysqli_connect_error());
}
$sql="SELECT * FROM cart1";
$sq="SELECT itemname FROM cart1";
$result=mysqli_query($conn,$sql);
echo mysqli_num_rows($result);
$res=mysqli_query($conn,$sq);
$iname= $_POST['iname'];
$price=$_POST['price'];
$quan=$_POST['quan'];
if($quan==NULL)
{
	$quan=0;
}
$tot=($price-0)*($quan-0);
echo mysqli_num_rows($result);
if(mysqli_num_rows($result)==0)
{

$query="INSERT INTO cart1(itemname,cost,quantity,total) VALUES('$iname','$price','$quan','$tot')";
if(mysqli_query($conn,$query)){
	}
else
{
	echo "Error:".$sql."<br/>".mysqli_error($conn);
}
}
else
{
	$track=0;
	while($row=mysqli_fetch_assoc($res))
	{
		$riname=$row["itemname"];
		if($iname==$riname)
		{
			$track=1;
			break;
		}
	}
	if($track==1)
	{
		if($quan==0)
		{
			$query3="DELETE FROM cart1 WHERE itemname='$riname'";
			if(mysqli_multi_query($conn,$query3)){
			}
			else
			{
				echo "Error:".$sql."<br/>".mysqli_error($conn);
			}
		}	
		$query1="UPDATE cart1 SET quantity='$quan' WHERE itemname='$riname';";
		$query1 .="UPDATE cart1 SET total='$tot' WHERE itemname='$riname'";
		if(mysqli_multi_query($conn,$query1)){
			}
		else
		{
			echo "Error:".$sql."<br/>".mysqli_error($conn);
		}
	}
	else
	{
		$query2="INSERT INTO cart1(itemname,cost,quantity,total) VALUES('$iname','$price','$quan','$tot')";
		if(mysqli_multi_query($conn,$query2)){
			}
		else
		{
			echo "Error:".$sql."<br/>".mysqli_error($conn);
		}
	}
}
mysqli_close($conn);
$conn=mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){
	die("connection failed:".mysqli_connect_error());
}

$tamt=0;
$sq2="SELECT * FROM cart1";
$result1=mysqli_query($conn,$sq2);
echo "<center><h1>MY CART</h1></center>";
echo "<center><table>
		<tr>
		<th>item name<br/><br/></th>
		<th>cost<br/><br/></th>
		<th>quantity<br/><br/></th>
		<th>total<br/><br/></th>
		</tr></center>";
while($row= mysqli_fetch_assoc($result1))
	{
		$tamt=$tamt+$row["total"];
		echo "<tr>
			<td><br/>".$row["itemname"]."</td>
			<td>".$row["cost"]."</td>
			<td>".$row["quantity"]."</td>
			<td>".$row["total"]."</td>
			</tr>";
	}
echo "<br/><b style='font-size:20px'>total cost is:<b>".$tamt;
echo "<br/><input class='button button3'onclick='history.go(-1)' type='button' value='keep shopping'/>";
mysqli_close($conn);
?>
<input class='button button3' onclick='location.href="payment.html"' type='button' value='order now' />
</body>
</html>