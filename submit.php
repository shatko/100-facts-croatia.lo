<?php
/* wraps everything inside */
	if(isset($_POST['submit'])) {
/* collects any error in the array */
		$errors = array();
/* checks if the name of the fact is empty */
		if(empty($_POST['name'])) {
			$errors['name1'] = "Enter the name of the fact!";
		}
/* checks if the text area for the fact explanation is empty */
		if(empty($_POST['explained'])) {
			$errors['explained1'] = "Explain the fact!";
		}
/* checks if the needen characters are used */
		if(!preg_match('/^(http|https):/', $_POST['link'])) {
			$errors['link1'] = "Enter valid link!";
		}
/* insert image starts */
		$imagename=$_FILES['file']['name'];
		$imagesize=$_FILES['file']['size'];
		$imagetype=$_FILES['file']['type'];
		$tmp_name = $_FILES['file']['tmp_name'];
		$imagelocation = 'img/';
		$target_file = $imagelocation . basename($imagename);
		if (empty($imagename)) {
			echo 'Choose an image!';
		} else {
			echo 'An image was uploaded';
			move_uploaded_file($tmp_name, $target_file);
		}
/* connection to a database */
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
			$sql = "INSERT INTO crofacts (croname,croexplained,crolink,croimages) VALUES ('$_POST[name]','$_POST[explained]','$_POST[link]','$imagename')";
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
	<form action="submit.php" method="post" enctype="multipart/form-data">
<!-- Insert the name of the fact -->
		Name:	<input type="text" name="name" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>" /> 
				<?php if(isset($errors['name1'])) echo '<p>' . $errors['name1'] . '</p>'; ?>
				</br>
<!-- Insert the explaination of the fact -->
		Explained: 	<textarea name="explained" rows="10" cols="100" />
					<?php if(isset($_POST['explained'])) echo $_POST['explained']; ?>
					</textarea>
					<?php if(isset($errors['explained1'])) echo '<p>' . $errors['explained1'] . '</p>'; ?>
					</br>
<!-- Inserts the link for the want to know more area --> 
		Link: 		<input type="text" name="link" value="<?php if(isset($_POST['link'])) echo $_POST['link']; ?>" />
					<?php if(isset($errors['link1'])) echo '<p>' . $errors['link1'] . '</p>'; ?>
					</br>
<!-- Insert image area -->
		<input type="file" name="file" accept="image/*" />
		</br>
<!-- Submit button -->
		<input type="submit" name="submit" value="submit">
	</form>
</body>
</html>