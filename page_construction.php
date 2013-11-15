		
<?php 
function contributors() {
global $wpdb;

$authors = $wpdb->get_results("SELECT ID, user_nicename from $wpdb->users WHERE display_name <> 'admin' ORDER BY display_name");


echo '<ul>';
foreach ($authors as $author ) {

//$authorAvatar = get_avatar($author->ID);
$authorAvatar = get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyten_author_bio_avatar_size', 150 ) );
$authorName = get_the_author_meta('display_name', $author->ID);

echo '<li class=clearfix>';
	
	echo '<div class="left">' . $authorAvatar . '</div>'; 
	echo '<div class="left">' . $authorName . '</div>'; 
	//echo the_author(); 
	
	
	
	echo '</li>';


	} //end foreach
echo '</ul>';	
}
 
 
echo contributors();
?>
		
<?php 
//author query

$authorQuery = 'author=' . get_the_author_meta('ID');
query_posts($authorQuery . '&showposts=2');

//The loop that displays an author recent posts.
rewind_posts();
?>
<h3>Recent Blog Entries</h3>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>


<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="uppercase"><?php the_date('d F Y'); ?></a>
<?php the_excerpt_max_charlength(140); ?>
<?php author_comment_count(); ?>


	
<?php endwhile; // end of the loop. 
wp_reset_query(); //reset original query
?>