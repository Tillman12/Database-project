<?php include("auth.php");?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Delete Player</title>
<link rel="stylesheet" href="css/style.css"/>
</head>
<body>
<?php
 require('db.php');
 if (isset($_POST['playerid'])){
 $playerid = $_POST['playerid'];

 $query1 = "DELETE FROM `Players` WHERE player_ID='$playerid'";
 $result1 = mysql_query($query1) or die(mysql_error());

 $query2 = "DELETE FROM `PlayersSports` WHERE player_ID='$playerid'";
 $result2 = mysql_query($query2) or die(mysql_error());

 $query3 = "DELETE FROM `SchoolRosters` WHERE player_ID='$playerid'";
 $result3 = mysql_query($query3) or die(mysql_error());


 if($result1 && $result2 && $result3){
 echo "<div class='form'><h3>Player has been deleted.</h3><br/><a href='index.php'>Home</a></div>";
 }
 }else{
?>
<div class="form">
<h1>Delete a Player</h1>
<form name="addplayer" action="" method="post">
<input type="text" name="playerid" placeholder="Player ID" required /><br>
<input type="submit" name="submit" value="Delete" />
</form>
</div>
<br>
<p><a href='delete_data.php'>Back</a></p>
<?php } ?>
</body>
</html>
