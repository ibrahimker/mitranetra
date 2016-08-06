<?php
get_header();
?>
<style>
	.slick-prev
	{
		left: -25px;
		background: url("../wp-content/themes/badr/img/icons/icon_arrowleft_work.png") no-repeat;
	}
	.slick-prev:before
	{
		content: ' ';
	}

	.slick-next
	{
		right: -25px;
		background: url("../wp-content/themes/badr/img/icons/icon_arrowright_work.png") no-repeat;
	}
	.slick-next:before
	{
		content: ' ';
	}
	.esg-navigationbutton.esg-right,.esg-navigationbutton.esg-left {
		border:none !important;
		background-color:transparent !important;
	}
	.esg-navigationbutton.esg-filterbutton.esg-pagination-button, .esg-pagination{
		border:none !important;
		background-color:transparent !important;
		color:#00B4FF;
		font-family:Montserrat,"Helvetica Neue",Helvetica,Arial,sans-serif;
		font-size:18px;
	}
	.esg-navigationbutton.esg-filterbutton.esg-pagination-button.selected{
		border:none !important;
		background-color:transparent !important;
		font-family:Montserrat,"Helvetica Neue",Helvetica,Arial,sans-serif;
		font-size:18px;
	}
</style>
<?php if(is_singular('project')) : ?>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.slides').slick({
				dots: true,
				infinite: true,
				speed: 300,
			});
		});
	</script>
	<?php while ( have_posts() ) : the_post();?>
		<section id="work">
			<div class="container">
				<!-- gallery image -->
				<div class="col-md-7">
					<div class="slides">
						<?php
						$attachment_ids 	= projects_get_gallery_attachment_ids();
						$lightbox_rel 		= apply_filters( 'projects_lightbox_rel', $rel = 'lightbox' );
						if ( $attachment_ids ) { ?>

						<?php
						$loop = 0;
						foreach ( $attachment_ids as $attachment_id ) {
							$image_link = wp_get_attachment_url( $attachment_id );
							if ( ! $image_link )
								continue;
							$image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_project_single_thumbnail_size', 'project-single' ), 0, array('class'	=> "img-responsive") );
							$image_title = esc_attr( get_the_title( $attachment_id ) );
							echo '<div class="slide">';
							echo '<a href="' . $image_link . '" title="' . $image_title . '" rel="' . $lightbox_rel . ' project-gallery-' . $post->ID . '">' . $image . '</a>';
							echo '</div>';
							$loop++;
						} // endforeach ?>
						<?php } // endif ?>
					</div>
				</div>
				<div class="col-md-1">
				</div>
				<!-- description -->
				<div class="col-md-4 proj-box">
					<div class="row">
						<h1 class="works-title"><?php the_title(); ?></h1>
						<div>&nbsp;</div>
					</div>
					<div class="row">
						<p class="works-category">Category : <?php echo get_the_term_list( $post->ID, 'project-category', '', ', ', '' ); ?></p>
					</div>
					<div class="row">
						<p class="works-platform">Platform : <?php echo esc_attr( get_post_meta( $post->ID, '_platform', true ) ); ?></p>
					</div>
					<div class="row">
						<p class="works-date">Date : <?php echo esc_attr( get_post_meta( $post->ID, '_date', true ) ); ?></p>
						<div>&nbsp;</div>
					</div>
					<div class="row">
						<div class="works-description"><?php echo apply_filters( 'post_excerpt', wpautop( $post->post_excerpt ) ) ?></div>
						<div>&nbsp;</div>
					</div>
					<div class="row">
						<a href="<?php echo get_site_url() ?>/index.php/contact/quotation" class="btn btn-badr">Request a project like this</a>
						<div>&nbsp;</div>
					</div>
				</div>
			</div>
		</section>
		<section id="project-footer">
			<div class="container">
				<div class="row">
					<div class="col-xs-5 col-md-5">
						<!-- next story -->
						<p class="work-pagination-prev">Previous Project</p>
						<div class="work-prev-link"><?php echo get_previous_post_link('%link','%title'); ?></div>
					</div>
					<div class="col-xs-2 col-md-2">
						<a href="#works" class="btn btn-badr" data-toggle="modal" data-target="#myModal">Share this Projects</a>
						<!-- Start Modal -->
						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h5 class="modal-title" id="myModalLabel">Share to social media</h5>
									</div>
									<div class="modal-body">
										<?php echo do_shortcode('[simple-social-share]'); ?>
									</div>
								</div>
							</div>
						</div>
						<!-- End Modal -->
					</div>
					<div class="col-xs-5 col-md-5">
						<p class="work-pagination-next">Next Project</p>
						<div class="work-next-link"><?php echo get_next_post_link('%link'); ?></div>
					</div>
				</div>
			</div>
		</section>
	<?php endwhile; ?>
<?php else : ?>
	<section id="portfolio">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php echo do_shortcode('[ess_grid alias="portoflio"]'); ?>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
<?php get_footer(); ?>
