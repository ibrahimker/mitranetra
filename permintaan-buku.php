<?php
/* Template Name: Permintaan Buku Template */
get_header();
?>
<!-- About Section -->
<section id="permintaan-buku">
	<div class="container" role="main">
		<div class="col-md-1">
		</div>
		<div class="col-md-10">
			<div class="row">
			<h1 class="head-blog" style="padding:0px;">Formulir Permintaan Buku</h1>
			</div>
			<div role="form" aria-labelledby="form permintaan buku">
			<?php
			if ( is_user_logged_in() ) {
				echo do_shortcode('[gravityform id="2" title="false" description="false" ajax="true"]');
			} else {
				echo '<p style="padding:200px 50px;color:#000;font-size:2.168em;text-align:center;">Anda harus login terlebih dahulu untuk dapat mengakses permintaan buku</p>';
			}
			?>
			</div>
		</div>
		<div class="col-md-1">
		</div>  
	</div>
</section>
<?php get_footer(); ?>