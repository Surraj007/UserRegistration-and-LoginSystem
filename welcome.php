<center>
    <h1>WELCOME</h1>
<?php

session_start();
if (!isset($_SESSION['user_id'])) {

header("Location: login.php");
exit;
}
echo"Welcome! You are succesfully logged in.  <a href ='logout.php'>LogOut </a>";

?>
<br>
<a href="register.php">Register</a>
</center>
