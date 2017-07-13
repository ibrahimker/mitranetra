<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mitra Netra
 */

?>
<?php if ( wpmd_is_notdevice() ) : ?>
  <?php include 'header-nondevice.php'; ?>
<?php endif; ?>

<!-- Device only -->
<?php if ( wpmd_is_device() ) : ?>
  <?php include 'header-device.php'; ?>
<?php endif; ?>

<div id="main-content">