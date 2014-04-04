<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
<div class="wrap">
<div id="main" class="clearfix" role="main">

<?php
	/* Queue the first post, that way we know
	 * what date we're dealing with (if that is the case).
	 *
	 * We reset this later so we can run the loop
	 * properly with a call to rewind_posts().
	 */
	if ( have_posts() )
		the_post();
?>

		
		
<?php if ( is_day() ) : ?>
<header class="article-header">
				<div class="category">
					Archive
				</div><!--/category -->
				<h1 class="page-title"><?php printf( __( 'Daily Archives: <span>%s</span>', 'twentyten' ), get_the_date() ); ?></h1>
</header> <!--/article header -->				
<?php elseif ( is_month() ) : ?>
<header class="article-header">
				<div class="category">
					Archive
				</div><!--/category -->
				<h1 class="page-title"><?php printf( __( 'Monthly Archives: <span>%s</span>', 'twentyten' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'twentyten' ) ) ); ?></h1>
</header> <!--/article header -->				
<?php elseif ( is_year() ) : ?>
<header class="article-header">
				<div class="category">
					Archive
				</div><!--/category -->
				<h1 class="page-title"><?php printf( __( 'Yearly Archives: <span>%s</span>', 'twentyten' ), get_the_date( _x( 'Y', 'yearly archives date format', 'twentyten' ) ) ); ?></h1>
</header> <!--/article header -->				
<?php elseif ( is_category() ) : ?>
<header class="article-header">
				<?php $postCount = $wp_query->found_posts;  ?>
				<div class="category">
					Category
				</div><!--/category -->
				<h1 class="page-title"><?php single_cat_title(); ?></h1>
</header> <!--/article header -->
				<p>FOUND: <?php echo $postCount; ?> Articles related to the Category "<?php single_cat_title(); ?>"</p>
<?php elseif ( is_tag() ) : ?>
<header class="article-header">
				<?php $postCount = $wp_query->found_posts;  ?>
				<div class="category">
					Tag
				</div><!--/category -->
				<h1 class="page-title"><?php single_tag_title(); ?></h1>
</header> <!--/article header -->
				<p>FOUND: <?php echo $postCount; ?> Articles related to the Tag "<?php single_tag_title(); ?>"</p>
				
<?php else : ?>
<header class="article-header">
				<?php _e( 'Blog Archives', 'twentyten' ); ?>
</header> <!--/article header -->				
<?php endif; ?>			
	


			

<?php
	/* Since we called the_post() above, we need to
	 * rewind the loop back to the beginning that way
	 * we can run the loop properly, in full.
	 */
	rewind_posts();

	/* Run the loop for the archives page to output the posts.
	 * If you want to overload this in a child theme then include a file
	 * called loop-archive.php and that will be used instead.
	 */
	 //get_template_part( 'loop', 'archive' );
?>

<?php
//The loop that displays an archive.
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" class="post-1 post type-post status-publish format-standard hentry category-uncategorized clearfix" role="article" itemscope itemtype="http://schema.org/BlogPosting">	

	<header class="article-header" style="margin-bottom:10px;">
	
		<p>
			Author: <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="View all posts by <?php echo get_the_author(); ?>" rel="author"><?php printf( get_the_author() ); ?></a>
			
			PUBLISHED: <time datetime="<?php the_time('o-m-d') ?>"><a href="<?php the_permalink(); ?>"><?php printf( get_the_date() ); ?></a></time>		
		</p>
	
	
		<h2 itemprop="headline"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
	</header> <!--/article header -->
		
		<?php the_excerpt(); ?>
		
		<div class="category">
			<?php //twentyten_posted_in(); ?>
			<?php edit_post_link( __( 'Edit Post', 'twentyten' ), '<span class="edit-link">[', ']</span>' ); ?>
		</div><!--/category -->		
</article> <!--/post article -->	
<br />
<?php endwhile; // end of the loop. ?>
		
		<?php posts_nav_link(' - ','&laquo; Previous','Next &raquo;'); ?>		
		
	<div class="post-bottom"></div>


</div><!--/main-->
<?php get_sidebar(); ?>
</div><!--/wrap-->
<?php get_footer(); ?>
