<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

<div class="wrap">
<div id="main" class="clearfix" role="main">	


	

<?php if ( have_posts() ) : ?>
<header class="article-header">				
	<div class="category">
		Search
	</div><!--/category -->
<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentyten' ), '<span>' . get_search_query() . '</span>' ); ?></h1>	
	<?php $postCount = $wp_query->found_posts;  ?>
	<h1 class="page-title"><?php single_tag_title(); ?></h1>
	<p>FOUND: <?php echo $postCount; ?> Articles related to the Search "<?php the_search_query(); ?>"</p>
</header> <!--/article header -->				
				<?php
				/* Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called loop-search.php and that will be used instead.
				 */
				 get_template_part( 'loop', 'search' );
				?>

				
<?php else : //no results ?>

<header class="article-header">				
	<div class="category">
		Search
	</div><!--/category -->
			
	<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentyten' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
</header> <!--/article header -->	
<?php _e( 'Nothing Found.', 'twentyten' ); ?><br />
<?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentyten' ); ?>

<?php endif; ?>
			


	
<div class="post-bottom"></div>
</div><!--/main-->
<?php get_sidebar(); ?>
</div><!--/wrap-->
<?php get_footer(); ?>
