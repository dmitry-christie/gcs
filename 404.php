<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package gcs
 */

get_header();
?>
<style>
.page-content {
	display: flex;
	flex-direction: column;
	align-items: center;
}

.page-content {
	padding-top: 4em;
}
</style>

	<div id="primary" class="content-area">
		<main id="main" class="site-main container">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'gcs' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content container center">
					<h2 class="section-header txt-center sm-red-line"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'gcs' ); ?></h2>

					<?php
					get_search_form();

					?>


				
				</div><!-- .page-content -->

				<div class="guides-outer container" data-aos="fade-up">

<h3 class="section-sub-header txt-center">
			<?php 
				$local_experts_sub_header = get_field('local_experts_sub_header', 'option'); 
				if ($local_experts_sub_header) {
					echo $local_experts_sub_header; 
				}  
			?></h3>
<h2 class="section-header txt-center sm-red-line">
			<?php 
				$local_experts_header = get_field('local_experts_header', 'option'); 
				if ($local_experts_header) {
					echo $local_experts_header; 
				} else { 
					echo 'Check out our Ultimate Guides for Citizenship and Residency by Investment'; 
				} 
			?>

</h2>

<div class="guides">
<?php
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => 4,
				'category_name' => 'guides',

			);

		   

			$post_query = new WP_Query($args);

			if($post_query->have_posts() ) {
				while($post_query->have_posts() ) {
					$post_query->the_post();
					?>

					<div style="background-image: url('<?php the_post_thumbnail_url('medium'); ?>')">
						<div class="guide colour">

							<h5><?php the_title(); ?></h5>
							<a href="<?php the_permalink(); ?>">
								<div class="button">
								
								
								<?php 
				$local_experts_click_to_read_text = get_field('local_experts_click_to_read_text'); 
				if ($local_experts_click_to_read_text) {
					echo $local_experts_click_to_read_text; 
				} else { 
					echo 'Click to read'; 
				} 
			?>
			<img src="<?php echo get_template_directory_uri(); ?>/img/arrow-button.png"></div>
							</a>

						</div>
					</div>


				  
					<?php
					}
				}
				wp_reset_query();
		?>


</div>

</div>

<style>
.page-content {
	display: flex;
	flex-direction: column;
	align-items: center;
}
</style>

				
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
