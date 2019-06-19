<html>
	<head>
		<title> User Login and Registration </title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		
	</head>

	<body>

	
<?php
$e_n=$_POST['ename'];
//echo $e_n;
echo "

	<div class='container'>
	<br><br>
		<div class='login-box'>
		<div class='row'>
		<div class='col-md-6 login-right'>
			<h2> Register Here </h2>
			<form action='sform_team(p).php' method='post'>
				<div class='form-group'>
				<label> TeamMember1 Name:</label>
				<input type='text' name='user1' class='form-control' required>
				</div>
				
				<div class='form-group'>
				<label> TeamMember1 ID:</label>
				<input type='text' name='id1' class='form-control' required>
				</div>
				
				<div class='form-group'>
				<label> TeamMember2 Name:</label>
				<input type='text' name='user2' class='form-control' required>
				</div>
				
				<div class='form-group'>
				<label> TeamMember2 ID:</label>
				<input type='text' name='id2' class='form-control' required>
				</div>
				
				<div class='form-group'>
				<label> TeamMember3 Name:</label>
				<input type='text' name='user3' class='form-control'>
				</div>
				
				<div class='form-group'>
				<label> TeamMember3 ID:</label>
				<input type='text' name='id3' class='form-control'>
				</div>
				
				<div class='form-group'>
				<label> Team Name:</label>
				<input type='text' name='tname' class='form-control' required>
				</div>
			
				<input type='hidden' name='a' value=$e_n>
				<button type='submit' class='btn btn-primary'> Register </button>
			</form>
			</div>
		</div>
		

		
		</div>
		
	</div>"
?>
</body>
</html>