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

?>