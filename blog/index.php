<!DOCTYPE html>
<html>
	<head>
		<title>feargarden.xyz/blog</title>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="shortcut icon" href="res/favicon.gif" type="image/x-icon">
		<link href="res/monkaS/style.css" rel="stylesheet" type="text/css" media="all">
	</head>
	<body>
		<div class="container">
			<?php include './res/monkaS/nav.php';?>
			<div id="main">
				<?php 
					include './res/posts.php';
					$page = $_GET["p"];
					if ($page == null || is_numeric($page) == false) {$page = 1;}
					$y = 5; // number of posts to show
					$range_max = $page * $y;
					$range_min = $range_max - $y;
					$posts_total = sizeof($posts);
					$posts_remaining = $posts_total - $range_max;
					if ($range_max > $posts_total) {$range_max = $posts_total;}
					if (($range_min + 1) > sizeof($posts)) {include './res/error/toofar.php';}
					else {
						for ($x = $range_min; $x < $range_max; $x++) {
							$id = $posts[$x];
							include './res/genpost-md.php'; // write post
						}
					}
				?>
			</div>
			<div class="pagination">
				<?php
					$page_previous = $page - 1;
					$page_next = $page + 1;
					$display_next = true;
					if (($range_min + 1) <= sizeof($posts)) {
						if ($posts_remaining > 0) {
							// display next button
							echo '<a href="?p='.$page_next.'" class="next">next page</a>';
						}
						if ($page_previous > 0) {
							//display previous button
							echo '<a href="?p='.$page_previous.'" class="previous">previous page</a>';
						}
					}
				?>
			</div>
		</div>
	</body>
</html>
