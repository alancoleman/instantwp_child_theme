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

switch ( getpageurl( get_permalink() ) ) {
	case 'about-alan-coleman':
		$metadesc = 'Find out more about Web Developer Alan Coleman';
		break;
	case 'contact-alan-coleman':
		$metadesc = 'How to get in contact Alan Coleman, about a web development project or just to say hello';
		break;
	case 'portfolio':
		$metadesc = 'More about Alan Coleman\'s web development work and projects to date';
		break;
	default:
		$metadesc = wp_title('&#124;', true, 'right');
}
?>
<!doctype html>
<!--[if lt IE 7 ]> <html class="no-js ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>

<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="title" content="<?php wp_title('&#124;', true, 'right'); ?><?php bloginfo('name'); ?>" >
<?php if ($metadesc) { ?>
<meta name="description" content="<?php echo $metadesc; ?>" >
<?php } ?>
<meta name="copyright" content="&copy; 2014 Alan Coleman" >
<meta name="author" content="Alan Coleman" >
<meta name="robots" content="INDEX,FOLLOW" >

<title><?php wp_title('&#124;', true, 'right'); ?><?php bloginfo('name'); ?></title>
<?php if( bi_option('custom_favicon') !== '' ) : ?>
        <link rel="icon" type="image/png" href="<?php echo bi_option('custom_favicon', false, 'url'); ?>" />
    <?php endif; ?>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?> 
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-37786043-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

<!-- Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php bloginfo('template_url'); ?>/js/respond.min.js"></script>
<![endif]-->

</head>

<body <?php body_class(); ?>>
                 
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
