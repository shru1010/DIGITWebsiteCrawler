<?php
//sending mails
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/phpmailer/phpmailer/src/Exception.php';
    require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require 'vendor/phpmailer/phpmailer/src/SMTP.php';
    // composers autoloader
    require 'vendor/autoload.php';
//submit button
    if(isset($_POST['Submit']))
    {

        $first = $_POST['username'];
        $email = $_POST['email'];
        $sub = $_POST['sub'];
        $message = $_POST['email_body'];
        $mail = new PHPMailer(true);
        try
        {
            $mail->IsSMTP();
            $mail->SMTPDebug  = 0;
            $mail->SMTPAuth   = TRUE;
            $mail->SMTPSecure = "tls";
            $mail->Port       = 587;
            $mail->Host       = "smtp.gmail.com";
            $mail->Username   = "";//your-email@gmail.com within double quotes
            $mail->Password   = "";//your-gmail-password within double qoutes

            $mail->IsHTML(true);
            $mail->AddAddress("", "");//("recipient-email@domain", "recipient-name")
            $mail->SetFrom("", "");//("from-email@gmail.com", "from-name")
            $mail->AddReplyTo($email , $first);
            $mail->Subject = $sub;
            $content = "<p>First Name: $first Message: $message </p>";

            $mail->MsgHTML($content);
            $mail->send();
            echo "<script>alert('Email Sent Successfully!')</script>";
        }
        catch(Exception $e)
        {
            echo "<script>alert('Email Wasn't Sent | Some error occured')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<!--cookie -->
  <?php
    if(!isset($_COOKIE["login"]))
    {
      header('Location: login.php');
    }
  ?>
<!--meta tags -->
  <meta charset="UTF-8">
  <title>Contact Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- bootstrap-->
  <link rel="stylesheet" href="bootstrap-4.2.1-dist/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="bootstrap-4.2.1-dist/js/bootstrap.min.js"/>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<!-- style-->
  <style>
    .body{
      background-color:#c6fced;
    }
    .input{
      text-align: center;
    }
  </style>
<!--script tag with validation function for user -->
  <script>
    function validate()
    {
      var id=document.contact_form.username.value;
      var email=document.contact_form.email.value;
      if( id.length == "" || email.length == ""){
        alert("Fill all details!");
        return false;
      }
      return true;
    }
  </script>
  <link rel="stylesheet" href="about.css">
</head>

<body class="body">
  <!-- nav bar-->
  <ul>
    <li><h1>DIGIT Website Crawler</h1></li>
    <li><a  class="navbar" href="logout.php">Logout</a></li>
    <li><a class="navbar" href="contact.php">Contact Us</a></li>
    <li><a class="navbar" href="about.php">About Me</a></li>
		<li><a class="navbar" href="home.php">Home</a></li>
	</ul><center>
    <!--email form for sending errors -->
    <form name="contact_form" action="contact.php" onsubmit="return validate()" method="POST">
      <br><h4>Name </h4>
      <input type="text" name="username" class="input" id="username" placeholder="Enter USERNAME">
      <h4><br>Your Email ID</h4>
      <input type="email" class="input" id="email" name="email" placeholder="Enter email ID">
      <h4><br>Purpose of mail</h4>
      <input type="text" class="input" id="sub" name="sub" placeholder="Subject">
      <h4><br>Body:</h4>
      <textarea class="input" id="body" name="email_body" placeholder="Type content here" rows="10" cols="80"></textarea><br><br>
      <input type="submit"name="Submit" class="btn btn-primary" value="Email">
  </form></center>
</body>
</html>
