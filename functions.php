<?php
/**
 * Theme's Functions and Definitions
 *
 *
 * @file           functions.php
 * @package        InstantWP 
 * @author         Alan Coleman 
 * @copyright      2011 - 2014 GentsThemes
 * @license        license.txt
 * @version        Release: 3.2.0
 * @filesource     wp-content/themes/responsive/includes/functions.php
 * @link           http://codex.wordpress.org/Theme_Development#Functions_File
 * @since          available since Release 1.0
 */

/*
 * Add the hooks.php file
 */
require_once ( get_stylesheet_directory()  . '/hooks.php' );

?>
<?php
/*
 * Function to display the content of a given post. Two arguments for local and live allow the databases to be out of sync
 * displaypostcontent( 1387, 1399 ); // Call function like this
 */
function displaypostcontent( $localpostid, $livepostid ) {
	$localhostarray = array('127.0.0.1','::1');
		
	if(!in_array($_SERVER['REMOTE_ADDR'], $localhostarray)){
		$frontpagepostid = $localpostid;
	} else {
		$frontpagepostid = $livepostid;
	}
	if ( is_home() && get_query_var('paged') == 0 ) {
		$post = get_post($frontpagepostid);
		$post_content = $post->post_content;
		echo $post_content;
	}
}

/*
 *  Function to get the last part of a WordPress page url
*/
function getpageurl ( $permalink ) {
	// Parse premalink
	$parsed_url = parse_url( $permalink );
	// Set variable to path part of parsed permalink
	$parsed_url_path = $parsed_url['path'];
	// If the last character of $parsed_url_path is a trailing slash
	if ( $parsed_url_path[strlen( $parsed_url_path )-1] == '/') {
		// Remove trailing slash
		$parsed_url_path = substr( $parsed_url_path, 0, -1 );
	}
	// Explode remaining url into an array
	$parsed_url_path_exp = explode( '/', $parsed_url_path );
	// Return last element of array
	return end($parsed_url_path_exp);
}

if ( ! function_exists( 'gents_post_meta_clean' ) ) {

	function gents_post_meta_clean() {

		// Get post data
		global $post;
		$post_id = $post->ID;
		$post_type = get_post_type($post);
?>
		 <div class="post-meta">
         	<p>
            	<span class="publish-on updated"><time datetime="<?php echo date('Y-m-d', strtotime($post->post_date)); ?>" itemprop="datePublished"><?php echo get_the_date(); ?></time></span>  / By <a rel="author" href="https://plus.google.com/+AlanColeman" itemprop="author"><?php echo get_the_author(); ?></a>
            </p>
         </div>
		<?php
		
	} // End function
	
} //

if ( ! function_exists( 'gents_post_meta_post' ) ) {

	function gents_post_meta_post() {

		// Get post data
		global $post;
		$post_id = $post->ID;
		$post_type = get_post_type($post);

		// Get category for posts only
		if ( $post_type == 'post' ) {
			$category = get_the_category();
			$fist_category = $category[0];
			if ( isset($fist_category) ) {
				$category_name = $fist_category->cat_name;
				$category_url = get_category_link( $fist_category->term_id );
			}
		}

		// Get EDD Category
		if ( $post_type == 'download' && taxonomy_exists('download_category') ) {
			$category = get_the_terms( get_the_ID(), 'download_category', array('number' => '1') );
			if ( isset($category)) {
				$fist_category = reset($category);
				$category_name = $fist_category->name;
				$category_id = $fist_category->term_id;
				$category_url = get_term_link( $category_id, 'download_category' );
			}
		} ?>

		 <div class="post-meta">
              <p><span class="publish-on"><time datetime="<?php echo date('Y-m-d', strtotime($post->post_date)); ?>" itemprop="datePublished"><?php echo get_the_date(); ?></time></span> / By <a rel="author" href="https://plus.google.com/+AlanColeman" itemprop="author"><span class="author"><?php echo get_the_author(); ?></span></a>
              <?php if(isset($fist_category)){ ?> 
              <span class="sep">/</span> Category: <a href="<?php echo $category_url; ?>"><?php echo $category_name; ?></a> 
              <?php } ?>
              </p>
            </div>
		
		<?php
		
	} // End function
	
} // End if

/*
 *  Add Meta description tag
*/
function add_meta_desc() {
	
	$metadesc = '';

	switch ( getpageurl( get_permalink() ) ) {
		case 'about-alan-coleman':
			$metadesc = 'Find out more about web and application developer Alan Coleman';
			break;
		case 'contact-alan-coleman':
			$metadesc = 'How to get in contact Alan Coleman, about a web development project or just to say hello';
			break;
		case 'projects':
			$metadesc = 'More about Alan Coleman\'s web development work and projects to date';
			break;
		case 'services':
			$metadesc = 'Web development and application development services Alan Coleman has to offer';
			break;
		case 'blog':
			$metadesc = 'Alan Coleman\'s web development blog';
			break;
		default:
			$metadesc =  'Welcome to my web development site, the home of my blog and where you can find out about me and my web development work';
			break;
	}
	
	if ($metadesc) {
		echo'<meta name="description" content="' . $metadesc . '">';
	}
}

/*
 *  Add Meta description tag function to hook
*/

add_action('ac_head_meta','add_meta_desc',1);

?>