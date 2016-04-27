<?php include("auth.php");?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Home</title>
</head>
<link rel="stylesheet" href="css/style.css"/>
<body>
<div class="form">
<h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
<p><a href="add_ad.php">Add an Athletic Director</a></p>
<p><a href="edit_db.php">Update the Database</a></p>
<p><a href="search.html">Search the Database</a></p>
<a href="logout.php">Logout</a>
</div>
</body>
</html>
