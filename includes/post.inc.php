<form class="form-horizontal" action="httphandler.class.php" method="POST">
	<fieldset>
		<legend>Post your thoughts</legend>
		<input name="method" type="hidden" value="postthoughts" />
		<input name="userid" type="hidden" value="<?php echo $session->userid; ?>" />
		<input name="username" type="hidden" value="<?php echo $session->username; ?>" />
		<input name="sessid" type="hidden" value="<?php echo $session->sessid; ?>" />
		<label for="title">Title</label>
		<input type="text" name="title" class="input-block-level" placeholder="Your title" required />
		<label for="thoughts">Your thoughts</label>
		<textarea name="thoughts" required></textarea>
		<button class="btn" type="submit">Submit</button>
	</fieldset>
</form>
<?php
$post = new post($session->userid);
foreach ($post->getposts() as $postitem)
{
	echo '<section>';
	echo '<article>';
	echo '<h1>'.$postitem->title.'</h1>';
	echo $postitem->thoughts;
	echo '<footer>Published: <time pubdate datetime="'.date("Y-m-d", strtotime($postitem->created)).'">'.date("dS F Y", strtotime($postitem->created)).'</time></footer>';
	echo '</article>';
	echo '<section class="subsection">';
	foreach ($post->getresponses($postitem->id) as $respitem)
	{
		echo '<article>';
		echo '<h1>'.$respitem->title.'</h1>';
		echo $respitem->thoughts;
		echo '<footer>Published: <time pubdate datetime="'.date("Y-m-d", strtotime($respitem->created)).'">'.date("dS F Y", strtotime($respitem->created)).'</time></footer>';		
		echo '</article>';
	}
	echo '</section> <!-- end of subsection -->';
	?>
	<form class="form-horizontal" action="httphandler.class.php" method="POST">
		<fieldset>
			<legend>Actions</legend>
			<input name="method" type="hidden" value="respondingthoughts" />
			<input name="userid" type="hidden" value="<?php echo $session->userid; ?>" />
			<input name="username" type="hidden" value="<?php echo $session->username; ?>" />
			<input name="sessid" type="hidden" value="<?php echo $session->sessid; ?>" />
			<input name="respid" type="hidden" value="<?php echo $postitem->id; ?>" />
			<label for="title">Response to <?php echo $postitem->title; ?></label>
			<input type="hidden" name="title" class="input-block-level" value="Response to <?php echo $postitem->title; ?>" />
			<label for="thoughts">Your Response</label>
			<textarea name="thoughts" required></textarea>
			<button class="btn" type="submit">Respond</button>
		</fieldset>
	</form>
</section>
<?php
}
?>