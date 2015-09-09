<html>
	<html lang="hr">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>insert</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>
	<table>
		<?php
		// database stuff 
			$dbhost = "localhost";
			$dbuser = "root";
			$dbpass = "Zagreb2010";
			$dbname = "mladen";
			$dberror1 = "Not connected to a DB";
			$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
		// removes those funny characters 
			if (!$conn->set_charset("utf8")) {
			    printf("Error loading character set utf8: %s\n", $conn->error);
			} else {
			    //printf("Current character set: %s\n", $conn->character_set_name());
			}
			mysqli_select_db($conn, "mladen");
			$sql = "SELECT * FROM crofacts";
			$data = mysqli_query($conn, $sql);
		// border 
			echo "<table border=1>
			<tr>
			<th>Croid</th>
			<th>Croname</th>
			<th>Croexplained</th>
			<th>Crolink</th>
			<th>Croimages</th>
			</tr>";
			while ($cell = mysqli_fetch_array($data)){
				echo "<tr>";
				echo "<td>".$cell['croid']."</td>";
				echo "<td>".$cell['croname']."</td>";
				echo "<td>".$cell['croexplained']."</td>";
				echo "<td>".$cell['crolink']."</td>";
				echo "<td>".$cell['croimages']."</td>";
				echo "</tr>";
			}
			echo"</table>";
		// close DB connection 
			mysqli_close($conn);
		?>
	</table>
</body>
</html>