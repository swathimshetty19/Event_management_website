<html>
<head>

<style>

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

th {
    background-color: #00ff00;
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

body, html {
  height: 100%;
  margin: 0;
  font-size: 20px;
}

* {
  box-sizing: border-box;
}

.bg-image {
 
  background-image: url("img/earp.jpg");
  background-image: url("img/earp.jpg"); 
  height: 100%; 
  
  
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
.bg-text {
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0, 0.4); 
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 1;
  width: 40%;
  height:80%;
  padding: 20px;
  text-align: center;
}

</style>
</head>
<body>
<div class="navbar">
  <a class="active" href="evento1.php"><i class="fa fa-fw fa-home"></i> Home</a> 

  
  <!--<a href="#"><i class="fa fa-fw fa-envelope"></i> Contact Us</a>--> 
  <!--<a href="select_final.html"><i class="fa fa-fw fa-square"></i> Categories</a>-->
</div>


<div class="bg-image"></div>

<div class="bg-text">
<form action='oev(p).php' method='post'>
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
 
//$id='pesorg1001';

$q="select P_event_name as e,P_event_id as d from p_event,organise_p where org_id1='$id' and  P_event_id=event_id3 
UNION
select N_event_name as e,N_event_id as d from np_event,organise_n where org_id2='$id' and N_event_id=event_id4";

$res=mysqli_query($con,$q);

$a=array();
$i=1;
while($r=mysqli_fetch_assoc($res))
{
	$a[$i]=$r['e'];
	//echo $a[$i];
	$i++;
}

$q1="select P_event_name as e,P_event_id as d from p_event,organise_p where org_id1='$id' and  P_event_id=event_id3 
UNION
select N_event_name as e,N_event_id as d from np_event,organise_n where org_id2='$id' and N_event_id=event_id4";

$res1=mysqli_query($con,$q1);
$b=array();
$j=1;
while($ro=mysqli_fetch_assoc($res1))
{
	$b[$j]=$ro['d'];
	//echo $b[$j];
	$j++;
}

for($k=1;$k<=count($a);$k++){
?>
</br><input type="radio" name="evn" value="<?php echo $b[$k]?>"><?php echo $a[$k]?> </input></br></br>

<?php } ?>
<button type='submit' class='button button3'>Check Details</button>
</form>

</div>
</body>
</html>