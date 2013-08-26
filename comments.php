<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to starkers_comment() which is
 * located in the functions.php file.
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<div id="comments">
	<?php if ( post_password_required() ) : ?>
	<p>This post is password protected. Enter the password to view any comments</p>
</div>

	<?php
			/* Stop the rest of comments.php from being processed,
			 * but don't kill the script entirely -- we still have
			 * to fully load the template.
			 */
			return;
		endif;
	?>

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>

	<ol>
		<?php wp_list_comments( array( 'callback' => 'starkers_comment' ) ); ?>
	</ol>

	<?php
		/* If there are no comments and comments are closed, let's leave a little note, shall we?
		 * But we don't want the note on pages or post types that do not support comments.
		 */
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
	
	<p>Comments are closed</p>
	
	<?php endif; ?>

	
<h2 class="gray"><a href="#" rel="toggle[comgroup]" class="commentlink" title="commentcol">Leave a Comment</a></h2>

<div id="comgroup" class="grid-whole">
	
	<?php comment_form(array('title_reply'=>'')); ?>
	
</div>
<div class="grid-whole">
<h2 class="book-title gray" style="margin-bottom: -50px; font-size: 24px">We'd love to know what you think.</h2>
<div id="com" class="grid-14 s-grid-13 m-grid-14"></div>
<div id="coma" class="grid-2 s-grid-3 m-grid-2 padded-inner-sides">
		<div class="arrow-container">
		<div class="arrow-down-border"></div>
		<div class="arrow-down"></div>
		</div>
</div>
</div>

</div><!-- #comments -->
