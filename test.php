<?php
	
	if (isset($_POST['submit'])) {
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
	}


?>

<html>
<head>
	<meta charset="UTF-8">
	<title>Testing</title>
</head>
<body>
	<form action="test.php" method="post" enctype="multipart/form-data">
	
	<input type="file" name="file" /> <br><br>
	<input type="submit" name="submit" value="submit" />

	</form>

</body>
</html>