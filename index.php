<?php
/**
 * Index Template
 *
 *
 * @file           index.php
 * @package        InstantWP 
 * @author         Brad Williams 
 * @copyright      2011 - 2014 GentsThemes
 * @license        license.txt
 * @version        Release: 3.2.0
 * @link           http://codex.wordpress.org/Theme_Development#Index_.28index.php.29
 * @since          available since Release 1.0
 */
?>
   <?php get_header(); ?>
      <?php global $more; $more = 0; ?>

<?php if ( has_post_thumbnail()) { ?>
 <?php $background = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
  <div id="blogwrap" style="background-image: url('<?php echo $background[0]; ?>');">
    <?php } else { ?>
       <div id="blogwrap">
    <?php } ?>
      <div class="container">
      <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
          <?php if( rwmb_meta( 'wtf_blog_title' ) !== '' ) { ?>
            <?php echo rwmb_meta( 'wtf_blog_title' ); ?>
            <?php } ?> 
        </div>
      </div><! --/row -->
      </div> <!-- /container -->
  </div><! --/workwrap -->

<!-- *****************************************************************************************************************
   BLOG CONTENT
   ***************************************************************************************************************** -->

  <div class="container">
    <div class="row centered mt mb">
      <div class="col-lg-8 col-lg-offset-2">

        <?php
        global $wp_query;
        if ( get_query_var('paged') ) {
          $paged = get_query_var('paged');
        } elseif ( get_query_var('page') ) {
          $paged = get_query_var('page');
        } else {
          $paged = 1;
        }
        query_posts( array( 'post_type' => 'post', 'paged' => $paged ) );
        ?>   
        <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>
        
        

              <article class="blog-wrap text-center" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          
          <div class="blog-media">
          
          <section class="post-entry">
            <?php if ( has_post_thumbnail()) : ?>
            <div class="he-wrap tpl2">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
              <?php the_post_thumbnail(); ?>
            </div>
            </a>
          <?php endif; ?>

           <header class="page-header blog-title">
            <?php if ( has_post_thumbnail()) : ?>
            <div class="author-wrap">
              <span class="inside">
                 <?php 
                   echo get_avatar( $id_or_email, $size = '100' ); 
                   ?>
              </span>
            </div>
             <?php endif; ?>
                <h3 class="general-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'gents'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h3>
              
              <?php if( bi_option('enable_disable_meta','1') == '1') {    
              // Display post meta info
              gents_post_meta(); 
               } ?>
              
              </header>

             
          
          <div class="post-desc">
            <?php the_content(); ?>
          </div>

            <?php custom_link_pages(array(
              'before' => '<nav class="pagination"><ul>' . __(''),
              'after' => '</ul></nav>',
                            'next_or_number' => 'next_and_number', # activate parameter overloading
                            'nextpagelink' => __('&rarr;'),
                            'previouspagelink' => __('&larr;'),
                            'pagelink' => '%',
                            'echo' => 1 )
                            ); ?>

                           
                        </section><!-- end of .post-entry -->     

                        </div> <!--blog-media -->    
                        
                      </article><!-- end of #post-<?php the_ID(); ?> -->

                        <hr>

                      <?php endwhile; ?> 

                      <?php if (  $wp_query->max_num_pages > 1 ) : ?>
                      <nav>
                        <ul class="pager">
                         <li class="previous"><?php next_posts_link( __( '&#8249; Older posts', 'responsive' ) ); ?></li>
                         <li class="next"><?php previous_posts_link( __( 'Newer posts &#8250;', 'responsive' ) ); ?></li>
                       </ul><!-- end of .navigation -->
                     </nav>
                   <?php endif; ?>

                 <?php else : ?>

                 <article id="post-not-found" class="hentry clearfix">
                  <header>
                   <h1 class="title-404"><?php _e('404 &#8212; Fancy meeting you here!', 'responsive'); ?></h1>
                 </header>
                 <section>
                   <p><?php _e('Don&#39;t panic, we&#39;ll get through this together. Let&#39;s explore our options here.', 'responsive'); ?></p>
                 </section>
                 <footer>
                   <h6><?php _e( 'You can return', 'responsive' ); ?> <a href="<?php echo home_url(); ?>/" title="<?php esc_attr_e( 'Home', 'responsive' ); ?>"><?php _e( '&#9166; Home', 'responsive' ); ?></a> <?php _e( 'or search for the page you were looking for', 'responsive' ); ?></h6>
                   <?php get_search_form(); ?>
                 </footer>

               </article>

             <?php endif; ?>  

          </div>

    </div><! --/row -->
  </div><! --/container -->

           <?php get_footer(); ?>