<?php include("auth.php");?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Add Coach</title>
<link rel="stylesheet" href="css/style.css"/>
</head>
<body>
<?php
 require('db.php');
 if (isset($_POST['firstname'])){
 $firstname = $_POST['firstname'];
 $lastname = $_POST['lastname'];
 $position = $_POST['position'];
 $salary = $_POST['salary'];
 $school = $_POST['school'];
 $sport = $_POST['sport'];
 $gender = $_POST['gender'];

 $query1 = "INSERT into `Coaches` (c_fname, c_lname,c_position, salary) VALUES ('$firstname', '$lastname', '$position', '$salary')";
 $result1 = mysql_query($query1) or die(mysql_error());

$getuserid = "SELECT coach_id FROM `Coaches` WHERE c_lname = '$lastname' AND c_fname = '$firstname' LIMIT 1";
$result = mysql_query($getuserid) or die(mysql_error());
while ($row = mysql_fetch_assoc($result)){
 $coachid = $row['coach_id'];}

 $query2 = "INSERT into `CoachSport` (coach_ID, sport_name, sport_gender) VALUES ('$coachid', '$sport', '$gender')";
 $result2 = mysql_query($query2) or die(mysql_error());

 $query3 = "INSERT into `CoachSchool` (coach_ID, school_name) VALUES ('$coachid', '$school')";
 $result3 = mysql_query($query3) or die(mysql_error());


 if($result1 && $result2 && $result3){
 echo "<div class='form'><h3>Coach has been added.</h3><br/><a href='index.php'>Home</a></div>";
 }
 }else{
?>
<div class="form">
<h1>Add a Coach</h1>
<form name="addcoach" action="" method="post">
<input type="text" name="firstname" placeholder="First Name" required /><br>
<input type="text" name="lastname" placeholder="Last Name" required /><br>
<input type="text" name="position" placeholder="Position" required/><br>
<input type="int" name="salary" placeholder="Salary" required/><br>
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
