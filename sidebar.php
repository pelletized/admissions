<?php
//The Sidebar containing the primary and secondary widget areas.
?>

<div id="sidebar">
	<nav class="uppercase">			
		<?php wp_nav_menu(); ?>
	</nav>
	
	<h6 class="uppercase">Subscribe to E-mails and Alerts Newsletter</h6>
	<p>Sign up for the Undergraduate Admissions Newsletter, delivered daily, and receive announcements throughout the day.<br /> <a href="http://www.nyu.edu/admissions/undergraduate-admissions/contact-us/request-information.html">Subscribe</a></p>
	
	<h6 class="uppercase">Archives</h6>
	<ul class="sidebar-archive-list">		
		<?php 
		//wp_get_archives( 'type=monthly' );  		
		?>
		
		<?php		
		//custom archive list
		global $wpdb;
		$limit = 0;
		$year_prev = null;
		$months = $wpdb->get_results("SELECT DISTINCT MONTH( post_date ) AS month ,	YEAR( post_date ) AS year, COUNT( id ) as post_count FROM $wpdb->posts WHERE post_status = 'publish' and post_date <= now( ) and post_type = 'post' GROUP BY month , year ORDER BY post_date DESC");
		foreach($months as $month) :
			$year_current = $month->year;
			if ($year_current != $year_prev){
				if ($year_prev != null){?>
				
				<?php } ?>
			
			<li><?php echo $month->year; ?>:
			
			<?php } ?>
			<a href="<?php bloginfo('url') ?>/<?php echo $month->year; ?>/<?php echo date("m", mktime(0, 0, 0, $month->month, 1, $month->year)) ?>">[<?php echo date("m", mktime(0, 0, 0, $month->month, 1, $month->year)) ?>]</a>
		<?php $year_prev = $year_current;

		if(++$limit >= 18) { break; } ?>
		
		<?php endforeach; ?>
		</li>
		
	</ul>
	
	
	
	<h6 class="uppercase">Recent Articles</h6>
	<div id="recent-articles"></div>

</div><!--/sidebar-->



		<div id="primary" class="widget-area" role="complementary">
			<ul class="xoxo">

<?php
	/* When we call the dynamic_sidebar() function, it'll spit out
	 * the widgets for that widget area. If it instead returns false,
	 * then the sidebar simply doesn't exist, so we'll hard-code in
	 * some default sidebar stuff just in case.
	 */
	if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>

			<li id="search" class="widget-container widget_search">
				<?php //get_search_form(); ?>
			</li>
		<?php endif; // end primary widget area ?>
			</ul>
		</div><!-- #primary .widget-area -->


