<?php
/* Template Name: Pustaka Digital Template */
get_header();
?>

<?php if ( wpmd_is_notdevice() ) : ?>
  <?php include 'pustaka-digital-nondevice.php'; ?>
<?php endif; ?>
<!-- Device only -->
<?php if ( wpmd_is_device() ) : ?>
  <?php include 'pustaka-digital-device.php'; ?>
<?php endif; ?>
<?php get_footer(); ?>