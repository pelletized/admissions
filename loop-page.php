<?php
/**
 * The loop that displays a page.
 *
 * The loop displays the posts and the post content. See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-page.php.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.2
 */
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<section class="wrap clearfix">
<header class="article-header">				
	<div class="category">
		Bloggers <?php edit_post_link( __( 'Edit Page', 'twentyten' ), '<span class="edit-link">[', ']</span>' ); ?>
	</div><!--/category -->
	<h1 class="page-title"><?php the_title(); ?></h1>		
</header> <!--/article header -->


<?php 

//if regular page use
the_content(); 
//else if student bloggers use

?>


</section><!--/wrap-->
<div class="post-bottom"></div>	
<?php endwhile; // end of the loop. ?>
