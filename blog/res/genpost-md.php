<?php
	// https://commonmark.thephpleague.com/1.4/basic-usage/
	include './vendor/autoload.php'; // composer autoload
	use League\CommonMark\CommonMarkConverter;
	use League\CommonMark\Environment;
	use League\CommonMark\Extension\Autolink\AutolinkExtension;
	use League\CommonMark\Extension\Strikethrough\StrikethroughExtension;
	use League\CommonMark\Extension\Table\TableExtension;
	use League\CommonMark\Extension\TaskList\TaskListExtension; 
	$environment = Environment::createCommonMarkEnvironment();
	$environment->addExtension(new AutolinkExtension());
	$environment->addExtension(new StrikethroughExtension());
	$environment->addExtension(new TableExtension());
	$environment->addExtension(new TaskListExtension());
	$converter = new CommonMarkConverter([], $environment);
	$path = './post/' . $id . '.md'; // create path
	echo '<div class="post"><span class="permalink">[ <a href="post.php?id='. $id .'">permalink</a> ]</span>';
	if (file_exists($path)){ // check if the path is valid
			$markdown = file_get_contents($path); // get contents of file
			echo $converter->convertToHtml($markdown); // convert markdown to html
		}
		else {include './res/error/404.php'; return; // if path isn't valid, return an error
	}	
	echo '</div>';
?>
