<?php
/**
 * Footer Template
 *
 *
 * @file           footer.php
 * @package        InstantWP 
 * @author         Brad Williams 
 * @copyright      2011 - 2014 GentsThemes
 * @license        license.txt
 * @version        Release: 3.2.0
 * @link           http://codex.wordpress.org/Theme_Development#Footer_.28footer.php.29
 * @since          available since Release 1.0
 */
?>
</div><!-- end of wrapper-->
<?php responsive_wrapper_end(); // after wrapper hook ?>


<?php responsive_container_end(); // after container hook ?>



<?php if( bi_option('disable_social_footer') == '1') { ?>     
<div id="social">
  <div class="container">
    <div class="row centered">
      <?php $social_options = bi_option( 'social_icons' ); ?>
      <?php foreach ( $social_options as $key => $value ) {
        if ( $value ) { ?>
        <div class="col-lg-2">
          <a href="<?php echo $value; ?>" title="<?php echo $key; ?>" target="_blank">
            <i class="fa fa-<?php echo $key; ?>"></i>
          </a>
        </div>
        <?php }
      } ?>
    </div><! --/row -->
  </div><! --/container -->
</div><! --/social -->
<?php } ?>

<footer id="footerwrap">
  <div class="container">

      <div class="row centered">

        <div class="col-lg-4">
           <?php if (!dynamic_sidebar('footer-widget-1')) : ?>
           
            <?php endif; //end of footer-widget-1 ?>
        </div> 

       
        <div class="col-lg-4">
             <?php if (!dynamic_sidebar('footer-widget-2')) : ?>
            
            <?php endif; //end of footer-widget-1 ?>
        </div>
        

        <div class="col-lg-4">
             <?php if (!dynamic_sidebar('footer-widget-3')) : ?>
            
            <?php endif; //end of footer-widget-1 ?>
        </div><!-- end .col-lg-4-->

    </div><!-- end row -->
  </div> <!-- end container --> 
</footer><!-- end #footer -->

<?php wp_footer(); ?>

</body>
</html>