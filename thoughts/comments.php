
<!-- This line of code prevents users from viewing comments.php by accident. -->
<?php if(!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) : ?>  	
	<?php die('You can not access this page directly!'); ?>  
<?php endif; ?>
<!-- 
This statement (well, 2 actually, but it makes more sense if you view them as one) checks whether 
a password is required to view the post. Obviously, if you don't have the password to view the 
post, you're also not allowed to view the comments.

The first if checks whether there is a password set. The second if statement checks whether 
there is a cookie with a password in place and displays the according message 
when it's not there. You can customize the error message by placing whatever 
you choose inside the second if statement. 
-->
<?php if(!empty($post->post_password)) : ?>
  	<?php if($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) : ?>
		<p>This post is password protected. Enter the password to view comments.</p>
  	<?php endif; ?>
<?php endif; ?>
<!-- 
This first conditional statement (if($comments)) checks if there are comments and then 
loops through them with a foreach statement. Inside the foreach statement, you'll notice 
the following conditional statement: if($comment->comment_approved == '0'). This checks if 
the comment has been approved, and shows a message if it's not yet approved. 
-->
<?php if($comments) : ?>
  	<ol>
    	<?php foreach($comments as $comment) : ?>
  		<li id="comment-<?php comment_ID(); ?>">
  			<?php if ($comment->comment_approved == '0') : ?>
  				<p>Your comment is awaiting approval</p>
  			<?php endif; ?>
  			<?php comment_text(); ?>
  			<p class="meta"><?php comment_type(); ?> by <?php comment_author_link(); ?> on <?php comment_date(); ?> at <?php comment_time(); ?></p>
  		</li>
		<?php endforeach; ?>
	</ol>
<?php else : ?>
	<p>No comments yet</p>
<?php endif; ?>

<!-- 
The first conditional statement you encounter is  if(comments_open())  This basically checks 
if the comments are open. Obviously, if the comments are closed, you can't post a comment and 
the comment form is not needed. You can put the message you want to be displayed if the comments 
are closed between the last  else : and endif; 

The second conditional statement: if(get_option('comment_registration') && !$user_ID) :  
checks whether you need to be registred to post a comment and if you are logged in. If the 
conditional statement is fulfilled, the script should display a link to a place where users 
can log in. If registration is not required or you are already logged in, the script will 
continue with the else part and display the form.

Our final conditional statement then checks if you are logged in or not. Obviously, if you're 
already logged in it's useless to make you fill in your name, email and website again. 
-->
<?php if(comments_open()) : ?>
	<?php if(get_option('comment_registration') && !$user_ID) : ?>
		<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p><?php else : ?>
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
			<?php if($user_ID) : ?>
				<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Log out &raquo;</a></p>
			<?php else : ?>
				<p>
					<label for="author">Name <?php if($req) echo "<span>*</span>"; ?></label>
					<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" tabindex="1" />
				</p>
				<p>
					<label for="email">Mail (will not be published) <?php if($req) echo "<span>*</span>"; ?></label>
					<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" tabindex="2" />
				</p>
				<p>
					<label for="url">Website</label>
					<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" tabindex="3" />
				</p>
			<?php endif; ?>
			<p><textarea name="comment" id="comment" tabindex="4"></textarea></p>
			<p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
			<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></p>
			<?php do_action('comment_form', $post->ID); ?>
		</form>
	<?php endif; ?>
<?php else : ?>
	<p>The comments are closed.</p>
<?php endif; ?>