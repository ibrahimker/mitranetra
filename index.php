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
 * @author Ibrahim Nurandita Isbandiputra
 * @package Mitra Netra
 */
get_header(); ?>

<!-- Desktop only -->
<?php if ( wpmd_is_notdevice() ) : ?>
    <?php include 'index-nondevice.php'; ?>
<?php endif; ?>

<!-- Device only -->
<?php if ( wpmd_is_device() ) : ?>
    <?php include 'index-device.php'; ?>
<?php endif; ?>
