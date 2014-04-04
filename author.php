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
<article class="clearfix">
<header class="article-header">				
	<div class="category">
		Author
	</div><!--/category -->
	<h1 class="page-title"><?php the_author(); ?></h1>		
</header> <!--/article header -->

<section class="author-meta">
<div class="author-avatar"><?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyten_author_bio_avatar_size', 245 ) ); ?></div><br />

<?php
if (!get_the_author_meta('user_email') == '') {
	$authorEmail = get_the_author_meta('user_email');
	echo "<strong>E-mail Address:</strong> <a href='mailto:" . $authorEmail . "'>" . $authorEmail . "</a><br />";	
}

if (!get_the_author_meta('user_url') == '') {
	$authorUrl = get_the_author_meta('user_url');
	echo "<strong>URL:</strong> <a href='" . $authorUrl . "'>" . $authorUrl . "</a><br />";	
}

if (!get_the_author_meta('aim') == '') {
	echo "<strong>AOL Instant Messenger:</strong> " . get_the_author_meta('aim') . "<br />";	
}

if (!get_the_author_meta('yim') == '') {
	echo "<strong>Yahoo! Instant Messenger:</strong> " . get_the_author_meta('yim') . "<br />";	
}

if (!get_the_author_meta('jabber') == '') {
	echo "<strong>Jabber/Google Talk:</strong> " . get_the_author_meta('jabber') . "<br />";	
}

if (!get_the_author_meta('facebook') == '') {
	$facebook = str_replace('https://www.facebook.com/','',get_the_author_meta('facebook'));
	echo "<strong>Facebook:</strong> <a href='https://www.facebook.com/" . $facebook . "'>". $facebook ."</a><br />";	
}

if (!get_the_author_meta('twitter') == '') {
	$twitter = str_replace('@','',get_the_author_meta('twitter'));
	echo "<strong>Twitter:</strong> <a href=\"http://twitter.com/" . $twitter . "\">@" . $twitter . "</a><br />";	
}

if (!get_the_author_meta('extraprofile') == '') {
	echo '<p>' . the_author_meta('extraprofile') . '</p>';
}
?>
</section>
			


<section class="entry-content clearfix" itemprop="articleBody">
	
	<?php 
		$description = get_the_author_meta( 'description', $post->post_author );		
		echo apply_filters('the_content', $description); 
	?>





<br /><br />
<h4>Recent Blog Entries</h4>
<?php 
//author query
$authorQuery = 'author=' . get_the_author_meta('ID');
query_posts($authorQuery . '&showposts=2');

//The loop that displays an author recent posts.
rewind_posts();
if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		

<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="uppercase"><?php the_date('d F Y'); ?></a>
<!--<h2 itemprop="headline"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>-->
	
<?php the_excerpt(); ?>	
	
<?php endwhile; // end of the loop. 
wp_reset_query(); //reset original query
?>
		
		
	
</section> <!--/entry-content section -->	
</article>
	<div class="post-bottom"></div>
</div><!--/main-->
<?php get_sidebar(); ?>
</div><!--/wrap-->
<?php get_footer(); ?>
