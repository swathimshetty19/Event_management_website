<html>
	<head>
		<title> User Login and Registration </title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		
	</head>

	<body>

	
<?php
$e_n=$_POST['ename'];
echo $e_n;
echo "

	<div class='container'>
	<br><br>
		<div class='login-box'>
		<div class='row'>
		<div class='col-md-6 login-right'>
			<h2> Register Here </h2>
			<form action='oform(p).php' method='post'>
				<div class='form-group'>
				<label> Name:</label>
				<input type='text' name='user1' class='form-control' required>
				</div>
				
				<div class='form-group'>
				<label> ID:</label>
				<input type='text' name='id1' class='form-control' required>
				</div>
			
				<div class='form-group'>
				<label> Phone number:</label>
				<input type='text' name='number' class='form-control' required>
				</div>
				
				<div class='form-group'>
				<label> Email Id:</label>
				<input type='email' name='email' class='form-control' required>
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