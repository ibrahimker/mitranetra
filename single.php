<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @author Ibrahim Nurandita Isbandiputra
 * @package Mitra Netra
 */

get_header(); ?>
<?php if ( wpmd_is_notdevice() ) : ?>
  <?php include 'single-nondevice.php'; ?>
<?php endif; ?>
<!-- Device only -->
<?php if ( wpmd_is_device() ) : ?>
  <?php include 'single-device.php'; ?>
<?php endif; ?>