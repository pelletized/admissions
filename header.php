<!doctype html>  

<!--[if lt IE 7]><html dir="ltr" lang="en-US" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html dir="ltr" lang="en-US" class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html dir="ltr" lang="en-US" class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html dir="ltr" lang="en-US" class="no-js"><!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="icon" href="http://www.nyu.edu/common/images/favicon.ico" type="image/x-icon"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<script src="/wp-content/themes/admissions/js/head.min.js"></script>
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class(); ?>>
<header class="header" role="banner">
	<div id="header-top">
		<ul class="wrap">
			<li><a href="http://www.nyu.edu/" id="logo-nyu" class="logo off-left">New York University</a></li>
			<li><a href="http://www.nyu.edu/admissions.html" id="logo-uga" class="logo off-left">Undergraduate Admissions</a></li>
		</ul>	
	</div><!--/header-top-->


	<div class="wrap clearfix">
		<?php if(is_home()) { ?>
			<h1 class="h1 left"><a href="/"><?php bloginfo( 'name' );?></a></h1>			
		<?php } else { ?>
			<p class="h1 left"><a href="/"><?php bloginfo( 'name' );?></a></p>	
		<?php } ?>
		
		<?php get_search_form(); ?>
	</div> <!--/wrap-->

</header> <!--/header -->