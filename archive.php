<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @author Ibrahim Nurandita Isbandiputra
 * @package Mitra Netra
 */
get_header();
?>
<!-- About Section -->
<section id="blog">
    <div class="container">
        <div class="col-md-1">
        </div>
        <div class="col-md-10">
            <div class="row">
                <h1 class="head-blog">Pustaka Digital</h1>
            </div>
            <div class="row">
              <form action="<?php echo home_url( '/' ); ?>" method="get" class="form-inline">
                <fieldset>
                    <legend class="sr-only">Search Box Pencarian Buku:</legend>
                    <div class="input-group" style="display:flex;">
                        <label class="sr-only" for="search">Search Box Pencarian Buku</label>
                        <input type="text" name="s" id="search" placeholder="Aku ingin membaca" value="<?php the_search_query(); ?>" class="form-control" style="height:50px;"/>
                        <input type="hidden" name="post_type" value="sdm_downloads"  />
                        <label class="sr-only" for="searchsubmit">Search</label>
                        <button type="submit" class="btn btn-primary btn-search" id="searchcubmit">
                            <span class='glyphicon glyphicon-search'></span>
                        </button>
                    </div>
                </fieldset>
            </form>
            <a href="#results" class="sr-only">Skip Category Navigation</a>
            <?php $terms = get_terms( 'sdm_categories', array(
                'orderby'    => 'count',
                'hide_empty' => 0
                ) ); ?>
                <br>
                <?php
                if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                   echo '<div>';
                   foreach ( $terms as $term ) {
                     echo '<a href="'.get_site_url().'/sdm_categories/'.$term->name.'"><span class="badge">' . $term->name.' '.$term->count. '</span></a>';
                     echo '  ';

                 }
                 echo '</div> ';
             }
             ?>
         </div>
     </br>
     <div id="#results" role="main">
         <?php if (have_posts()) : ?>
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            // $age=get_currentuser_age();
            // if($age==0) {
            //     query_posts('sdm_categories=anak-anak,remaja&post_type=sdm_downloads&posts_per_page=9&paged='.$paged);
            // }
            // else if($age>2 && $age <=15){
            //     query_posts('sdm_categories=anak-anak&post_type=sdm_downloads&posts_per_page=9&paged='.$paged);
            // }
            // else if($age>2 && $age <=21){
            //     query_posts('sdm_categories=anak-anak,remaja&post_type=sdm_downloads&posts_per_page=9&paged='.$paged);
            // }
            // else if($age>21) {
            //     query_posts('sdm_categories=anak-anak,remaja,dewasa&post_type=sdm_downloads&posts_per_page=9&paged='.$paged);
            // }
            ?>
            <?php $counter=0; ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php if($counter==0) : ?>
                    <div class="row">
                        <div class="col-md-4 post">
                            <div class="row">
                                <?php
                                $item_download_thumbnail = get_post_meta($id, 'sdm_upload_thumbnail', true);
                                $isset_download_thumbnail = isset($item_download_thumbnail) && !empty($item_download_thumbnail) ? '<center><img class="sdm_post_thumbnail_image" alt="Cover Buku" width="200px" height="250px" src="' . $item_download_thumbnail . '" /></center>' : '';
                                echo $isset_download_thumbnail;
                                ?>
                            </div>
                            <div class="row">
                                <center><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></center>
                            </div>
                            <div class="row">
                                <?php
                                $item_pengarang = get_post_meta($id, 'sdm_item_pengarang', true);
                                $isset_item_pengarang = isset($item_pengarang) ? $item_pengarang : '';
                                if (!empty($isset_item_pengarang)) {
                                    echo '<p class="sdm_post_download_version_value" align="center">' . $isset_item_pengarang . '</p>';
                                }
                                ?>
                            </div>
                        </div>
                        <?php $counter++; ?>
                    <?php elseif($counter==1) : ?>
                        <div class="col-md-4 post">
                            <div class="row">
                                <?php
                                $item_download_thumbnail = get_post_meta($id, 'sdm_upload_thumbnail', true);
                                $isset_download_thumbnail = isset($item_download_thumbnail) && !empty($item_download_thumbnail) ? '<center><img class="sdm_post_thumbnail_image" alt="Cover Buku" width="200px" height="250px" src="' . $item_download_thumbnail . '" /></center>' : '';
                                echo $isset_download_thumbnail;
                                ?>
                            </div>
                            <div class="row">
                                <center><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></center>
                            </div>
                            <div class="row">
                                <?php
                                $item_pengarang = get_post_meta($id, 'sdm_item_pengarang', true);
                                $isset_item_pengarang = isset($item_pengarang) ? $item_pengarang : '';
                                if (!empty($isset_item_pengarang)) {
                                    echo '<p class="sdm_post_download_version_value" align="center">' . $isset_item_pengarang . '</p>';
                                }
                                ?>
                            </div>
                        </div>
                        <?php $counter++; ?>
                    <?php else : ?>
                        <div class="col-md-4 post">
                            <div class="row">
                                <?php
                                $item_download_thumbnail = get_post_meta($id, 'sdm_upload_thumbnail', true);
                                $isset_download_thumbnail = isset($item_download_thumbnail) && !empty($item_download_thumbnail) ? '<center><img class="sdm_post_thumbnail_image" alt="Cover Buku" width="200px" height="250px" src="' . $item_download_thumbnail . '" /></center>' : '';
                                echo $isset_download_thumbnail;
                                ?>
                            </div>
                            <div class="row">
                                <center><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></center>
                            </div>
                            <div class="row">
                                <?php
                                $item_pengarang = get_post_meta($id, 'sdm_item_pengarang', true);
                                $isset_item_pengarang = isset($item_pengarang) ? $item_pengarang : '';
                                if (!empty($isset_item_pengarang)) {
                                    echo '<p class="sdm_post_download_version_value" align="center">' . $isset_item_pengarang . '</p>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php $counter=0; ?>
                <?php endif; ?>                    
            <?php endwhile; ?>
            <div class="row" role="navigation" aria-labelledby="lihat hasil pencarian sebelum dan sesudah">
                <div class="col-md-3">
                    <?php previous_posts_link(); ?>
                </div>
                <div class="col-md-6">
                </div>
                <div class="col-md-3">
                    <?php next_posts_link(); ?>
                </div>
            </div>
        <?php else : ?>
            <h4>Nothing Found</h4>
        <?php endif; ?>
    </div>
</div>
<div class="col-md-1">
</div>  
</div>
</section>
<?php get_footer(); ?>