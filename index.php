<html>
	<head>
		<title>feargarden.xyz</title>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="shortcut icon" href="favicon.gif" type="image/x-icon">
		<link href="//img.feargarden.xyz/layout/fg/style.simple.css" rel="stylesheet" type="text/css" media="all">
	</head>
	<body>
		<div class="container">
            <div class="content" id="main">              
				<?php 
					$page = $_GET["p"]; // get page name from url
					if ($page == null) {$page = 'index';} //if no variable, display home page
					$path = './p/' . $page . '/content.php'; // create path
					if (file_exists($path)){include $path;} // check if path is valid
					else {include './p/404.php';} // if not, give 404 page
					//echo '<title>feargarden.xyz - ' . $title . '</title>'; // page title, if not given
				?>
            </div>
            <div class="center" id="footer">
				<p>Site created by Reagan &#9734; <a href="?p=updates">2017-<?php echo date("Y");?></a></p>
				<p><a href="/"><img src="//img.feargarden.xyz/button/feargarden.gif" title="feargarden.xyz"></a></p>
            </div>
        </div>
    </body>
</html>