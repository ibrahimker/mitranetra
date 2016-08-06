<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mitra Netra
 */

?>

<footer>
    <div class="container">
        <div class="row" style="padding-bottom:10px;">
            <div class="col-md-4 col-xs-12 icon">
                <a href="https://www.facebook.com/yayasanmitranetra">
                    <img src="<?php echo bloginfo('template_directory'); ?>/img/icons/icon_facebook_footer.png" alt="facebook mitra netra"/>
                </a>
            </div>
            <div class="col-md-8 col-xs-12 footer-right">

            </div>
        </div>
        <hr class="bates-footer">
        <div class="row">
            <div class="col-md-12">
             <p class="copywright">Copyright &copy2016 Mitra Netra. All rights reserved.</p>
             <p>&nbsp;</p>
         </div>
     </div>
 </div>
</footer>
<!-- Plugin JavaScript -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="<?php echo bloginfo('template_directory'); ?>/js/classie.js"></script>
<script src="<?php echo bloginfo('template_directory'); ?>/js/cbpAnimatedHeader.js"></script>

<!-- Contact Form JavaScript -->
<script src="<?php echo bloginfo('template_directory'); ?>/js/jqBootstrapValidation.js"></script>
<script src="<?php echo bloginfo('template_directory'); ?>/js/contact_me.js"></script>
<?php wp_footer(); ?>

</body>
</html>
