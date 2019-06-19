<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<link rel="icon" href="img/log.jpg" type="image/jpg" sizes="16x16">
	<title>Home</title>
	<script>
	function fun(){
	
	</script>
	
	<style>
	body{
		background-color:#f4f4f4;
		color:#555;
		font-family:Arial, Helvetica, sans-serif;
		font-size:16px;
		line-height:1.6em;
		margin:0;
	}

	.container{
		width:80%;
		margin:auto;
		overflow:hidden;
		padding-bottom:0px;
	}

	.container1{
		width:100%;
		padding:0;
		margin:auto;
		overflow:hidden;
	}

	#text{
		line-height: 20px;
		color:black;
		width: 80%;
		margin:auto;
		overflow:hidden;
	}

	#text a:link{
		text-decoration: none;
		color: blue;
	}

	#text a:hover{
		text-decoration: underline;
	}

	#text a:visited{
		color: purple;
	}

	#text input[type="text"]{
		width: 60%;
		padding: 10px 5px;
		text-align: center;
	}

	#text input[type="submit"]{
		padding:10px 15px;
		background-color: #333;
		color: white;
		font-size: 16px;
		border: none;
	}

	#main-header{
		background-color:rgb(250, 106, 23);
		color:#fff;
	}

	#navbar{

		background-color:#333;
		color:#fff;
	}

	#navbar ul{
		padding:0;
		list-style: none;
		margin-top:10px;
		margin-bottom: 10px;
		margin-left:10px;
	}

	#navbar li{
		display:inline;
	}

	#navbar a{
		margin-right: -4px;
		color:#fff;
		text-decoration: none;
		font-size:18px;
		padding-left: 20px;
		padding-bottom: 20px;
		padding-top: 20px;
		padding-right: 20px;
	}

	#navbar a:hover{
		background-color: #787676;
		padding-left: 20px;
		padding-bottom: 20px;
		padding-top: 20px;
		padding-right: 20px;
	}

	#navbar .current{
		color: black;
		background-color: white;
	}

	#showcase{
		background-image:url('img.png');
		background-position:center right;
		min-height:300px;
		margin-bottom:0px;
		text-align: center;
	}

	#showcase h1{
		color:#fff;
		font-size:50px;
		line-height: 1.6em;
		padding-top:30px;
	}

	.container1 img{
		transition: 0.4s ease-in-out;
	}

	.container1 img:hover{
		box-shadow: -7px 7px 30px rgb(56, 54, 54);

	}

	#main{
		background-image:url('img.png');
		background-repeat: no-repeat;
		background-size: cover;
		float:left;
		width:100%;
		padding: 10px 10px;
		box-sizing: border-box;
	}

	#main ul{
		display: inline block;
		width:95%;
		list-style: none;
		line-height:50px;
		text-align: center;
	}

	#main img{
		height: 360px;
		width: 80%;
	}

	#main-footer{
		width: 98.4%;
		background: #333;
		color:#fff;
		padding: 10px;
	}
	.footer{
			float: left;
			text-align: center;
			width: 33.3%;
			padding: 10px;
			border-right: 1px solid white;
			box-sizing: border-box;
	}

	#main-footer #abc{
		border: none;
	}

	#main-footer .copyright{
		text-align:right;
		padding-top: 0px;
		font-size: 20px;
	}

	@media(max-width:600px){
		#main{
			width:100%;
			float:none;
		}

		#sidebar{
			width:100%;
			float:none;
		}
	}

	#main li{
		display:inline;
		line-height: 5px;
		padding: 20px;
	}
	#icons img{

		width: 290px;
		height: 290px;

	}
	img{
		border-radius: 200px;
		transition: 0.4s ease-in-out;
	}

	img:hover{
		box-shadow: -7px 7px 40px rgb(56, 54, 54);
	}
	</style>
