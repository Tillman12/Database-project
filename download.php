<html>
<body>
	<?php
		require_once("./library.php"); // To connect to the database
	 	$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
	 	// Check connection
	 	if ($mysqli->connect_errno) {
	    	printf("Connect failed: %s\n", $mysqli->connect_error);
	    	exit();
		}

		if (htmlspecialchars($_POST['table']) != "Schools" && htmlspecialchars($_POST['table']) != "Sports" && htmlspecialchars($_POST['table']) != "Players" && htmlspecialchars($_POST['table']) != "Coaches") {
			echo "Please enter a valid table to download.";
		} else {
			$stmt = "SELECT * FROM " . htmlspecialchars($_POST['table']);

			if ($result = $con->query($stmt)) {
				if ($_POST['table'] == "Schools") 
					echo "school_name, city, state, colors";
				if ($_POST['table'] == "Sports") 
					echo "sport_name, sport_gender";
				if ($_POST['table'] == "Players") 
					echo "player_ID, p_fname, p_lname, number, position, grad_year";
				if ($_POST['table'] == "Coaches") 
					echo "coach_id, c_fname, c_lname, c_position, salary";

				echo "<br>";

				while ($row = mysqli_fetch_array($result)) {
					if ($_POST['table'] == "Schools") 
						echo $row["school_name"] . ", " . $row["city"] . ", " . $row["state"] . ", " . $row["colors"];
					if ($_POST['table'] == "Sports") 
						echo $row["sport_name"] . ", " . $row["sport_gender"];
					if ($_POST['table'] == "Players") 
						echo $row["player_ID"] . ", " . $row["p_fname"] . ", " . $row["p_lname"] . ", " . $row["number"] . ", " . $row["position"] . ", " . $row["grad_year"];
					if ($_POST['table'] == "Coaches") 
						echo $row["coach_id"] . ", " . $row["c_fname"] . ", " . $row["c_lname"] . ", " . $row["c_position"] . ", " . $row["salary"];

					echo "<br>";
				}
			}
		}
	?>
</body>
</html>