<?php
/* Template Name: Blog Template */
get_header();
?>
<section id="blog">
	<div class="container">
		<!-- sayap kiri -->
		<div class="col-md-6">
			<div class="row">
				<h1 class="head-blog">BLOG</h1>
			</div>
			<?php if (have_posts()) : ?>
				<?php
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				query_posts('post_type=post&posts_per_page=5&paged='.$paged);
				?>
				<?php while (have_posts()) : the_post(); ?>
					<!-- blog post -->
					<div class="post">
						<div class="row">
							<div class="col-md-2">
								<a class="avatar" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'ID'),50); ?></a> 
							</div>
							<div class="col-md-10">
								<div class="row">
									<a class="blog-author-name" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a>
									<p class="blog-posts-date"><?php the_date('j F Y'); ?></p>
								</div>
							</div>
						</div>
						<div class="row">
							<?php the_post_thumbnail( 'large' , array( 'class' => 'post-thumbnail' ) ); ?>
						</div>
						<div class="row">
							<a class="head-post" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</div>
						<div class="row">
							<div class="post-content">
								<p><?php the_excerpt(); ?> <!-- <a href="<?php the_permalink(); ?>"> Continue Reading</a> --></p>
							</div>
						</div>
						<div class="row">
							<div>&nbsp;</div>
							<div class="col-md-6 blog-continue">
								<a href="<?php the_permalink(); ?>" type="button">Continue Reading</a>
							</div>
							<div class="col-md-6">
								<div class="tags-title">Tags <?php the_category(' '); ?> </div>
							</div>
							<div>&nbsp;</div>
						</div>
					</div>
					<hr class="bates-post">
				<?php endwhile; ?>
				<div class="row">
					<div class="col-md-3">
						<?php previous_posts_link(); ?>
					</div>
					<div class="col-md-6">
					</div>
					<div class="col-md-3">
						<?php next_posts_link(); ?>
					</div>
				</div>
			<?php else : ?>
				<h4>Nothing Found</h4>

			<?php endif; ?>
		</div>
		<div class="col-md-3"></div>
		<!-- sayap kanan -->
		<div class="col-md-3" id="sidebar">
			<div class="row" id="search-box">
				<?php get_search_form( true ); ?>
			</div>
			<div class="row" id="popular-posts">
				<p class="sidebar-header">TOP STORIES</p>
				<hr class="sidebar-bates">
			</div>
			<!-- <?php wpp_get_mostpopular(); ?> -->
			<div class="row" id="popular-posts">
				<p class="sidebar-header">CATEGORIES</p>
				<hr class="sidebar-bates">
			</div>
			<ul class="popular-category">
				<?php wp_list_categories('orderby=name&title_li=&hierarchical=0&number=10'); ?>
			</ul>
		</div>
	</div>
</section>

<?php get_footer(); ?>