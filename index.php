<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Badr Interactive
 */
get_header(); ?>

<div id="fullpage">
    <div class="section home-header" id="section0">
        <!-- Header -->
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="intro-lead-in">Selamat Datang di Perpustakaan Mitra Netra</div>
                        <div class="intro-heading">Kami menyediakan berbagai koleksi buku di perpustakaan kami</div>
                        <a href="<?php echo get_site_url() ?>/pustaka-digital" class="btn btn-home-works intro-works">Lihat Koleksi Buku</a>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <div class="section" id="section5">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-xs-12 icon">
                <a href="https://www.facebook.com/yayasanmitranetra">
                    <img src="<?php echo bloginfo('template_directory'); ?>/img/icons/icon_facebook_footer.png" alt="facebook mitra netra"/>
                </a>
            </div>
            <div class="col-md-8 col-xs-12 footer-right">
                <!--<a href="<?php echo get_site_url() ?>/index.php/contact/other-question" class="btn btn-footer-others">Ask Anything</a>
                <a href="<?php echo get_site_url() ?>/index.php/contact/quotation" class="btn btn-footer-quotation">Request a Quotation</a> -->
            </div>
                </div>
                <hr class="bates-footer">
                <div class="row">
                    <div class="col-md-12">
                     <p class="copywright">Copyright &copy2016 Mitra Netra Inc. All rights reserved.</p>
                     <p>&nbsp;</p>
                 </div>
             </div>
         </div>
     </footer>
 </div>
</div>
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
