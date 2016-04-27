<DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/style.css"/>
</head>
<body>
<?php
 require('db.php');
 session_start();
 if (isset($_POST['username'])){
 $username = $_POST['username'];
 $password = $_POST['password'];
 $username = stripslashes($username);
 $username = mysql_real_escape_string($username);
 $password = stripslashes($password);
 $password = mysql_real_escape_string($password);
 $query = "SELECT * FROM `Users` WHERE username='$username' and password='".md5($password)."'";
 $result = mysql_query($query) or die(mysql_error());
 $rows = mysql_num_rows($result);
 if($rows==1){
 $_SESSION['username'] = $username;
 
 $query2 = "SELECT type FROM `Users` WHERE username='$username'";
 $type = mysql_query($query2) or die(mysql_error());
 while ($row = mysql_fetch_assoc($type)){ 
	$_SESSION['type'] = $row['type'];
 }
 header("Location: index.php"); // Redirect user to index.php

 }else{
 echo "<div class='form'><h3>Incorrect login credentials.</h3><br/>Click <a href='login.php'>here</a> to try again.</div>";
 }
 }else{
?>
<div class="form">
<h1>Welcome to the World of Collegiate Sports!</h1>
<h2>Log In</h2>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<input name="submit" type="submit" value="Login" />
</form>
<p>Don't have an account yet? <a href='register.php'>Click here.</a></p>
</div>
<?php } ?>
</body>
</html>

