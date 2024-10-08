<?php
/**
 * Search Template
 *
 *
 * @file           search.php
 * @package        InstantWP 
 * @author         Brad Williams 
 * @copyright      2011 - 2014 GentsThemes
 * @license        license.txt
 * @version        Release: 3.2.0
 * @link           http://codex.wordpress.org/Theme_Development#Search_Results_.28search.php.29
 * @since          available since Release 1.0
 */
?>
<?php get_header(); ?>

  <!-- *****************************************************************************************************************
   BLUE WRAP
   ***************************************************************************************************************** -->

                   <?php
    $title  = get_the_title();
    $keys= explode(" ",$s);
    $title  = preg_replace('/('.implode('|', $keys) .')/iu',
        '<strong class="search-excerpt">\0</strong>',
        $title);
?>


       <div id="aboutwrap">
      <div class="container">
      <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
           <h1><?php _e('We found','responsive'); ?> 
			<?php
                $allsearch = &new WP_Query("s=$s&showposts=-1");
                $key = esc_html($s, 1);
                $count = $allsearch->post_count;
                _e(' &#8211; ', 'responsive');
                echo $count . ' ';
                _e('articles for ', 'responsive');
                _e('<span class="post-search-terms">', 'responsive');
                echo $key;
                _e('</span><!-- end of .post-search-terms -->', 'responsive');
                wp_reset_query();
            ?>
            </h1>
        </div>
      </div><! --/row -->
      </div> <!-- /container -->
  </div><! --/aboutwrap -->

<div class="container">
    <div class="row mt mb">
      <div class="col-lg-8 col-lg-offset-2">


<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
          
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <header>
                <h1 class="search-page-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'responsive'), the_title_attribute('echo=0')); ?>"><?php echo $title; ?></a></h1>
                </header>

                     <?php if( bi_option('enable_disable_meta','1') == '1') {?>
          <section>
            <p>
            <?php 
            printf( __( '<span class="csmall">Posted: %2$s </span> | <span class="csmall2"> %3$s </span>', 'responsive' ),'meta-prep meta-prep-author',
              sprintf( '<a href="%1$s" title="%2$s" rel="bookmark">%3$s</a>',
               get_permalink(),
               esc_attr( get_the_time() ),
               get_the_date()
               ),
              sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
               get_author_posts_url( get_the_author_meta( 'ID' ) ),
               sprintf( esc_attr__( 'View all posts by %s', 'responsive' ), get_the_author() ),
               get_the_author()
               )
              );
              ?>
              <?php if ( comments_open() ) : ?>
              <span class="comments-link">
                <span class="mdash">&mdash;</span>
                <?php comments_popup_link(__('No Comments <i class="icon-arrow-down"></i>', 'responsive'), __('1 Comment <i class="icon-arrow-down"></i>', 'responsive'), __('% Comments <i class="icon-arrow-down"></i>', 'responsive')); ?>
              </span>
            <?php endif; ?> 
            </p>
          </section>
          <?php } ?>
                                
                <section class="post-entry">
                    <?php the_content(__('Read more &raquo;', 'responsive')); ?>
                    <?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'responsive'), 'after' => '</div><!-- end of .pagination -->')); ?>
                </section><!-- end of .post-entry -->
                           
            
            </article><!-- end of #post-<?php the_ID(); ?> -->
            
			<?php comments_template( '', true ); ?>
            
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
    </div>
</div>


<?php get_footer(); ?>