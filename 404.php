<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

<div class="wrap">
<div id="main" class="clearfix" role="main">

			<?php
			/* Run the loop to output the page.
			 * If you want to overload this in a child theme then include a file
			 * called loop-page.php and that will be used instead.
			 */
			//get_template_part( 'loop', 'page' );
			?>

<br />	
<p class="h2"><b>404 Not Found</b></p>
<p>We're sorry, the page you are looking for does not exist.</p>

<div class="post-bottom"></div>
			
</div><!--/main-->
<?php get_sidebar(); ?>
</div><!--/wrap-->
<?php get_footer(); ?>
