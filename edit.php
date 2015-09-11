<?php include ('connect.php'); ?>
<?php
	$factId = isset($_GET['fact']) ? $_GET['fact'] : false;
	$sql2 = "SELECT * FROM crofacts WHERE croid = $factId";
	$result2 = $conn->query($sql2);

	while ($row = $result2->fetch_assoc()) {
		$display_name = $row['croname'];
	    $display_image = $row['croimages'];
	    $display_explained = $row['croexplained'];
	    $display_link = $row['crolink'];
	}
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
/* checks if the needed characters are used */
		if(!preg_match('/^(http|https):/', $_POST['link'])) {
			$errors['link1'] = "** Enter valid link!";
		}
/* connection to a database and send data if no errors */
		if (count($errors) == 0) {
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
			mysqli_select_db($conn, $dbname);
			$sql = "UPDATE crofacts SET croname='$_POST[name]', croexplained='$_POST[explained]', crolink='$_POST[link]' WHERE croid='$factId'";
/* sets utf8 on input */
			mysqli_query($conn, "SET NAMES utf8");
			mysqli_query($conn, $sql);
			mysqli_close($conn);
		}
	}	
?>
<html>
	<html lang="hr">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>edit</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>
	<form action="edit.php?fact=<?php echo $factId;?>" method="post" enctype="multipart/form-data">
<!-- Insert the name of the fact -->
		Name:		<input type="text" name="name" value="<?php echo $display_name ?>" /> 
					</br>
<!-- Insert the explaination of the fact -->
		Explained: 	<textarea name="explained" rows="10" cols="100"><?php echo $display_explained; ?></textarea>
					</br>
<!-- Inserts the link for the want to know more area --> 
		Link: 		<input type="text" name="link" value="<?php echo $display_link; ?>" />
					</br>
		<img src="img/<?php echo $display_image; ?>" alt="Smiley face" height="100px" width="100px">
<!-- Submit button -->
		<input type="submit" name="submit" value="submit">
		</br></br>
		<span class="displayerrors">
			Alerts:</br>
			<?php if(isset($errors['name1'])) echo $errors['name1']; ?></br>
			<?php if(isset($errors['explained1'])) echo $errors['explained1']; ?></br>
			<?php if(isset($errors['link1'])) echo $errors['link1']; ?></br>
			<?php if(isset($noerrors['noerrors1'])) echo $noerrors['noerrors1']; ?></br>
		</span>
	</form>
</body>
</html>