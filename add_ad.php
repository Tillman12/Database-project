<?php include("auth.php");?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Grant Permissions</title>
</head>
<link rel="stylesheet" href="css/style.css"/>
<body>
<?php
 require('db.php');
if (isset($_SESSION['type']) && $_SESSION['type']=='superuser'){ 
 if (isset($_POST['username'])){
 $username = $_POST['username'];
 $username = stripslashes($username);
 $username = mysql_real_escape_string($username);
 $query = "SELECT username FROM `Users` WHERE username='$username'";
 $result = mysql_query($query) or die(mysql_error());
 $rows = mysql_num_rows($result);
 if($rows==1){
 $query = "UPDATE `Users` SET type='ad' WHERE username='$username'";
 $result = mysql_query($query) or die(mysql_error());
 header("Location: index.php"); // Redirect user to index.php
 }else{
 echo "<div class='form'><h3>Invalid username.</h3><br/>Click <a href='add_ad.php'>here</a> to try again.</div>";
 }
 }else{
?>
<div class="form">
<h1>Grant Athletic Director Permissions</h1>
<form action="" method="post" name="add_ad">
<input type="text" name="username" placeholder="Username" required />
<input name="submit" type="submit" value="Add" />
</form>
<p><a href='index.php'>Back.</a></p>
</div>
<?php }}
else{
echo "<div class='form'><h3>You do not have permission to access this page.</h3><br/><a href='index.php'>back</a></div>";
} ?>
</body>
</html>
