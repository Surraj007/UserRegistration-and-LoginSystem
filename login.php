<?php
include("config.php");
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];

$sql = "SELECT id, password FROM users WHERE username = ?";
$stmt =  $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id, $hashed_password);
$stmt->fetch();

if($stmt->num_rows> 0 && password_verify($password, $hashed_password)){
    $_SESSION['user_id'] = $id;
   header("Location: welcome.php");
}
else{
    echo"Invalid username or password";
}
$stmt->close();
$conn->close();
}
?>

<center>
    <h1>LOGIN</h1>
<form method="POST" action="login.php">
Username: <input type="text" name="username"required> <br>
Password: <input type="password" name="password"required > <br>
<button type="submit">Login</button>

</form>
</center>