<?php
/**
 * Header Template
 *
 *
 * @file           header.php
 * @package        InstantWP 
 * @author         Brad Williams 
 * @copyright      2011 - 2014 GentsThemes
 * @license        license.txt
 * @version        Release: 3.2.0
 * @link           http://codex.wordpress.org/Theme_Development#Document_Head_.28header.php.29
 * @since          available since Release 1.0
 */
?>
<!doctype html>
<!--[if lt IE 7 ]> <html class="no-js ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-P5FZBC7');</script>
<!-- End Google Tag Manager -->
<title><?php wp_title('&#124;', true, 'right'); ?><?php bloginfo('description'); ?> - Alan Coleman</title>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="title" content="<?php wp_title('&#124;', true, 'right'); ?><?php bloginfo('description'); ?> - Alan Coleman" >
<?php ac_head_meta(); ?> 
<meta name="copyright" content="&copy; 2014 Alan Coleman" >
<meta name="author" content="Alan Coleman" >
<meta name="robots" content="INDEX,FOLLOW" >
<link rel="icon" href="<?php echo get_site_url(); ?>/favicon.png">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?> 
<!-- Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="<?php bloginfo('template_url'); ?>/js/respond.min.js"></script>
<![endif]-->
</head>
<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P5FZBC7"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<a href="https://plus.google.com/+AlanColeman" rel="publisher"></a>                 
<?php responsive_container(); // before container hook ?>        
<?php responsive_header(); // before header hook ?>
<header>
<?php responsive_in_header(); // header hook ?>
<nav role="navigation">
    <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
           <!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
            <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

           <?php if( bi_option('custom_logo', false, 'url') !== '' ) { ?>
            <div id="logo"><a href="<?php echo home_url(); ?>/" title="<?php bloginfo( 'name' ); ?>" rel="home">
                <img src="<?php echo bi_option('custom_logo', false, 'url'); ?>" alt="<?php bloginfo( 'name' ) ?>" />
            </a></div>
            <?php } else { ?>
            <?php if (is_front_page()) { ?>
            <a class="navbar-brand" href="<?php bloginfo( 'url' ) ?>/" title="<?php bloginfo( 'name' ) ?>" rel="homepage"><?php bloginfo( 'name' ) ?></a>
            <?php } else { ?>
            <a class="navbar-brand" href="<?php bloginfo( 'url' ) ?>/" title="<?php bloginfo( 'name' ) ?>" rel="homepage"><?php bloginfo( 'name' ) ?></a>
            <?php } } ?>
        </div>
          <div class="navbar-collapse collapse navbar-right navbar-responsive-collapse">
			   <?php

                $args = array(
                    'theme_location' => 'top-bar',
                    'depth'      => 2,
                    'container'  => false,
                    'menu_class'     => 'nav navbar-nav',
                    'walker'     => new Bootstrap_Walker_Nav_Menu()
                );
                if (has_nav_menu('top-bar')) {
                       wp_nav_menu($args);
                    }
            ?>
          </div>
        </div>
     </div>           
</nav>
    </header><!-- end of header -->
    <?php responsive_header_end(); // after header hook ?> 
	<?php responsive_wrapper(); // before wrapper ?>
        <div id="wrapper" class="clearfix">
    <?php responsive_in_wrapper(); // wrapper hook ?>