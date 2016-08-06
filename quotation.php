<?php

/* Template Name: Quotation Template */

get_header();

?>

<!-- Header -->

<header id="quotation-header">

	<div class="container">

		<div class="row">

			<div class="col-md-2"></div>

			<div class="col-md-8">

				<?php

				echo do_shortcode('[gravityform id="2" title="false" description="false" ajax="true"]');

				?>

			</div>

			<div class="col-md-2"></div>

		</div>

	</div>

</header>

<section id="contact-footer">

	<div class="container">

		<div class="row">

			<div class="col-md-2"></div>

			<div class="col-md-8">

				<p class="contact-footer-text">For media inquiries, general question, or others <a href="<?php echo get_site_url() ?>/index.php/contact/other-question"><img src="<?php echo bloginfo('template_directory'); ?>/img/icons/icon_arrowright_circle_contact.png"/></a></p>

			</div>

			<div class="col-md-2"></div>

		</div>

	</div>

</section>

<?php get_footer(); ?>