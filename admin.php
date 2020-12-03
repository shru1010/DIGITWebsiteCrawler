<?php
	//including connect.php for database
  include_once('connection.php');

  if(!isset($_COOKIE["login"]))
    {
      header('Location: login.php');
  }

	if(!empty($_POST["username"]) && !empty($_POST["password"]))
	{
		// initialising vars
		$username=$_POST['username'];
		$password=sha1($_POST['password']);
		$email=$_POST['email_id'];

//Check db for existing user with for same usrname

		$sql = "SELECT * FROM users WHERE username='$username'";
		$res = mysqli_query($connect, $sql);
		$count = mysqli_num_rows($res);
//print alert if usrname does exist
		if($count)
		{
			echo "<script>alert('Username already exists!')</script>";
		}
//If no error, then register.
		else
		{
			$query = "INSERT INTO users VALUES ('$username','$password','$email')";
			mysqli_query($connect, $query);
			echo "<script>alert('Succesful Insertion! Username: $username and Email ID: $email')</script>";
    }
  }
  //check for delete
  if(!empty($_POST["usrnm"]))
  {
    $username=$_POST['usrnm'];

    $sql = "SELECT * FROM users WHERE username='$username'";
		$res = mysqli_query($connect, $sql);
		$count = mysqli_num_rows($res);

		if($count)
		{
			$query = "DELETE FROM users WHERE username='$username'";
			mysqli_query($connect, $query);
      echo "<script>alert('Succesful Deletion!')</script>";
    }
    else
    {
      echo "<script>alert('USER already deleted')</script>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  /*start session from login for admin*/
    session_start();
    $usr = $_SESSION['username'];
    $pwd = $_SESSION['password'];

    if($usr != "admin" && $pwd != "admin123")
    {
      header('Location: home.php');
    }
    else{

    }
  ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- bootstrap-->
  <link rel="stylesheet" href="bootstrap-4.2.1-dist/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="bootstrap-4.2.1-dist/js/bootstrap.min.js"/>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <link rel="shortcut icon" href="../images/admin.png" type="image/icon"/>
  <script src="admin.js"></script>
  <link rel="stylesheet" href="admin.css">
  <title>ADMIN PAGE</title>
<!-- style tag-->
  <style>
    button
    {
      position: relative;
      margin-top:30px;
    }
  </style>
</head>

<body>
  <!--nav bar -->
	<ul>
		<li><h1>DIGIT Website Crawler</li>
		<li><a class="navbar" href="home.php">Home</a></li>
		<li><a class="navbar" href="about.php">About Me</a></li>
		<li><a class="navbar" href="contact.php">Contact Us</a></li>
		<li style="float:right;"><a  class="navbar" href="logout.php">Logout</a></li>
	</ul>
  <center>
    <!-- options that an admin can use-->
    <h4><br>Click on any of the buttons to make changes in User Table</h4>
    <button type='submit'  class="btn btn-primary" onclick="display()">Show the user_log</button>
    <button type='button' class="btn btn-primary" onclick="update()">Add a User</button>
    <button type='button' class="btn btn-primary" onclick="del()">Delete a User</button>
    <form name="F" method="POST">
      <div id="display" style="display:none;"><br>
        <table id="disp_table">
          <tr class="disp_tr">
            <th class="disp_th">Username</th>
            <th class="disp_th">Password</th>
            <th class=disp_th>Email-ID</th>
          </tr>
          <!-- querying data from database to display-->
          <?php
            $sql = "SELECT * FROM users";
            $result = mysqli_query($connect, $sql);

            while($rows=$result->fetch_assoc())
            {
          ?>
          <tr class="disp_tr">
        <!--getting daata from each cell -->
            <td class="disp_td"><?php echo $rows['USERNAME'];?></td>
            <td class="disp_td"><?php echo $rows['PASSWORD'];?></td>
            <td class="disp_td"><?php echo $rows['EMAIL'];?></td>
          </tr>
          <?php
             }
          ?>
        </table>
      </div>
    </form>
    <!--form -->
    <form name="F1" onsubmit="return validate()" method="POST">
      <div id="update" style="display:none;">
        <table>
    		  <tr>
    			  <td>
    				  <br><label for="username">Username: </label>
    			  </td>
    			  <td>
    				  <br><input type="text" id="usertname" name="username" /><br>
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
					  <td colspan="2"><br><center><input type="checkbox" onclick="pw_vis()"> Show Password</center></td>
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
      		  <td colspan="2">
    	  		  <br><center><input type="submit" value="Add" name='add'></center>
    		    </td>
     		  </tr>
        </table>
      </div>
    </form>

    <form name="F2" onsubmit="return validate_del()" method="POST">
    <div id="delete" style="display:none;">
    <table>
    		<tr>
    			<td>
    				<br><label for="username">Username: </label>
    			</td>
    			<td>
    				<br><input type="text" id="usrnm" name="usrnm" /><br>
    			</td>
    			</tr>
          <tr>
    			  <td colspan="2">
    				  <br><center><input type="submit" value="Delete" name='delete'></center>
    			  </td>
     		  </tr>
        </table>
    </div>
    </form>
  </center>
</body>
</html>
