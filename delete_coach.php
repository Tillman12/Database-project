<?php include("auth.php");?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Delete Coach</title>
<link rel="stylesheet" href="css/style.css"/>
</head>
<body>
<?php
 require('db.php');
 if (isset($_POST['coachid'])){
 $coachid = $_POST['coachid'];

 $query1 = "DELETE FROM `Coaches` WHERE coach_id='$coachid'";
 $result1 = mysql_query($query1) or die(mysql_error());

 $query2 = "DELETE FROM `CoachSport` WHERE coach_ID='$coachid'";
 $result2 = mysql_query($query2) or die(mysql_error());

 $query3 = "DELETE FROM `CoachSchool` WHERE coach_ID='$coachid'";
 $result3 = mysql_query($query3) or die(mysql_error());


 if($result1 && $result2 && $result3){
 echo "<div class='form'><h3>Coach has been deleted.</h3><br/><a href='index.php'>Home</a></div>";
 }
 }else{
?>
<div class="form">
<h1>Delete a Coach</h1>
<form name="addcoach" action="" method="post">
<input type="text" name="coachid" placeholder="Coach ID" required /><br>
<input type="submit" name="submit" value="Delete" />
</form>
</div>
<br>
<p><a href='delete_data.php'>Back</a></p>
<?php } ?>
</body>
</html>
