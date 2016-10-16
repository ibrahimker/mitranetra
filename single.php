<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Badr Interactive
 */

get_header(); ?>
<!-- Header -->
<!-- <header>
	<div id="blog-header">
		<div class="container">
			<div class="row">
				<button type="button" class="btn subscribe-btn navbar-btn">SUBSCRIBE</button>
			</div>
		</div>
	</div>
</header>
-->
<section id="blog">
	<div class="container">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<div class="row">
				<?php
				$item_title = get_the_title($id);
				$isset_item_title = isset($item_title) && !empty($item_title) ? $item_title : '';
				?>
				<div class="col-md-12">
					<h1 class="head-blog"><?php echo $isset_item_title; ?></h1>
				</div>
			</div>
			<!-- post -->
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="post col-md-12">
					<div class="row">
						<div class="col-md-4">
							<p class="blog-posts-date"><?php the_date('j F Y'); ?></p>
						</div>
						<div class="col-md-8">
							<div class="tags-title">Kategori: <?php the_terms( $post->ID, 'sdm_categories', '', ", ", '' ); ?></div>
						</div>
					</div>
				</br>
				<div class="row">
					<div class="blog-content">
						<div class="col-md-4">
							<div class="row">
								<?php
								$item_download_thumbnail = get_post_meta($id, 'sdm_upload_thumbnail', true);
								$isset_download_thumbnail = isset($item_download_thumbnail) && !empty($item_download_thumbnail) ? '<center><img class="img-responsive" alt="Cover Buku" src="' . $item_download_thumbnail . '" /></center>' : '';
								echo $isset_download_thumbnail;
								?>
							</div>
							<div class="row">
								<div class="col-md-12">
									<?php
									$get_cpt_object = get_post($id);
									$cpt_is_password = !empty($get_cpt_object->post_password) ? 'yes' : 'no';
									$homepage = get_bloginfo('url');
									$download_url = $homepage . '/?smd_process_download=1&download_id=' . $id;
									if(is_user_logged_in()){
										if(isEligibleToDownload()==1){
										$download_button_code = '<a href="' . $download_url . '" class="btn btn-book-download" title="'.$isset_item_title.'">Download Now</a>';
										}
										else{
											$download_button_code = '<div class="alert alert-danger">Maaf, anda hanya dapat mengunduh tiga buku dalam satu hari</div>';
										}
									}
									else{
										$download_button_code = '<div class="alert alert-danger">Anda harus login terlebih dahulu untuk dapat mengunduh buku ini</div>';
									}
									if ($cpt_is_password !== 'no') {
										$download_button_code = sdm_get_password_entry_form($id);
									}
									echo $download_button_code;
									?>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<?php
									$item_file_size = get_post_meta($id, 'sdm_item_file_size', true);
									$isset_item_file_size = isset($item_file_size) ? $item_file_size : '';

									$item_isbn = get_post_meta($id, 'sdm_item_isbn', true);
									$isset_item_isbn = isset($item_isbn) ? $item_isbn : '';

									$item_pengarang = get_post_meta($id, 'sdm_item_pengarang', true);
									$isset_item_pengarang = isset($item_pengarang) ? $item_pengarang : '';

									$item_penerbit = get_post_meta($id, 'sdm_item_penerbit', true);
									$isset_item_penerbit = isset($item_penerbit) ? $item_penerbit : '';

									$content.= '';
									if (!empty($isset_item_pengarang)) {//Show file size info
										$content .= '<p><strong>Pengarang: </strong>' . $isset_item_pengarang . '</p>';
									}
									if (!empty($isset_item_penerbit)) {//Show file size info
										$content .= '<p><strong>Penerbit: </strong>' . $isset_item_penerbit . '</p>';
									}
									if (!empty($isset_item_isbn)) {//Show file size info
										$content .= '<p><strong>ISBN: </strong>' . $isset_item_isbn . '</p>';
									}
									if (!empty($isset_item_file_size)) {//Show file size info
										$content .= '<p><strong>Ukuran File: </strong>' . $isset_item_file_size . '</p>';
									}
									$db_count = sdm_get_download_count_for_post($id);
									$content .= '<p><strong>Total Diunduh: </strong>' . $db_count . ' kali</p>';

									?>
									<br>
									<?php echo $content; ?>
								</div>
							</div>
						</div>				
						<div class="col-md-8">
							<p>
								<?php
								$isset_item_description = sdm_get_item_description_output($id);
								echo $isset_item_description;
								?>
							</p>
							<?php echo do_shortcode('[mashshare]'); ?>
						</div>			
					</div>
				</div>
				<div class="row">
					<?php wp_link_pages( array('before' => '<div class="page-links">' . esc_html__( 'Pages:', 'badr' ),
					'after'  => '</div>', ) ); ?>
				</div>
				<hr class="bates">
				<!-- next story -->
				<div class="row">
					<div class="col-md-6">
						<p class="post-pagination-prev">Previous Books</p>
						<div class="post-prev-link"><?php echo get_previous_post_link('%link','%title'); ?></div>
					</div>
					<div class="col-md-6">
						<p class="post-pagination-next">Next Books</p>
						<div class="post-next-link"><?php echo get_next_post_link('%link'); ?></div>
					</div>
				</div>
				<hr class="bates">
			</div>
			<!-- 				<?php $withcomments = true; comments_template();?> -->
			<div class="navigation"><p><?php posts_nav_link(); ?></p></div>
		<?php endwhile; // End of the loop. ?>

	</div>
	<div class="col-md-1"></div>
</div>
</section>

<?php get_footer(); ?>