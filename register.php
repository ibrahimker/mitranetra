<?php
/* Template Name: Register Template */
get_header();
?>
<!-- About Section -->
<section id="register">
    <div class="container">
        <div class="col-md-1">
        </div>
        <div class="col-md-10">
            <?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]'); ?>
        </div>
        <div class="col-md-1">
        </div>  
    </div>
</section>
<?php get_footer(); ?>