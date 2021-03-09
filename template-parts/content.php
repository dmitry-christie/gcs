<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gcs
 */

?>


<style>
.hero-page {
            background-image: url('<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); echo $featured_img_url;?>');           
			background-color: #d3d3d3;
			background-blend-mode: multiply;
}
.sitewide-notice {
	background-color: rgba(224,0,63,1);
	color: white;
	max-width: 400px;
	height: auto;
	display: flex;
	justify-content: center;
	align-items: center;
}
</style>
<?php 

if(get_field('enable_shorter_header')) {
	?>
		<style>
			.hero-page {
				height: 50vh;
			
			}
			
			@media (max-width: 760px) {
				.hero-page {
					min-height: 400px;
				}
			}
			
		</style>
<?php
}

?>

<?php 

if(!get_field('disable_header')) {
	
	?>

<div class="hero-page">

    <div class="hero-page-container container">
        <div class="text">
            <h1 class="sm-red-line">
                <?php 
                    if(get_field('header')) {
                            the_field('header'); 
                    }
				    else {
					    the_title();
                    } 
                ?>
            </h1>
			<p ><?php the_field('sub_header'); ?></p>
			<div class="entry-meta">
				<p><?php
				    gcs_posted_on();
                    ?>  <?php $u_time = get_the_time('U'); 
                    $u_modified_time = get_the_modified_time('U'); 
                    if ($u_modified_time >= $u_time + 86400) { 
                    echo "- Updated: "; 
                    the_modified_time('F j, Y'); 
                    
                     }  ?>
                </p>
			</div> 
        </div>
       
    </div>
    <div class="teal">

    </div>

</div>

<?php
	
} else {
	
	?>
<style>
	.type-post {
		padding-top: 150px;
	}
</style>
<?php
}
/* if statement for disable header */
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">



<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


<!-- new notice --> 

<?php 

$postid1 = get_the_ID();

$current_category_ids = wp_get_post_categories( get_the_ID(), array( 'fields' => 'ids' ) );


$covid_notices = get_field('new_covid_notice', 'options');

foreach($covid_notices as $covid_notice) {
	// check if it is in the category;
	$category_ids = $covid_notice['categories'];
	$exclude_notice_from_id = $covid_notice['exclude_notice'];
	$shortcode = $covid_notice['shortcode'];

	




	
	foreach($category_ids as $category_id) {



		$exclude_notice_from_id = (int) $exclude_notice_from_id;


		
		if(in_array($category_id, $current_category_ids) AND !($exclude_notice_from_id === $postid1))   {?>
			
		
				
				<div class="container ">
					<div class="sitewide-notice">
						<?php echo do_shortcode($shortcode); ?>
					</div>
					
				</div>


			
		<?php }
	}

	
}

?>



	




	


<!-- END new notice --> 



<?php
if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb( '<p id="breadcrumbs" class="container">','</p>' );
}
?>
	
	

<?php 

$remove_the_classical_editor = get_field('remove_the_classical_editor');



if (!$remove_the_classical_editor) {
	?>

<div class="entry-content container">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'gcs' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gcs' ),
				'after'  => '</div>',
			)
		);
		?>




	</div><!-- .entry-content -->




<?php
}


$enable_custom_editor = get_field('enable_custom_editor');


if ($enable_custom_editor) { 
    
    $stylesheet_root = get_stylesheet_directory();
include( $stylesheet_root . '/template-parts/flexible-content-inc.php' );

			} ?>

<hr class="post-end">
	<div class="post-tags-social container">
		
			
			<?php if ( is_singular() ) :
					echo get_the_tag_list(
						'<div class="tags">',
						' ',
						'</div>',
						get_queried_object_id()
					);
				endif;

				global $wp;
$current_url = home_url(add_query_arg(array(), $wp->request));
				?>
			
	
		
		<div class="share-icons">
			<div class="icon">
				<a href="https://www.facebook.com/sharer.php?u=<?php echo $current_url; ?>"><img src="https://www.globalcitizensolutions.com/wp-content/themes/gcs/img/social-icons/white-facebook.png"></a>
			</div>
			<div class="icon">
				<a href="https://twitter.com/intent/tweet?url=<?php echo $current_url; ?>"><img src="https://www.globalcitizensolutions.com/wp-content/themes/gcs/img/social-icons/white-twitter.png"></a>
			</div>
			<div class="icon">
				<a href="http://pinterest.com/pin/create/link/?url=<?php echo $current_url; ?>"><img src="https://www.globalcitizensolutions.com/wp-content/themes/gcs/img/social-icons/white-pinterest.png"></a>
			</div>
			<div class="icon">
				<a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $current_url; ?>"><img src="https://www.globalcitizensolutions.com/wp-content/themes/gcs/img/social-icons/white-linkedin.png"></a>
			</div>
		</div>
		
	</div>
	
	<?php 
	$next_post_id = get_adjacent_post(false,'',false)->ID;
	$prev_post_id = get_adjacent_post(false,'',true)->ID;
	$next_post_link_url = get_permalink( $next_post_id); 
	$prev_post_link_url = get_permalink( $prev_post_id );
	?>
	<div class="post-navigation container">
		<div class="previous-container">
			<a href="<?php echo $prev_post_link_url; ?>">
			<div class="img-container prev">
				<img src="<?php echo get_the_post_thumbnail_url( $prev_post_id, 'thumbnail' );?>">
			</div>
			
				<div class="text-container">
					<span class="previous-insight">Prev Insight</span>
					<span class="post-title"> <?php echo get_the_title($prev_post_id); ?> </span>
				</div>
			</a>
		</div>
		<div class="next-container">
			<a href="<?php echo $next_post_link_url; ?>">
				<div class="text-container">
					<span class="previous-insight">Next Insight</span>
					<span class="post-title"><?php echo get_the_title($next_post_id); ?></span>
				</div>
			<div class="img-container next">
				<img src="<?php echo get_the_post_thumbnail_url( $next_post_id, 'thumbnail' );?>">
			</div>
			
				
			</a>
		</div>
			
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
<style>
#referral_table h3, #referral_table h4, #referral_table p, #referral_table strong, #referral_table span, #referral_table td {
text-align: center !important;
} 
#referral_table, #referral_table td, #referral_table tr {
border: 0px solid white !important;
}
</style>


