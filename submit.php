<html>
	<html lang="hr">
<head>
	<meta charset="UTF-8">
	<title>insert</title>
</head>
<body>
	<form action="submit.php" method="post">
		Name: <input type="text" name="name"></br>
		Explained: <input type="text" name="explained"></br>
		Link: <input type="text" name="link"></br>
		Images: <input type="text" name="images"></br>
		<input type="submit" name="submit">
	</form>
	<?php
		if(isset($_POST['submit'])) {
			var_dump($_POST);

			$dbhost = "localhost";
			$dbuser = "root";
			$dbpass = "Zagreb2010";
			$dbname = "mladen";
			$dberror1 = "Not connected to a DB";
			$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 

			mysqli_select_db($conn, "mladen");

			$sql = "INSERT INTO crofacts (croname,croexplained,crolink,croimages) VALUES ('$_POST[name]','$_POST[explained]','$_POST[link]','$_POST[images]')";

			mysqli_query($conn, $sql);
			mysqli_close($conn);
		}
	?>
</body>
</html>