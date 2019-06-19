<html>
	<head>
		<title> stall registration </title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		
	</head>

	<body>

	
<?php
echo "

	<div class='container'>
	<br><br>
		<div class='login-box'>
		<div class='row'>
		<div class='col-md-6 login-right'>
			<h2> Register Here </h2>
			<form action='stall(p).php' method='post'>
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
				<label> Stall id given by college</label>
				<input type='text' name='id' class='form-control'>
				</div>
				
				<div class='form-group'>
				<label> Stall Name:</label>
				<input type='text' name='sname' class='form-control' required>
				</div>
				
				<div class='form-group'>
				<label> Venue:</label>
				<input type='text' name='venue' class='form-control'>
				</div>
				
				<div class='form-group'>
				<label> Fest:</label>
				<input type='text' name='fest' class='form-control'>
				</div>
				
				<div class='form-group'>
				<label> Rent:</label>
				<input type='text' name='rent' class='form-control'>
				</div>
				
				
			
				
				<button type='submit' class='btn btn-primary'> Register </button>
			</form>
			</div>
		</div>
		

		
		</div>
		
	</div>"
?>
</body>
</html>