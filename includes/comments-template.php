<ul class="single-comment wrap clearfix" id="comment-<?php comment_ID(); ?>">		
		<li><div class="comment-body"><?php comment_text(); ?></div>
		
			<div class="comment-meta">
				<p>
					<?php //echo get_avatar( $comment, 40 ); ?>
					<?php printf( __( '%s', 'twentyten' ), sprintf( '<strong>%s</strong><br />', get_comment_author_link() ) ); ?>
					
					<time datetime="<?php echo get_comment_date();?>"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"></time>
					<?php
						/* translators: 1: date, 2: time */
						printf( __( '%1$s', 'twentyten' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' );
					?><!--/comment date-->
				</p>

				
				<?php 
					comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => 'REPLY &raquo;' ) ) ); 	
				?>			
			</div><!--/comment-meta -->
		
		</li>
		
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentyten' ); ?></em>
			<br />
		<?php endif; ?>


		
	</ul><!-- #comment-##  -->