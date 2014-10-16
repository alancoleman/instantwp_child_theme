<?php
/**
 * Single Posts Template
 *
 *
 * @file           single.php
 * @package        InstantWP 
 * @author         Brad Williams 
 * @copyright      2011 - 2014 GentsThemes
 * @license        license.txt
 * @version        Release: 3.2.0
 * @link           http://codex.wordpress.org/Theme_Development#Single_Post_.28single.php.29
 * @since          available since Release 1.0
 */
?>
<?php get_header(); ?>

 <?php                           
   $images = rwmb_meta( 'wtf_blogimg', 'type=image' );
   if ($images) {
    ?>                    
         <?php foreach ( $images as $image ) { 
          $bgimg = $image['full_url'];
          echo "<div id='blogwrap' style='background-image: url($bgimg);'>";  
        } 
     } else { ?>
       <div id="blogwrap">
    <?php } ?>
      <div class="container">
      <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
          <h1><?php the_title(); ?></h1>
        </div>
      </div><! --/row -->
      </div> <!-- /container -->
  </div><! --/workwrap -->


  <div class="container">
    <div class="row mt mb">
      <div class="col-lg-8 col-lg-offset-2">

        <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>

        <article class="blog-wrap" id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/BlogPosting">
          
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
                <?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), '100' ); }?>
              </span>
            </div>
             <?php endif; ?>
                <h3 class="general-title" itemprop="name"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'gents'), the_title_attribute('echo=0')); ?>" itemprop="url"><?php the_title(); ?></a></h3>
              
                  
             <?php if( bi_option('enable_disable_meta','1') == '1') {    
              // Display post meta info
              gents_post_meta_post(); 
               } ?>
              
              </header>

             
          
          <div class="post-desc" itemprop="articleBody">
            <?php the_content(); ?>
          </div>

              <?php if ( get_the_author_meta('description') != '' ) : ?>

            <div class="author_box clearfix">
              <?php if (function_exists('get_avatar')) { echo '<div class="alignleft">' . get_avatar( get_the_author_meta('email'), '100' ) . '</div>'; }?>
              <h4><?php _e('About','responsive'); ?> <?php the_author_posts_link(); ?></h4>
              <p><?php the_author_meta('description') ?></p>
            </div><!-- end of author_box clearfix --> 

          <?php endif; // no description, no author's meta ?>

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

                            <footer class="article-footer">
                            <?php if( bi_option('enable_disable_tags','1') == '1') {?>

                            <div class="post-data">
                              <?php the_tags(__('Tagged with:', 'responsive') . ' ', ' ', '<br />'); ?>  
                            </div><!-- end of .post-data --> 
                            <?php } ?>            

                            <div class="post-edit"><?php edit_post_link(__('Edit', 'responsive')); ?></div>  
                          </footer>      

                        </div> <!--blog-media -->    
                        
                      </article><!-- end of #post-<?php the_ID(); ?> -->

                        <?php comments_template( '', true ); ?>

                      <?php endwhile; ?> 

                      <?php if (  $wp_query->max_num_pages > 1 ) : ?>
                      <nav class="navigation">
                       <div class="previous"><?php next_posts_link( __( '&#8249; Older posts', 'responsive' ) ); ?></div>
                       <div class="next"><?php previous_posts_link( __( 'Newer posts &#8250;', 'responsive' ) ); ?></div>
                     </nav><!-- end of .navigation -->
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