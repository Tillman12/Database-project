<html>
<body>
<p>the page has loaded</p>
 <?php
 	echo "I entered the php. ";

	require_once("./library.php"); // To connect to the database
 	$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
 	// Check connection
 	if ($mysqli->connect_errno) {
    	printf("Connect failed: %s\n", $mysqli->connect_error);
    	exit();
	}

 	echo "Connection is good. ";

 	#Keep track of which fields have values
 	$school_filled = False;
 	$state_filled = False;
 	$sport_filled = False;
 	$gender_filled = False;
 	$p_fname_filled = False;
 	$p_lname_filled = False;
 	$c_fname_filled = False;
 	$c_lname_filled = False;

 	#store values of fields (kind of redundant, could just check if val == "")
 	$school = "";
 	$state = "";
 	$sport = "";
 	$gender = "";
 	$p_fname = "";
 	$p_lname = "";
 	$c_fname = "";
 	$c_lname = "";

 	#Count keeps track in case no one puts anything in
 	$count = 0;
 	$stmt = "";

 	echo "line 30 running smoothly. ";

 	# Find out what data we have
 	if (htmlspecialchars($_POST['school']) != "") {
 		$school = htmlspecialchars($_POST['school']);
 		$school_filled = True;
 		$count += 1;
 		#echo $school;
 	}
 	if (htmlspecialchars($_POST['state']) != "") {
 		$state = htmlspecialchars($_POST['state']);
 		$state_filled = True;
 		$count += 1;
 		#echo $tate;
 	}
 	if (htmlspecialchars($_POST['sport']) != "") {
 		$sport = htmlspecialchars($_POST['sport']);
 		$sport_filled = True;
 		$count += 1;
 		#echo $sport;
 	}
 	if (htmlspecialchars($_POST['gender']) != "") {
 		$gender = htmlspecialchars($_POST['gender']);
 		$gender_filled = True;
 		$count += 1;
 		#echo $gender;
 	}
 	if (htmlspecialchars($_POST['p_fname']) != "") {
 		$p_fname = htmlspecialchars($_POST['p_fname']);
 		$p_fname_filled = True;
 		$count += 1;
 		#echo $p_fname;
 	}
 	if (htmlspecialchars($_POST['p_lname']) != "") {
 		$p_lname = htmlspecialchars($_POST['p_lname']);
 		$p_lname_filled = True;
 		$count += 1;
 		#echo $p_lname;
 	}
 	if (htmlspecialchars($_POST['c_fname']) != "") {
 		$c_fname = htmlspecialchars($_POST['c_fname']);
 		$c_fname_filled = True;
 		$count += 1;
 		#echo $c_fname;
 	}
 	if (htmlspecialchars($_POST['c_lname']) != "") {
 		$c_lname = htmlspecialchars($_POST['c_lname']);
 		$c_lname_filled = True;
 		$count += 1;
 		#echo $c_lname;
 	}

 	echo "Took input properly, data is: school = " . $school . " state = " . $state . " gender = " . $gender . " sport = " . $sport . " player = " . $p_fname . " " . $p_lname . " coach = " . $c_fname . " " . $c_lname . ". ";

	#if everything is empty can't look for anything
 	if ($count != 0) {
 		echo "Count is " . $count . ". ";

 		# Check for invalid queries
 		# Only player and coach needed, not a valid connection
 		if (($p_lname_filled || $p_fname_filled) && ($c_lname_filled || $c_fname_filled)) {
 			echo "Please search for either a player or coach, not both. ";
 		} else {
 			#All queries involving schools
 			echo "This is a good search. ";
 			if (($school_filled || $state_filled) && ($p_lname_filled || $p_fname_filled) && ($sport_filled || $gender_filled)) {
 				#school, player, sport
 				$stmt = "SELECT * FROM Schools NATURAL JOIN SchoolSports NATURAL JOIN Sports NATURAL JOIN PlayersSports NATURAL JOIN Players WHERE ";
 				$stmt = assignValues($stmt, $school_filled, $state_filled, $sport_filled, $gender_filled, $p_fname_filled, $p_lname_filled, $c_fname_filled, $c_lname_filled, $school, $state, $sport, $gender, $p_fname, $p_lname, $c_fname, $c_lname);
 			} elseif (($school_filled || $state_filled) && ($c_lname_filled || $c_fname_filled) && ($sport_filled || $gender_filled)) {
 				#school, coach, sport
 				$stmt = "SELECT * FROM Schools NATURAL JOIN SchoolSports NATURAL JOIN Sports NATURAL JOIN CoachSport NATURAL JOIN Coaches WHERE ";
 				$stmt = assignValues($stmt, $school_filled, $state_filled, $sport_filled, $gender_filled, $p_fname_filled, $p_lname_filled, $c_fname_filled, $c_lname_filled, $school, $state, $sport, $gender, $p_fname, $p_lname, $c_fname, $c_lname);
 			} elseif (($school_filled || $state_filled) && ($p_lname_filled || $p_fname_filled)) {
 				#school, player
 				$stmt = "SELECT * FROM Schools NATURAL JOIN SchoolRosters NATURAL JOIN Players WHERE ";
 				$stmt = assignValues($stmt, $school_filled, $state_filled, $sport_filled, $gender_filled, $p_fname_filled, $p_lname_filled, $c_fname_filled, $c_lname_filled, $school, $state, $sport, $gender, $p_fname, $p_lname, $c_fname, $c_lname);
 			} elseif (($school_filled || $state_filled) && ($sport_filled || $gender_filled)) {
 				#school, sport
 				$stmt = "SELECT * FROM Schools NATURAL JOIN SchoolSports WHERE ";
 				$stmt = assignValues($stmt, $school_filled, $state_filled, $sport_filled, $gender_filled, $p_fname_filled, $p_lname_filled, $c_fname_filled, $c_lname_filled, $school, $state, $sport, $gender, $p_fname, $p_lname, $c_fname, $c_lname);
 			} elseif (($school_filled || $state_filled) && ($c_lname_filled || $c_fname_filled)) {
 				#school, coach
 				$stmt = "SELECT * FROM Schools NATURAL JOIN CoachSchool NATURAL JOIN Coaches WHERE ";
 				$stmt = assignValues($stmt, $school_filled, $state_filled, $sport_filled, $gender_filled, $p_fname_filled, $p_lname_filled, $c_fname_filled, $c_lname_filled, $school, $state, $sport, $gender, $p_fname, $p_lname, $c_fname, $c_lname);
 			} elseif ($school_filled || $state_filled) {
 				#school only
 				$stmt = "SELECT * FROM Schools WHERE ";
 				$stmt = assignValues($stmt, $school_filled, $state_filled, $sport_filled, $gender_filled, $p_fname_filled, $p_lname_filled, $c_fname_filled, $c_lname_filled, $school, $state, $sport, $gender, $p_fname, $p_lname, $c_fname, $c_lname);
 			} elseif (($sport_filled || $gender_filled) && ($p_lname_filled || $p_fname_filled)) {
 				#sports, players
 				$stmt = "SELECT * FROM Sports NATURAL JOIN PlayersSports NATURAL JOIN Players WHERE ";
 				$stmt = assignValues($stmt, $school_filled, $state_filled, $sport_filled, $gender_filled, $p_fname_filled, $p_lname_filled, $c_fname_filled, $c_lname_filled, $school, $state, $sport, $gender, $p_fname, $p_lname, $c_fname, $c_lname);
 			} elseif (($sport_filled || $gender_filled) && ($c_lname_filled || $c_fname_filled)) {
 				#sports, coaches
 				$stmt = "SELECT * FROM Sports NATURAL JOIN CoachSport NATURAL JOIN Coaches WHERE ";
 				$stmt = assignValues($stmt, $school_filled, $state_filled, $sport_filled, $gender_filled, $p_fname_filled, $p_lname_filled, $c_fname_filled, $c_lname_filled, $school, $state, $sport, $gender, $p_fname, $p_lname, $c_fname, $c_lname);
 			} elseif ($sport_filled || $gender_filled) {
 				#just sports
 				$stmt = "SELECT * FROM Sports WHERE ";
 				$stmt = assignValues($stmt, $school_filled, $state_filled, $sport_filled, $gender_filled, $p_fname_filled, $p_lname_filled, $c_fname_filled, $c_lname_filled, $school, $state, $sport, $gender, $p_fname, $p_lname, $c_fname, $c_lname);
 			} elseif ($p_lname_filled || $p_fname_filled) {
 				#just player
 				$stmt = "SELECT * FROM Players WHERE ";
 				$stmt = assignValues($stmt, $school_filled, $state_filled, $sport_filled, $gender_filled, $p_fname_filled, $p_lname_filled, $c_fname_filled, $c_lname_filled, $school, $state, $sport, $gender, $p_fname, $p_lname, $c_fname, $c_lname);
 			} elseif ($c_lname_filled || $c_fname_filled) {
 				#just coaches
 				$stmt = "SELECT * FROM Coaches WHERE ";
 				$stmt = assignValues($stmt, $school_filled, $state_filled, $sport_filled, $gender_filled, $p_fname_filled, $p_lname_filled, $c_fname_filled, $c_lname_filled, $school, $state, $sport, $gender, $p_fname, $p_lname, $c_fname, $c_lname);
 			}

 			echo $stmt . ". ";

 			if ($result = $con->query($stmt)){
 				echo "this actually worked. ";
 				echo "<br>";
 				while ($row = mysqli_fetch_array($result)) {
    				echo $row['sport_name'];
    				echo " " . $row['sport_gender'];
    				echo "<br>";
    			}
    			echo "while loop done";
 			}

 		}
 	} else {
 		echo "Please enter information to search on. ";
 	}

 	mysqli_close($con);

 	#outside to make things easier to track
 	function assignValues($stmt, $school_filled, $state_filled, $sport_filled, $gender_filled, $p_fname_filled, $p_lname_filled, $c_fname_filled, $c_lname_filled, $school, $state, $sport, $gender, $p_fname, $p_lname, $c_fname, $c_lname) {
 		#This function tells the query which values to look for in tables

 		if ($school_filled && $school != 'ALL')
 			$stmt = $stmt . "school_name = '" . $school . "', ";
 		if ($state_filled && $state != 'ALL')
 			$stmt = $stmt . "state = '" . $state . "', ";
 		if ($sport_filled && $sport != 'ALL')
 			$stmt = $stmt . "sport_name = '" . $sport . "', ";
 		if ($gender_filled && $gender != 'ALL')
 			$stmt = $stmt . "sport_gender = '" . $gender . "', ";
 		if ($p_fname_filled && $p_fname != 'ALL')
 			$stmt = $stmt . "p_fname = '" . $p_fname . "', ";
 		if ($p_lname_filled && $p_lname != 'ALL')
 			$stmt = $stmt . "p_lname = '" . $p_lname . "', ";
 		if ($c_fname_filled && $c_fname != 'ALL')
 			$stmt = $stmt . "c_fname = '" . $c_fname . "', ";
 		if ($c_lname_filled && $c_lname != 'ALL')
 			$stmt = $stmt . "c_lname = '" . $c_lname . "', ";

 		#Checks if only an ALL is specified and no narrowing constriants (gets wid of WHERE in that case)
 		if (($school == 'ALL' || !$school_filled) && ($state == 'ALL' || !$state_filled) && ($sport == 'ALL' || !$sport_filled) && ($gender == 'ALL' || !$gender_filled) && ($p_lname == 'ALL' || !$p_lname_filled) && ($p_fname == 'ALL' || !$p_fname_filled) && ($c_lname == 'ALL' || !$c_lname_filled) && ($c_fname == 'ALL' || !$c_fname_filled))
 			return substr($stmt, 0, -7);
 		else
			return substr($stmt, 0, -2);
 	}
 ?>
</body>
</html>