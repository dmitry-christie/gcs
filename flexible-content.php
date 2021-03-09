<?php /* Template Name: Flexible Content */
get_header();

?>

<style>
.hero-page {
            background-image: url('<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); echo $featured_img_url;?>');           
			background-color: #aaa;
			background-blend-mode: multiply;
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

<div class="  <?php
$enable_header_form = get_field('enable_header_form');
if($enable_header_form) { 
        echo 'hero-container '; 
 } else { echo 'hero-page-container '; }?> container">
        <div class="text">
            <h1 class="sm-red-line"><?php the_field('header'); ?></h1>
            <p>
                <?php the_field('sub_header'); ?>
            </p>
        </div>

        <?php
$enable_header_form = get_field('enable_header_form');
if($enable_header_form) { ?>

<style>
    .hero-page {
        height: 100vh;
		    min-height: 750px;
    }

</style>
        <div class="form ac-form">
            
                <?php $our_commitment_form = get_field('our_commitment-form2');
                                        if(!$our_commitment_form) {
                                            $our_commitment_form = get_field('our_commitment-form', 'option');
                                        }

                                        echo do_shortcode($our_commitment_form);?>
            </div>

<?php }?>

    </div>
    <div class="teal">

    </div>

</div>

<?php
	
} else {
	
	?>
<style>
	.row-0 {
		padding-top: 150px;
	}
</style>
<?php
}
/* if statement for disable header */
?>


<?php if(get_field('disable_intro_section')) {
?>

<div class="optimists-outer" data-aos="fade-up">
    <div class="optimists container">
        <div class="photo ">
            <img src="<?php the_field('intro_image_1') ?>" alt="<?php the_field('into_header'); ?>">

        </div>
        <div class="text">

             <?php $sub_header = get_sub_field('sub_header'); if($sub_header) {?>  <h3 class="section-sub-header "><?php echo $sub_header; }?></h3>
            <h2 class="section-header sm-red-line"> <?php the_field('into_header'); ?></h2>

            <p><?php the_field('intro_text'); ?></p>

            <?php $enable_button = get_field('intro_button_url');
                
                if($enable_button) {
                    ?>
                    <a href="<?php $button_url = get_field('intro_button_url'); echo $button_url; ?>">
                        <div class="button"><?php $button_text = get_field('intro-button_text'); echo $button_text; ?> <img alt="arrow icon" src="<?php echo get_template_directory_uri(); ?>/img/arrow-button.png"></div>
                    </a>

                    <?php
                }
                ?>


        </div>
    </div>
</div>

<?php 
}
$stylesheet_root = get_stylesheet_directory();
include( $stylesheet_root . '/template-parts/flexible-content-inc.php' );

get_footer(); 