<?php
/**
 * The loop that displays posts.
 *
 * The loop displays the posts and the post content. See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop.php or
 * loop-template.php, where 'template' is the loop context
 * requested by a template. For example, loop-index.php would
 * be used if it exists and we ask for the loop with:
 * <code>get_template_part( 'loop', 'index' );</code>
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>

<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
	<div id="post-0" class="post error404 not-found">
		<h1 class="entry-title"><?php _e( 'Not Found', 'twentyten' ); ?></h1>
		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyten' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</div><!-- #post-0 -->
<?php endif; ?>

<?php
	/* Start the Loop.
	 *
	 * In Twenty Ten we use the same loop in multiple contexts.
	 * It is broken into three main parts: when we're displaying
	 * posts that are in the gallery category, when we're displaying
	 * posts in the asides category, and finally all other posts.
	 *
	 * Additionally, we sometimes check for whether we are on an
	 * archive page, a search page, etc., allowing for small differences
	 * in the loop on each template without actually duplicating
	 * the rest of the loop that is shared.
	 *
	 * Without further ado, the loop:
	 */ ?>
<script src="http://s7.addthis.com/js/250/addthis_widget.js"></script>
<?php while ( have_posts() ) : the_post(); ?>



<?php /* How to display all other posts. */ ?>


		<article id="post-<?php the_ID(); ?>" class="home-post">	
		<header class="article-header">
			<?php if ( count( get_the_category() ) ) : ?>
					<div class="category">
						<?php printf( __( '%2$s', 'twentyten' ), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); ?>
						
						<?php edit_post_link( __( 'Edit Post', 'twentyten' ), '[<span class="edit-link">', '</span>]' ); ?>
					</div>					
				<?php endif; ?>
		
		
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		</header>
	
			
				<?php //the_excerpt(); ?>		

				<?php if ( has_post_thumbnail()) { ?>
				<div class="home-post-thumbnail">
				   <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
				   <?php the_post_thumbnail(); ?>
				   </a>
				  </div> 
				 <?php } else { ?>
					<div class="entry-content clearfix">
				<?php 	
					$more_link_text = "Read More";
					the_content($more_link_text);
				?>	
					</div><!--/entry-content -->
				<?php }  ?>
			
			
	

			<div class="home-post-meta clearfix">
				<div class="post-author-avatar">
					<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="View all posts by <?php echo get_the_author(); ?>" rel="author"><?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyten_author_bio_avatar_size', 75 ) ); ?></a>
				</div>				
				
				<ul class="home-meta-social">
					<li class="meta-likes">		
						<!--
						<script>		
						function addthisLink(atId, atUrl, atTitle) {
							var addthisButton = addthis.counter('#' + atId,{},{url : atUrl , title: atTitle});
							return addthisButton;							
						}
						
						addthisLink('<?php the_ID(); ?>','<?php the_permalink(); ?>','<?php the_title(); ?>');					 
						</script>					
						<div id="<?php the_ID(); ?>" class="addthis-link"></div>
						-->
						
						<a href="http://www.addthis.com/bookmark.php"
							class="addthis_button_expanded"
						   addthis:url="<?php the_permalink(); ?>"
						   addthis:title="<?php the_title(); ?>">					
								<!--<span class="addthis_counter" class="right">	</span>-->
						</a>
						
						
						<?php if(is_home()) {?>
							
						
						<?php } else { ?>
							echo 'whaaa';
							
							
						<?php } ?>
						
					</li>
					<li class="meta-comments">												
						<?php comments_popup_link( __( '<span class="button"></span> 0', 'twentyten' ), __( '<span class="button"></span> 1', 'twentyten' ), __( '<span class="button"></span> %', 'twentyten' ) ); ?>						
					</li>						
				</ul>				
				
				<time datetime="<?php the_time('o-m-d') ?>" class="post-date uppercase">
					<a href="<?php the_permalink();?>"><?php printf ( __( get_the_date() )); ?></a>
				</time>
				
				<div class="post-author">
					<h5 class="author-name"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="View all posts by <?php echo get_the_author(); ?>" rel="author"><?php printf( get_the_author() ); ?></a></h5>
				</div>
				
			</div><!--/home-post-meta-->
			<!--<div class="post-bottom"></div>-->
			<div class="post-bottom"></div>
		</article><!--/article -->			

<?php endwhile; // End the loop. Whew. ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
				<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php next_posts_link( __( '', 'twentyten' ) ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( '', 'twentyten' ) ); ?></div>
				</div><!-- #nav-below -->
<?php endif; ?>
