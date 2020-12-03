<?php
/*cookie*/
    setcookie("login","true",time() - 3600);
    header('Location: login.php');
?>
