<?php
//The loop that displays a single post.
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
