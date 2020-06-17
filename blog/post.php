<?php 
	$id = $_GET["id"]; // get page name from url
	if ($id == null) {$error = true;} 
	else {
		$path = './post/' . $id . '.md'; // create path
		if (file_exists($path)){ 
			$error = false;
		}
		else {$error = true;}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>feargarden.xyz/blog - #<?php echo $id?></title>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="shortcut icon" href="res/favicon.gif" type="image/x-icon">
		<link href="res/monkaS/style.css" rel="stylesheet" type="text/css" media="all">
	</head>
	<body>
		<div class="container">
			<?php include './res/monkaS/nav.php';?>
			<div id="main">
				<?php 
					if ($error == false) {
						include './res/genpost-md.php'; // write post 
					}
					else {
						include './res/error/invalid.php';
					}
				?>				
			</div>
		</div>
	</body>
</html>
