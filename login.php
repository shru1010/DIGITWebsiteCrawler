<?php
    // Requiring connect.php file for DB access.
    require_once('connection.php');
		//cookie is set
    if(isset($_COOKIE["login"])){
      header('Location: home.php');
    }
    // user authentication
    if(!empty($_POST["usr"]))
    {
	    $username = $_POST['usr'];
			$password = sha1($_POST['pwd']);
      //admin
			session_start();
			$_SESSION['username'] = $_POST['usr'];
			$_SESSION['password'] = $_POST['pwd'];

			$admin = 'admin';
			$admin_password = sha1('admin123');

			if( $admin == $username && $admin_password == $password)
			{
        //remember me redirect to admin
      	if(!empty($_POST['remember']))
					{
						setcookie("login","true",time() + 86400);
						echo "<script>alert('Login Successful!')</script>";
        		echo '<script>window.location.replace("admin.php")</script>';
					}
					else{
						echo "<script>alert('Login Successful! But click on REMEMBER ME!')</script>";
        		echo '<script>window.location.replace("login.php")</script>';
					}
				}
			else
			{
        //check username is correct
				$sql = "select * from users where username = '$username' and password = '$password'";
	    	$result = mysqli_query($connect, $sql);
	    	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	    	$count = mysqli_num_rows($result);
        //remember me
	  	  if($count){
					if(!empty($_POST['remember']))
					{
						setcookie("login","true",time() + 86400);
						echo "<script>alert('Login Successful!')</script>";
        		echo '<script>window.location.replace("home.php")</script>';
					}
					else{
						echo "<script>alert('Login Successful! But click on REMEMBER ME!')</script>";
        		echo '<script>window.location.replace("login.php")</script>';
					}
    		}
    		else{
        	echo '<script>alert("Login failed. Invalid username or password.")</script>';
        	echo '<script>window.location.replace("login.php")</script>';
				}
    	}
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>User Log In</title>
	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<script src="login.js"></script>
 	</head>

<body style="background-color:lightgrey;"><br><br><br><center>
 	<h1><big><u>LOG IN</u></big></h1>
 <!-- form-->
  <form name="F" action="login.php" onsubmit="return validation()" method="POST">
   	<table>
   		<tr>
     		<td>
     			<br>Username:
     		</td>
     		<td>
     			<br><input type="text" name="usr"><br>
     		</td>
     	</tr>
   		<tr>
   			<td>
   				<br>Password:
   			</td>
   			<td>
   				<br><input type="password" id = "pwd" name="pwd"><br>
   			</td>
   		</tr>
			<tr>
				<td colspan="2"><br><center><input type="checkbox" onclick="pass()"> Show Password</center></td>
			</tr>
       <tr>
	     	<td colspan="2">
        	<br><center><input type="checkbox" id="remember" name="remember"> Remember me</center>
        </td>
      </tr>
     	<tr>
   			<td colspan="2">
   				<br><center><input type="submit" value="Login" name='login'></center>
   			</td>
   		</tr>
   	</table>
    <br><p>Not a user?<a href="registration.php"> Register Here.</a></p>
  </form>
	</center>
</body>
</html>
