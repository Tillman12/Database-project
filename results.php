<html>
<body>
 <p>Hello these are words</p>
 <?php
 	$school_filled = False;
 	$state_filled = False;
 	$sport_filled = False;
 	$gender_filled = False;
 	$p_fname_filled = False;
 	$p_lname_filled = False;
 	$c_fname_filled = False;
 	$c_lname_filled = False;
 	$awards_filled = False;
 	$champ_filled = False;

 	$school = "";
 	$state = "";
 	$sport = "";
 	$gender = "";
 	$p_fname = "";
 	$p_lname = "";
 	$c_fname = "";
 	$c_lname = "";
 	$awards = "";
 	$champ = "";

 	if (htmlspecialchars($_POST['school']) != "") {
 		$school = htmlspecialchars($_POST['school']);
 		$school_filled = True;
 		echo "The school field IS NOT empty.";
 	}
 	if (htmlspecialchars($_POST['state']) != "") {
 		$state = htmlspecialchars($_POST['state']);
 		$state_filled = True;
 		echo "The state field IS NOT empty.";
 	}
 	if (htmlspecialchars($_POST['sport']) != "") {
 		$sport = htmlspecialchars($_POST['sport']);
 		$sport_filled = True;
 		echo "The sport field IS NOT empty.";
 	}
 	if (htmlspecialchars($_POST['gender']) != "") {
 		$gender = htmlspecialchars($_POST['gender']);
 		$gender_filled = True;
 		echo "The gender field IS NOT empty.";
 	}
 	if (htmlspecialchars($_POST['p_fname']) != "") {
 		$p_fname = htmlspecialchars($_POST['p_fname']);
 		$p_fname_filled = True;
 		echo "The p_fname field IS NOT empty.";
 	}
 	if (htmlspecialchars($_POST['p_lname']) != "") {
 		$p_lname = htmlspecialchars($_POST['p_lname']);
 		$p_lname_filled = True;
 		echo "The p_lname field IS NOT empty.";
 	}
 	if (htmlspecialchars($_POST['c_fname']) != "") {
 		$c_fname = htmlspecialchars($_POST['c_fname']);
 		$c_fname_filled = True;
 		echo "The c_fname field IS NOT empty.";
 	}
 	if (htmlspecialchars($_POST['c_lname']) != "") {
 		$c_lname = htmlspecialchars($_POST['c_lname']);
 		$c_lname_filled = True;
 		echo "The c_lname field IS NOT empty.";
 	}
 	if (htmlspecialchars($_POST['awards']) != "") {
 		$awards = htmlspecialchars($_POST['awards']);
 		$awards_filled = True;
 		echo "The awards field IS NOT empty.";
 	}
 	if (htmlspecialchars($_POST['championships']) != "") {
 		$champ = htmlspecialchars($_POST['championships']);
 		$champ_filled = True;
 		echo "The champ field IS NOT empty.";
 	}
 ?>
</body>
</html>