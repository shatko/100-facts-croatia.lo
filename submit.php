<?php

	if(isset($_POST['submit'])) {

		$errors = array();


		if(empty($_POST['name'])) {
			$errors['name1'] = "Enter the name of the fact!";
		}
		if(empty($_POST['explained'])) {
			$errors['explained1'] = "Explain the fact!";
		}
		if(!preg_match('/^(http|https):/', $_POST['link'])) {
			$errors['link1'] = "Enter valid link!";
		}



		var_dump(!preg_match('/^(http|https):./', $_POST['link']));

		if (count($errors) == 0) {
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
	}
?>

<html>
	<html lang="hr">
<head>
	<meta charset="UTF-8">
	<title>insert</title>
</head>
<body>
	<form action="submit.php" method="post">
		Name: <input type="text" name="name"></br>
		<?php if(isset($errors['name1'])) echo '<p>' . $errors['name1'] . '</p>'; ?>
		Explained: <textarea name="explained" rows="10" cols="100"></textarea></br>
		<?php if(isset($errors['explained1'])) echo '<p>' . $errors['explained1'] . '</p>'; ?>
		Link: <input type="text" name="link"></br>
		<?php if(isset($errors['link1'])) echo '<p>' . $errors['link1'] . '</p>'; ?>
		Images: <input type="text" name="images"></br>
		<input type="submit" name="submit">
	</form>
</body>
</html>