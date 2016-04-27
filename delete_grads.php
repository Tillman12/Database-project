<?php include("auth.php");?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Clean Up</title>
</head>
<link rel="stylesheet" href="css/style.css"/>
<body>
<?php
 require('db.php');
if (isset($_SESSION['type']) && $_SESSION['type']=='superuser'){
 if (isset($_POST['gradyear'])){
 $gradyear = $_POST['gradyear'];
 
 $query = "CALL `gst_final`();";
 $result = mysql_query($query) or die(mysql_error());
 
 if($result){
 echo "<div class='form'><h3>Graduated student athletes deleted.</h3><br/>Click <a href='index.php'>here</a> to go to the home page.</div>";
 }else{
 echo "something is wrong";
 }
 }else{
?>
<div class="form">
<h1>Clean Up</h1>
<h2>Enter in a graduation year and click Remove to delete all graduating student athletes from the database.</h2>
<form action="" method="post" name="deletegrads">
<input type="text" name="gradyear" placeholder="Year" required />
<input name="submit" type="submit" value="Remove" />
</form>
<p><a href='delete_data.php'>Back.</a></p>
</div>
<?php }}
else{
echo "<div class='form'><h3>You do not have permission to access this page.</h3><br/><a href='delete_data.php'>Back</a></div>";
} ?>
</body>
</html>
