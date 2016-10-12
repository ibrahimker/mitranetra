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
 * @package Mitra Netra
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
                        <ul id="stat-list">
                            <li><?php echo wp_count_posts('sdm_downloads')->publish; ?> Total Koleksi</li>
                            <li><?php echo getTotalDownload(); ?> Kali diunduh</li>
                        </ul>
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
                        <center><h1 style="padding: 50px 0px 30px 0px;font-size: 2em;text-transform: none;font-weight:400;">Membaca Buku, Membaca Dunia</h1></center>
                        <p style="font-size:16px;font-family: 'Hind', sans-serif;">Pustaka digital mitra netra adalah sebuah perpustakaan yang menyediakan berbagai koleksi buku digital untuk dinikmati tuna netra. Penyelenggaran perpustakaan ini tidak melanggar hak cipta dengan mengacu pada UU Republik Indonesia No. 28 Tahun 2014 Tentang Hak Cipta Pasal 44 ayat 2: <b>"Fasilitasi akses atas suatu Ciptaan untuk penyandang tuna netra, penyandang kerusakan penglihatan atau keterbatasan dalam membaca, dan/atau pengguna huruf braille, buku audio, atau sarana lainnya, tidak dianggap sebagai pelanggaran Hak Cipta jika sumbernya disebutkan atau dicantumkan secara lengkap, kecuali bersifat komersial."</b></p>
                        <div class="row" style="padding:30px;">
                            <center><a href="<?php echo get_site_url() ?>/pustaka-digital" class="btn btn-badr">Mulai Membaca</a></center>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>
        <div class="section" id="section5">
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-xs-12 icon">
                            <a href="https://www.facebook.com/yayasanmitranetra">
                                Facebook
                                <!-- <img src="<?php echo bloginfo('template_directory'); ?>/img/icons/icon_facebook_footer.png" alt="facebook mitra netra"/> -->
                            </a>
                            |
                            <a href="https://twitter.com/mitra_netra">
                                <!-- <img src="<?php echo bloginfo('template_directory'); ?>/img/icons/icon_twitter_footer.png" alt="twitter mitra netra"/> -->
                                Twitter
                            </a>
                            |
                            <a href="http://mitranetra.or.id/">
                                <!-- <img src="<?php echo bloginfo('template_directory'); ?>/img/icons/icon_mitranetra_footer.png" alt="Website mitra netra"/> -->
                                Mitra Netra
                            </a>
                            |
                            <a href="http://seribubuku.kebi.or.id/">
                                <!-- <img src="<?php echo bloginfo('template_directory'); ?>/img/icons/icon_mitranetra_footer.png" alt="Website mitra netra"/> -->
                                Seribu Buku
                            </a>              
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
