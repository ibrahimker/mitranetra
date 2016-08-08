<?php
/* Template Name: Pustaka Digital Template */
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
                        <input type="text" name="s" id="search" placeholder="Aku ingin membaca" value="<?php the_search_query(); ?>" class="form-control"/>
                        <input type="hidden" name="post_type" value="sdm_downloads"  />
                        <label class="sr-only" for="searchsubmit">Search</label>
                        <input type="submit" class="btn btn-primary" id="searchsubmit" value="Cari" />                 
                    </div>
                </fieldset>
            </form>
            <br>
        </div>
        <?php if (have_posts()) : ?>
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            query_posts('post_type=sdm_downloads&posts_per_page=9&paged='.$paged);
            ?>
            <?php $counter=0; ?>
            <?php while (have_posts()) : the_post(); ?>
                <!-- blog post -->
<!--                         <div class="row">
                            <div class="col-md-6">
                                <a class="head-post" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </div>
                            <div class="col-md-6">
                                <div class="tags-title">Kategori: <?php the_terms( $post->ID, 'sdm_categories', '', ", ", '' ); ?> </div>
                            </div>
                        </div> -->
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
                    <br>
                    <br>
                    <div class="row">
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
            <div class="col-md-1">
            </div>  
        </div>
    </section>
    <?php get_footer(); ?>