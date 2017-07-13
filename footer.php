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
<?php if ( wpmd_is_notdevice() ) : ?>
  <?php include 'footer-nondevice.php'; ?>
<?php endif; ?>

<!-- Device only -->
<?php if ( wpmd_is_device() ) : ?>
  <?php include 'footer-device.php'; ?>
<?php endif; ?>
