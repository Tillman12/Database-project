<?php include("auth.php");?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Delete Data</title>
</head>
<link rel="stylesheet" href="css/style.css"/>
<body>
<?php
 require('db.php');
if (isset($_SESSION['type']) && ($_SESSION['type']=='superuser'|| $_SESSION['type']=='ad')){
?>
<div class="form">
<h1>Delete Data</h1>

<p><a href='delete_player.php'>Delete Player</a></p>
<p><a href='delete_coach.php'>Delete Coach</a></p>
<p><a href='delete_grads.php'>Clean Up</a></p>
<p><a href='edit_db.php'>Back</a></p>
</div>
<?php }
else{
echo "<div class='form'><h3>You do not have permission to access this page.</h3><br/><a href='index.php'>back</a></div>";
} ?>
</body>
</html>
