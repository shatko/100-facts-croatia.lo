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
	<script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript">
	tinymce.init({
	    selector: "textarea",
	    plugins: [
	        "advlist autolink lists link image charmap print preview anchor",
	        "searchreplace visualblocks code fullscreen",
	        "insertdatetime media table contextmenu paste"
	    ],
	    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
	});
	</script>
</head>
<body>
	<div class="container">
	    <div class="facts"> 
			<form action="edit.php?fact=<?php echo $factId;?>" method="post" enctype="multipart/form-data">
	        	<div class="row">
	        		<div class="col-md-6 imgholder">
						<img src="img/<?php echo $display_image; ?>" alt="Smiley face" height="400px" width="550px">
					</div>
					<div class="col-md-6">
				 		<textarea name="explained" rows="5" cols="50"><?php echo $display_explained; ?></textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						Name:<input type="text" name="name" value="<?php echo $display_name ?>" /> 
					</div>
					<div class="col-md-6">
						Link:<input type="text" name="link" value="<?php echo $display_link; ?>" />
					</div>
				</div>
			</form>
		</div>
		<input type="submit" name="submit" value="submit">
		</br>
		<span class="displayerrors">
			Alerts:</br>
			<?php if(isset($errors['name1'])) echo $errors['name1']; ?></br>
			<?php if(isset($errors['explained1'])) echo $errors['explained1']; ?></br>
			<?php if(isset($errors['link1'])) echo $errors['link1']; ?></br>
			<?php if(isset($noerrors['noerrors1'])) echo $noerrors['noerrors1']; ?></br>
		</span>
	</div>
	<form method="post" action="somepage">
    <textarea name="content" style="width:100%"></textarea>
</form>
</body>
</html>