</head>
<body>
	<header id="main-header">
		<div class="container1">
			<marquee direction="right-left"><h1>ELEVATE YOUR PULSE OF PASSION !!</h1></marquee>
		</div>
	</header>

	<nav id="navbar">
		<div class="container">

				<ul>
					<li><a class="current" href="events1.html">Home</a></li>
					<li><a  href="#">Services</a></li>
					<li><a href="#">Contact</a></li>
					<li><a href="#">FAQ</a></li>
					<li><a href="sinfo.php"> Participation Details</a><li>
					<li><a href="logout.php"> Logout</a><li>
				</ul>

		</div>
	</nav>
	<div class="container1>
		<div id="container">
			<section id="main">
				<div>&nbsp</div>
				<ul id="icons">
				
				<li><form method="post" action="sticket.php">
				<input type="hidden" name="ename" value="pesev1001">
				<img src="img/at.png" alt="ERROR">
				<button type="submit" class="btn btn-primary"> Buy </button>
				</form></li>
				
				<li><form method="post" action="sticket.php">
				<input type="hidden" name="ename" value="pesev1009">
				<img src="img/tres.jpeg" alt="ERROR">
				<button type="submit" class="btn btn-primary"> Buy </button>
				</form></li>
				
				</ul>
				
				<ul id="icons">
				
				<li><form method="post" action="sform_team.php">
				<input type="hidden" name="ename" value="pesev1004">
				<img src="img/crypt.png" alt="ERROR">
				<button type="submit" class="btn btn-primary"> Register </button>
				</form></li>
				
				<li><form method="post" action="sticket.php">
				<input type="hidden" name="ename" value="pesev1002">
				<img src="img/varun.png" alt="ERROR">
				<button type="submit" class="btn btn-primary"> Buy </button>
				</form></li>

				
				<li><form method="post" action="sform_team.php">
				<input type="hidden" name="ename" value="pesev1005">
				<img src="img/pubg.jpg" alt="ERROR">
				<button type="submit" class="btn btn-primary"> Register </button>
				</form></li>
				
				<li><form method="post" action="sform_team.php">
				<input type="hidden" name="ename" value="pesev1006">
				<img src="img/taalent.jpeg" alt="ERROR">
				<button type="submit" class="btn btn-primary"> Register </button>
				</form></li>
				
				<li><form method="post" action="sform_team.php">
				<input type="hidden" name="ename" value="pesev1010">
				<img src="img/epsi.jpg" alt="ERROR">
				<button type="submit" class="btn btn-primary"> Register </button>
				</form></li>
				
				</ul>
				<ul id="icons">
				
				<li><form method="post" action="sform_team.php">
				<input type="hidden" name="ename" value="pesev1012">
				<img src="img/ideathon.jpg" alt="ERROR">
				<button type="submit" class="btn btn-primary"> Register </button>
				</form></li>
				
				<li><form method="post" action="sform_team.php">
				<input type="hidden" name="ename" value="pesev1007">
				<img src="img/net.jpeg" alt="ERROR">
				<button type="submit" class="btn btn-primary"> Register </button>
				</form></li>
				
				<li><form method="post" action="sform_team.php">
				<input type="hidden" name="ename" value="pesev1003">
				<img src="img/dot.png" alt="ERROR">
				<button type="submit" class="btn btn-primary"> Register </button>
				</form></li>
				
				<li><form method="post" action="sform_team.php">
				<input type="hidden" name="ename" value="pesev1008">
				<img src="img/prak.jpeg" alt="ERROR">
				<button type="submit" class="btn btn-primary"> Register </button>
				</form></li>
				
				<li><form method="post" action="sticket.php">
				<input type="hidden" name="ename" value="pesev1011">
				<img src="img/data.jpg" alt="ERROR">
				<button type="submit" class="btn btn-primary"> Buy </button>
				</form></li>
				
				<li><form method="post" action="stall.php">
				<input type="hidden" name="ename" value="stall">
				<img src="img/stall.jpg" alt="ERROR">
				<button type="submit" class="btn btn-primary"> Register</button>
				</form></li>
				
				</ul>
			</section>
		</div>
	</div>
	<footer id="main-footer">
		<div>
			&nbsp
		</div>
		<div class="footer">
			<h3>ABOUT US!</h3>
			<p> EVENT MANAGEMNT TEAM OF PESU PRESENT TO YOU NEW AND A BETTER WAY TO STAY TUNED TO ALL THE FEST HAPPENNING AROUND AND TO REGISTER HASSLE-FREE </p>
		</div>
		<div class="footer">
			<h3>TECH PARK,PES UNIVERSITY</h3>
			<p>RR CAMPUS,OUTER RING ROAD,BANSHANKRI 3RD STAGE,BENGALURU,KARNATAKA-560085</p>
		</div>
		<div class="footer" id="abc">
			<h3>FOLLOW US TO STAY TUNED!!</h3>
		

			<a href="https://www.facebook.com/"><img src="img/facebook.jpg" alt="error" style="width:42px;height:42px;border:0;"></a>
			<a href="https://www.instagram.com/"><img src="img/insta.jpg" alt="error" style="width:42px;height:42px;border:0;"></a>
			<a href="https://www.twitter.com/"><img src="img/twitter.jpg" alt="error" style="width:42px;height:42px;border:0;"></a>
	
			
		</div>
		
		<div class="copyright">
			<p>Copyright@EVENT MANAGEMENT TEAM </p>
		</div>
	</footer>
</body>
</html>
events1.php
