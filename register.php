<DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Register</title>
<link rel="stylesheet" href="css/style.css"/>
</head>
<body>
<?php
 require('db.php');
 if (isset($_POST['username'])){
 $username = $_POST['username'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 $username = stripslashes($username);
 $username = mysql_real_escape_string($username);
 $email = stripslashes($email);
 $email = mysql_real_escape_string($email);
 $password = stripslashes($password);
 $password = mysql_real_escape_string($password);
 
 $query = "INSERT into `Users` (username, password, email) VALUES ('$username', '".md5($password)."', '$email')";
 $result = mysql_query($query);
 if($result){
 echo "<div class='form'><h3>Your account has been created.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
 }
 }else{
?>
<div class="form">
<h1>Register Now!</h1>
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="Username" required />
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required />
<input type="submit" name="submit" value="Register" />
</form>
</div>
<p>Already registered? <a href='login.php'>Log in.</a></p>
<?php } ?>
</body>
</html>
