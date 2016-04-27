<?php include("auth.php");?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Add Data</title>
</head>
<link rel="stylesheet" href="css/style.css"/>
<body>
<?php
 require('db.php');
if (isset($_SESSION['type']) && ($_SESSION['type']=='superuser'|| $_SESSION['type']=='ad')){
?>
<div class="form">
<h1>Add Data</h1>

<p><a href='add_player.php'>Add Player</a></p>
<p><a href='add_coach.php'>Add Coach</a></p>
<p><a href='edit_db.php'>Back</a></p>
</div>
<?php }
else{
echo "<div class='form'><h3>You do not have permission to access this page.</h3><br/><a href='index.php'>back</a></div>";
} ?>
</body>
</html>
