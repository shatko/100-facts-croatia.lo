<?php
/* wraps everything inside */
	if(isset($_POST['submit'])) {
/* collects any error in the array */
		$errors = array();
		$noerrors = array();
/* checks if the name of the fact is empty */
		if(empty($_POST['name'])) {
			$errors['name1'] = "** Enter the name of the fact!";
		}
/* checks if the text area for the fact explanation is empty */
		if(empty($_POST['explained'])) {
			$errors['explained1'] = "** Explain the fact!";
		}
/* checks if the needen characters are used */
		if(!preg_match('/^(http|https):/', $_POST['link'])) {
			$errors['link1'] = "** Enter valid link!";
		}
/* insert image starts */
		$imagename=$_FILES['file']['name'];
		$imagesize=$_FILES['file']['size'];
		$imagetype=$_FILES['file']['type'];
		$tmp_name = $_FILES['file']['tmp_name'];
		$imagelocation = 'img/';
/* checks for the image errors */
		if (empty($imagename)) {
			$errors['imagename1'] = "** Insert picture!";
		}
/* connection to a database and send data if no errors */
		if (count($errors) == 0) {
/* randomize image name */
			$length = 5;
			$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
			$ext = pathinfo($imagename, PATHINFO_EXTENSION);
			$imagename2 = str_replace('.'.$ext, '', $imagename).'_crofact_'.$randomString.'.'.$ext;    
			$target_file = $imagelocation . basename($imagename2);
/* image upload insert message*/
			move_uploaded_file($tmp_name, $target_file);
			$noerrors['noerrors1'] ="!!! New Fact Added !!! :)";
/* database stuff */
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
			$sql = "INSERT INTO crofacts (croname,croexplained,crolink,croimages) VALUES ('$_POST[name]','$_POST[explained]','$_POST[link]','$imagename2')";
			mysqli_query($conn, $sql);
			mysqli_close($conn);
/* empty form */
			unset($_POST['name']);
			unset($_POST['explained']);
			unset($_POST['link']);
			unset($imagename);
			unset($imagename2);
		}
	}
?>
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
		<form action="submit.php" method="post" enctype="multipart/form-data">
	<!-- Insert the name of the fact -->
			Name:		<input type="text" name="name" size="50" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>" /> 
						</br>
	<!-- Insert the explaination of the fact -->
			Explained: 	<textarea name="explained" rows="10" cols="100"><?php if(isset($_POST['explained'])) echo $_POST['explained']; ?></textarea>
						</br>
	<!-- Inserts the link for the want to know more area --> 
			Link: 		<input type="text" name="link" size="50" value="<?php if(isset($_POST['link'])) echo $_POST['link']; ?>" />
						</br>
	<!-- Insert image area -->
			<input type="file" name="file" accept="image/*" />
			</br>
	<!-- Submit button -->
			<input type="submit" name="submit" value="submit">
			</br></br>
	<!-- Display errors -->
			<span class="displayerrors">
				Alerts:</br>
				<?php if(isset($errors['name1'])) echo $errors['name1']; ?></br>
				<?php if(isset($errors['explained1'])) echo $errors['explained1']; ?></br>
				<?php if(isset($errors['link1'])) echo $errors['link1']; ?></br>
				<?php if(isset($errors['imagename1'])) echo $errors['imagename1']; ?></br>
				<?php if(isset($errors['imagename2'])) echo $errors['imagename2']; ?></br>
				<?php if(isset($noerrors['noerrors1'])) echo $noerrors['noerrors1']; ?></br>
			</span>
		</form>
	</body>
</html>