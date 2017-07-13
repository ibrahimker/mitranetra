<?php
/* Template Name: Permintaan Buku Template */
get_header();
?>
<?php if ( wpmd_is_notdevice() ) : ?>
  <?php include 'permintaan-buku-nondevice.php'; ?>
<?php endif; ?>
<!-- Device only -->
<?php if ( wpmd_is_device() ) : ?>
  <?php include 'permintaan-buku-device.php'; ?>
<?php endif; ?>
<?php get_footer(); ?>