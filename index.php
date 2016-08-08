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
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <h1 class="intro-lead-in">Selamat datang di Pustaka Digital Mitra Netra</h1>
                        <h2 class="intro-heading">Berbagai koleksi buku khusus tuna netra tersedia untuk diunduh</h2>
                        <form action="<?php echo home_url( '/' ); ?>" method="get" class="form-inline">
                            <fieldset>
                                <legend class="sr-only">Search Box Pencarian Buku:</legend>
                                <div class="input-group" style="display:flex;">
                                    <label class="sr-only" for="search">Search Box Pencarian Buku</label>
                                    <input type="text" name="s" id="search" placeholder="Aku ingin membaca" value="<?php the_search_query(); ?>" class="form-control" style="height:50px;/>
                                    <input type="hidden" name="post_type" value="sdm_downloads"  />
                                    <label class="sr-only" for="searchsubmit">Search</label>
                                    <input type="submit" class="btn btn-primary btn-search" id="searchsubmit" value="Cari" />                 
                                </div>
                            </fieldset>
                        </form>
                        <h6>12.438 KOLEKSI | 26 PENERBIT | 1.024 PENGARANG | 2.312 UNDUH </h6>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </header>
        </div>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <center><h1>Tentang Kami</h1></center>
                        <p>Open Content (OCT) adalah bagian dari Indonesia Open Education Resources yang menyediakan layanan akses berbagai materi pendidikan secara gratis dan terbuka. Anda dapat melakukan pencarian di kotak pencarian yang tersedia dan mengunduh materi yang anda inginkan. Selain dapat mengunduh, anda juga dapat mengunggah materi anda ke dalam sistem dan membagikan materi anda ke pengguna lainnya.</p>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
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
