<?php include("auth.php");?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Add Player</title>
<link rel="stylesheet" href="css/style.css"/>
</head>
<body>
<?php
 require('db.php');
 if (isset($_POST['firstname'])){
 $firstname = $_POST['firstname'];
 $lastname = $_POST['lastname'];
 $number = $_POST['number'];
 $position = $_POST['position'];
 $gradyear = $_POST['gradyear'];
 $school = $_POST['school'];
 $sport = $_POST['sport'];
 $gender = $_POST['gender'];

 $query1 = "INSERT into `Players` (p_fname, p_lname, number, position, grad_year) VALUES ('$firstname', '$lastname', '$number','$position', '$gradyear')";
 $result1 = mysql_query($query1) or die(mysql_error());

$getuserid = "SELECT player_ID FROM `Players` WHERE p_lname = '$lastname' AND p_fname = '$firstname' LIMIT 1";
$result = mysql_query($getuserid) or die(mysql_error());
while ($row = mysql_fetch_assoc($result)){
 $playerid = $row['player_ID'];}

 $query2 = "INSERT into `PlayersSports` (player_ID, sport_name, sport_gender) VALUES ('$playerid', '$sport', '$gender')";
 $result2 = mysql_query($query2) or die(mysql_error());

 $query3 = "INSERT into `SchoolRosters` (school_name, player_ID) VALUES ('$school', '$playerid')";
 $result3 = mysql_query($query3) or die(mysql_error());


 if($result1 && $result2 && $result3){
 echo "<div class='form'><h3>Player has been added.</h3><br/><a href='index.php'>Home</a></div>";
 }
 }else{
?>
<div class="form">
<h1>Add a Player</h1>
<form name="addplayer" action="" method="post">
<input type="text" name="firstname" placeholder="First Name" required /><br>
<input type="text" name="lastname" placeholder="Last Name" required /><br>
<input type="int" name="number" placeholder="Number" required /><br>
<input type="text" name="position" placeholder="Position" required/><br>
<input type="int" name="gradyear" placeholder="Grad Year" required/><br>
<input type="text" name="school" placeholder="School" required/><br>
<input type="text" name="sport" placeholder="Sport" required/><br>
<input type="text" name="gender" placeholder="Gender" required/><br>
<input type="submit" name="submit" value="Add" />
</form>
</div>
<br>
<p><a href='add_data.php'>Back</a></p>
<?php } ?>
</body>
</html>
