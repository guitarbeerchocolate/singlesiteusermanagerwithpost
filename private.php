<?php
@session_start();
include_once 'classes/autoload.php';
include_once 'includes/privatesetup.inc.php';
?>
<html>
	<head>
		<title>Private : Single site user manager</title>
		<style>
		body
		{
			font:100%/1.618 sans-serif;
			color:#666666;
		}
		label, button
	    {
	      display: block;
	    }
	    section
	    {
	    	background:#EEEEEE;
	    }
	    section article
	    {
	    	background:#DDDDDD;
	    }
	    section section.subsection
	    {
	    	background:#CCCCCC;
	    }
	    section section.subsection article
	    {
	    	background:#BBBBBB;
	    }
		</style>
	</head>
	<body>
	<?php
	echo 'session name = '.$session->username.'<br />';
	echo 'session is = '.$session->sessid.'<br />';
	include 'includes/post.inc.php';
	// $db2 = new database('parent');
	// $results = $db2->query("SELECT * FROM `articles`");
	// if(isset($results))
	// {
	// 	foreach($results as $row)
	// 	{
	// 		echo $row->title.'<br />';
	// 	}
	// }
	?>
	<?php
	/* Admin panel for managing the site */
	$config = new config;
	if($config->values->AUTHORISING_USER == $session->username)
	{
		include 'includes/adminoptions.inc.php';
	}
	@session_regenerate_id(true);
	@session_write_close();
	?>
	</body>
</html>
