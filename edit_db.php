<?php include("auth.php");?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Database</title>
</head>
<link rel="stylesheet" href="css/style.css"/>
<body>
<?php
 require('db.php');
if (isset($_SESSION['type']) && ($_SESSION['type']=='superuser'|| $_SESSION['type']=='ad')){
?>
<div class="form">
<h1>Update the Database</h1>
<p><a href='add_data.php'>Add Data</a></p>
<p><a href='delete_data.php'>Delete Data</a></p>
<p><a href='index.php'>Back</a></p>
</div>
<?php }
else{
echo "<div class='form'><h3>You do not have permission to access this page.</h3><br/><a href='index.php'>back</a></div>";
} ?>
</body>
</html>
