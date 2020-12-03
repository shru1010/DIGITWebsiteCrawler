<!DOCTYPE html>

<html lang="en">
	<head>
<!--cookie for the login users info -->
		<?php
    	if(!isset($_COOKIE["login"]))
    	{
      	header('Location: login.php');
    	}
  	?>
<!-- Including necessary links and files. -->
		<meta charset="UTF-8">
		<title>About Page</title>
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="about.js"></script>
		<link rel="stylesheet" type="text/css" href="about.css">
<!-- style tag for the page-->
		<style type="text/css">
			.body{
				background-color: #c6fced;
			}
			div {
				font-size: 22px;
				font-color:#393e46;
			}
			.item3 {
				display: none;
			}
		</style>
	</head>
	<body class="body">
		<!-- about me heading and info about creator Shruti PAtchigolla-->

		<!--nav bar -->
		<ul>
    <li><h1>DIGIT Website Crawler</h1></li>
    <li><a  class="navbar" href="logout.php">Logout</a></li>
    <li><a class="navbar" href="contact.php">Contact Us</a></li>
    <li><a class="navbar" href="about.php">About Me</a></li>
		<li><a class="navbar" href="home.php">Home</a></li>
		</ul>
		<div class="wrapper">
			<!-- headings-->
  		<div class="item1"><br>Shruti Patchigolla</div>
  		<div class="frame item2">
  			<a href="#" onclick="disp('obj'); this.style.color='#133b5c';">Objective</a><br><br>
  			<a href="#" onclick="disp('p_info'); this.style.color='#133b5c';">Personal Information</a><br><br>
  			<a href="#" onclick="disp('f_info'); this.style.color='#133b5c';">Family Information</a><br><br>
  			<a href="#" onclick="disp('ed_info'); this.style.color='#133b5c';">Education Information</a><br><br>
  			<a href="#" onclick="disp('exp'); this.style.color='#133b5c';">Experience</a><br><br>
  			<a href="#" onclick="disp('ach'); this.style.color='#133b5c';">Achievements</a><br><br>
  			<a href="#" onclick="disp('other'); this.style.color='#133b5c';">Other</a>
  		</div>
<!-- info about Shruti-->
  		<div class="frame item3" id="obj"><br><br><br><br><br>Web Developer</div>
  		<div class="frame item3" id="p_info"><br><br><br><br>DOB: 10th October 2000<br>Place fo birth: Denver,Colarado USA<br>Gender: Female<br>Age: 20</div>
  		<div class="frame item3" id="f_info"><br><br><br>Father's Name: PVK Prasad<br>Occupation: Software Engineer<br>...<br>Mother's Name: SreeDevi Ponasalapalli<br>Occupation: Woman Of The House<br>...<br>Sibling's Name: Rohit Patchigolla<br>Occupation:School Student</div>
 	 		<div class="frame item3" id="ed_info"><br><br><br><br>Primary Education:Vikas Public School<br>Secondary Education:Urbane Academy<br>Current Education:I-MTech<br>Institute name: University of Hyderabad(UoH/HCU)</div>
  		<div class="frame item3" id="exp"><br><br><br><br><br>-Null-</div>
  		<div class="frame item3" id="ach"><br><br><u>Academics:</u><br>School 5th Topper<br>Handwriting compitition Prices(English and Telugu) 1st from 7th to 10th grade<br><br><u>Extra-curiccular:</u><br>1st prize in Vollyball Inter School Competition,Ralley marathon Competition,Running(50m,100m) competition,<br>High jumping (5.3 feet),Long jump,swimming(Freestyle,Backstroke,Ralley),Womens Cricket<br>Was House Captain for 3 Years<br>Winner in Inter-House Singing Competition for 3 years<br>Mime Competitions</div>
  		<div class="frame item3" id="other"><br><br><u>Hobbies:</u><br>Reading Novels<br>Solving Jig saw puzzels<br>Driving my Scootie<br>Anime<br>Watching Kdrama<br>Cooking</div>

<!-- displaying image -->
  		<div class="frame item4"></div>
<!--contact creator details -->
	  	<div class="item5">
				Phone Number: 8008848847
				<br>
				Contact Details: Shruti.docomo@gmail.com</div>
		</div>
	</body>
</html>
