<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Badr Interactive
 */

get_header(); ?>

	        <!-- Header -->
        <header id="section-404">
            <div class="container" >
                <div class="row">
                    <h1 class="header-404">404</h1>
                </div>
                <div class="row">
                <h1 class="subheader-404">Are you lost?</h1>
                </div>
                <div class="row">
                    <a href="<?php echo get_site_url() ?>" type="button" class="btn btn-badr navbar-btn" style="margin-bottom:200px;">Go Home</a>
                </div>
            </div>
        </header>

<?php get_footer(); ?>
