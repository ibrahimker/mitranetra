<?php
/* Template Name: Register Next Step Template */
get_header();
?>
<!-- About Section -->
<section id="register">
	<div class="container">
		<div class="col-md-1">
		</div>
		<div class="col-md-10">
			<?php
			if ( is_user_logged_in() ) {
				echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]');
			} else {
				echo '<p style="padding:200px 50px;color:#000;font-size:2.168em;text-align:center;">Anda harus login terlebih dahulu untuk dapat mengakses halaman ini</p>';
			}
			?>

		</div>
		<div class="col-md-1">
		</div>  
	</div>
</section>
<?php get_footer(); ?>