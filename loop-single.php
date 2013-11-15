<?php
//The loop that displays a single post.
?>

<div id="main" class="clearfix" role="main">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" class="post-1 post type-post status-publish format-standard hentry category-uncategorized clearfix" role="article" itemscope itemtype="http://schema.org/BlogPosting">	

	<header class="article-header">
		<div class="category">
			<?php twentyten_posted_in(); ?>
			<?php edit_post_link( __( 'Edit Post', 'twentyten' ), '<span class="edit-link">[', ']</span>' ); ?>
		</div><!--/category -->
		<h1 class="entry-title single-title" itemprop="headline"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
		<p class="byline vcard"><?php twentyten_posted_on(); ?></p>						
	</header> <!--/article header -->
	
	<section class="post-meta">
		<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="View all posts by <?php echo get_the_author(); ?>" rel="author"><?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyten_author_bio_avatar_size', 150 ) ); ?></a>		
		
		<h5 class="author-name"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="View all posts by <?php echo get_the_author(); ?>" rel="author"><?php printf( get_the_author() ); ?></a></h5>	
	
		<ul class="meta-social clearfix">
			<li class="meta-likes">
				<!--<span class="button"></span>-->				
				
				<!--<a href="http://www.addthis.com/bookmark.php"
					class="addthis_button_expanded"
				   addthis:url="<?php the_permalink(); ?>"
				   addthis:title="<?php the_title(); ?>">					
						<span class="addthis_counter" class="right">	</span>
				</a>-->		
				
				<script>	
				//show like/share button
				var atID = '<?php the_ID(); ?>';
				var atPermalink = '<?php the_permalink(); ?>';
				var atTitle = '<?php the_title(); ?>';
												
				head.ready(function() {
					addthisLink(atID,atPermalink,atTitle);
				  });				
				</script>				
				<div id="<?php the_ID(); ?>"></div>
				
				
				
				
			</li>
			<li class="meta-comments"><a href="#comments-title">
				<span class="button"></span>
				<?php comments_popup_link( __( '0', 'twentyten' ), __( '1', 'twentyten' ), __( '%', 'twentyten' ) ); ?>
				</a>
			</li>						
		</ul>
		
		
		<h5 class="uppercase">Category:</h5>		
		<p><?php twentyten_posted_in(); ?></p>
		
		
		<h5 class="uppercase">Tags:</h5>
		<p><?php the_tags(''); ?></p>
	</section>

	<section class="entry-content clearfix" itemprop="articleBody">
		<?php the_content(); ?>	
		
		<?php comments_template( '', true ); ?>
	</section> <!--/entry-content section -->		
</article> <!--/post article -->	
<?php endwhile; // end of the loop. ?>
		
	<div class="post-bottom"></div>
</div><!--/end main-->
