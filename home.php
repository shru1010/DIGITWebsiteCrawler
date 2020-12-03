<!DOCTYPE html>
<html>
<head>
    <?php
        if(!isset($_COOKIE["login"]))
        {
            header('Location: login.php');
        }
    ?>
    <title>Crawler</title>
    <!-- necessary files and links -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta type="charset" content="utf-8" lang="en"/>
    <script src="script.js"></script>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="bootstrap-4.2.1-dist/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="bootstrap-4.2.1-dist/js/bootstrap.min.js"/>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <style>
        .navbar
        {
          font-size: 130%;
        }
    </style>
</head>
<body class="body">
<!-- the form for asking for the crawling info-->
    <ul>
        <li><h2>DIGIT Website Crawler</h2></li>
        <li><a  class="navbar" href="logout.php">Logout</a></li>
        <li><a class="navbar" href="contact.php">Contact Us</a></li>
        <li><a class="navbar" href="about.php">About Me</a></li>
		<li><a class="navbar" href="home.php">Home</a></li>		
	</ul>
    <center>
    <form>
        <div class="num">
            <br><label for="num_results">Enter the number of results:</label>
            <br>
            <input type="text" id="num_results" name="num_results" placeholder="max. 10" value=10>
        <div>
            <br><input type="button" id="get-btn" onclick="getData(num_results.value) " value="get results"/>
        </div>
    </form>
    </center>
    <p class="data_block" id="data_block"></p>
</body>
</html>
