<?php
	//INCLUDING connect.php for database access.
	include_once('connection.php');

	if(!empty($_POST["username"]))
	{
		// initialising variables.
		$username=$_POST['username'];
		$password=sha1($_POST['password']);
		$email=$_POST['email_id'];

//Check DB for existing user with same usrnm.

		$sql = "SELECT * FROM users WHERE username='$username'";
		$res = mysqli_query($connect, $sql);
		$count = mysqli_num_rows($res);

		if($count)
		{
			echo "Username already exists!";
		}
//If no error, then register.
		else
		{
			$query = "INSERT INTO users VALUES ('$username','$password','$email')";
			mysqli_query($connect, $query);
			echo "<script>alert('Succesful Registration! Username: $username and Email ID: $email')</script>";
			echo '<script>window.location.replace("home.php")</script>';
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>User Registration</title>
	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <!-- VALIDATION FUNCTION using JAVASCRIPT.  -->
	 <script src="register.js"></script>
	 
	</head>

<body style="background-color:lightgrey;">
	<br><br><br>
	<center>
		<h1><big><u>REGISTER </u></big></h1>
 	<!-- FORM TAG -->
   	<form name="F" action="register.php" method="POST" onsubmit="return validation()">
   	<!-- TABLE tag to structure elements -->
   		<table>
   			<tr>
   				<td>
   					<br><label for="username">Username: </label>
   				</td>
   				<td>
   					<br><input type="text" id="username" name="username" /><br>
   				</td>
   			</tr>
    		<tr>
    			<td>
    				<br><label for="password">Password: </label>
    			</td>
    			<td>
    				<br><input type="password" id="password" name="password"><br>
    			</td>
				</tr>
				<tr>
					<td colspan="2"><br><center><input type="checkbox" onclick="pass()"> Show Password</center></td>
				</tr>
				<tr>
					<td>
						<br><label for="email">Email ID: </label>
					</td>
					<td>
						<br><input type="email" id="email_id" name="email_id"><br>
					</td>
				</tr>
				<tr>
					<td colspan="2"><center><br><input type="submit" value="Register" name="register"></center></td>
				</tr>
			</table>
	<!-- LINK to go to LOGIN PAGE. -->
     	<p><br>Already a user?<a href="login.php"> Log in</a></p>
		</form>
	</center>
</body>
</html>
