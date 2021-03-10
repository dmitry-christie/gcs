<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gcs
 */

?>
<?php
$enable_our_commitment = get_field('enable_our_commitment');
if($enable_our_commitment): ?>
<div class="commitment-section commitment-page-container" data-aos="fade-up">
	<div class="commitment commitment-page container">
		<div class="patricia">
			<h2 id="commitment-header" class="section-header sm-red-line"><?php the_field('our_commitment-header', 'option'); ?></h2>
			<p><?php the_field('our_commitment-text', 'option'); ?></p>

			<div class="ceo">
				<!-- <div class="photo-container">
				<img src="<?php echo get_template_directory_uri(); ?>/img/patricia.png">
				</div> -->
				<div class="signature-container">
					<img src="<?php echo get_template_directory_uri(); ?>/img/signature-BG-blue.png" alt="Patricia signature">
				</div>
			</div>
		</div>
		<div class="wrapper">
			<div class="form ac-form">

			<?php
			$our_commitment_form = get_field('our_commitment-form2');

			if($our_commitment_form) {
			echo apply_filters( 'the_content', $our_commitment_form);

			} else {
			$our_commitment_form = get_field('our_commitment-form', 'option');
			echo apply_filters( 'the_content', $our_commitment_form);

			}

			?>

			</div>
		</div>
	</div>
</div>

<?php endif; ?>


<footer id="colophon" class="site-footer">
	

	<div class="footer-widgets-outer">
		<div class="footer-widgets container">
			<div class="address">
				<img src="<?php echo get_template_directory_uri(); ?>/img/footer-offices.png" alt="our offices logo">

				<?php the_field('offices', 'options'); ?>
			</div>
		<div class="menu">
			<img class="hidden" src="<?php echo get_template_directory_uri(); ?>/img/footer-offices.png">
			<ul class="footer-list">

				<?php

				// check if the repeater field has rows of data
				if( have_rows('links_menu', 'options') ):

					// loop through the rows of data
					while ( have_rows('links_menu', 'options') ) : the_row();

						?>

							<li><a href="<?php the_sub_field('url');?>"><?php the_sub_field('text');?></a></li>
						<?php
					endwhile;
				endif;
				?>
			</ul>
		</div>
			<div class="categories">
			<img class="hidden" src="<?php echo get_template_directory_uri(); ?>/img/footer-offices.png">

			<ul class="footer-list">
			<?php

				// check if the repeater field has rows of data
				if( have_rows('links_menu_2', 'options') ):

					// loop through the rows of data
					while ( have_rows('links_menu_2', 'options') ) : the_row();

						?>

							<li><a target="_blank" href="<?php the_sub_field('url');?>"><?php the_sub_field('text');?></a></li>
						<?php

					endwhile;


				endif;

				?>
			</ul>
			</div>
			<div class="social">
				<img class="hidden" src="<?php echo get_template_directory_uri(); ?>/img/footer-offices.png">

				<?php $social_link_linked = get_field('social_links_linked', 'options'); if($social_link_linked) {  ?><a target="_blank" href="<?php the_field('social_links_linked', 'options');?>"><img src="<?php echo get_template_directory_uri(); ?>/img/footer-linked.png" alt="linkedin logo"> <span>LinkedIn</span></a><?php } ?>
				<?php $social_links_facebook = get_field('social_links-facebook', 'options'); if($social_links_facebook) {  ?><a target="_blank" href="<?php the_field('social_links-facebook', 'options');?>"><img src="<?php echo get_template_directory_uri(); ?>/img/footer-fb.png" alt="facebook logo"> <span>Facebook</span></a><?php } ?>
				<?php $social_links_instagram_url = get_field('social_links-instagram_url', 'options'); if($social_links_instagram_url) {  ?><a target="_blank" href="<?php the_field('social_links-instagram_url', 'options');?>"><img src="<?php echo get_template_directory_uri(); ?>/img/footer-ig.png" alt="instagram logo"> <span>Instagram</span></a><?php } ?>
			</div>
		</div>

		</div>
		<div class="footer-widgets">

		</div>
		<div class="footer-mobile-whatsapp">
			<a href="<?php the_field('whats_app-url', 'options'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/ICON-WHATSAPP.png"><span><?php the_field('whats_app-text', 'options'); ?></span></a>
		</div>
		<div class="our-partners">
			<div class="container flex">
				<img alt="Residency and citizenship by investment" src="<?php echo get_template_directory_uri(); ?>/img/header-logo.png">
				<div class="partners-container flex">
					<div class="partners-string flex">
						<span><?php the_field('partners_string', 'options'); ?>
					</div>
					<div class="partners-logos-container flex">

					<?php

				// check if the repeater field has rows of data
				if( have_rows('partners_logos', 'options') ):

					// loop through the rows of data
					while ( have_rows('partners_logos', 'options') ) : the_row();

						?>

						<div class="partner-logo">
							<a target="_blank" href="<?php the_sub_field('url');?>"><img alt="Residency and citizenship by investment" src="<?php the_sub_field('logo');?>"></a>
						</div>

						<?php
					endwhile;
				endif;
				?>
						
					</div>
				</div>			
			</div> 
		</div>
		<hr>
		<div class="copyright-outer">
		<div class="copyright margin-left">
			<p>Global Citizen Solutions  2017 -  <?php echo date("Y"); ?> ©. All rights reserved.</p>
		<div class="footer-desktop-whatsapp">
			<a href="<?php the_field('whats_app-url', 'options'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/ICON-WHATSAPP.png"> <span><?php the_field('whats_app-text', 'options'); ?></span></a>
		</div>
		</div>

	</div>

</footer><!-- #colophon -->



</div><!-- #page -->

<?php if(ICL_LANGUAGE_CODE=='en'): ?>
	<div class="cookieconsent" id="cookieconsent" style="position:fixed;padding:20px;left:0;bottom:0;background-color:#1955a6;color:#FFF;text-align:center;width:100%;z-index:99999999999; display: none;">
We use cookies to ensure that we give you the best experience on our website. Our <a href="https://www.globalcitizensolutions.com/terms-conditions/">Terms and Conditions</a> 
<a href="#" id="consent_button" class="button" onclick="event.preventDefault(); acceptConsent();">I Agree</a>
</div>

<?php elseif(ICL_LANGUAGE_CODE=='pt-pt'): ?>
	<div class="cookieconsent" id="cookieconsent" style="position:fixed;padding:20px;left:0;bottom:0;background-color:#1955a6;color:#FFF;text-align:center;width:100%;z-index:9999999; display: none;">
We use cookies to ensure that we give you the best experience on our website. Our <a href="https://www.globalcitizensolutions.com/terms-conditions/">Terms and Conditions</a> 
<a href="#" id="consent_button" class="button" onclick="event.preventDefault(); acceptConsent();" style="color: white !important">I Agree</a>
</div>
<?php endif; ?>


<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>


AOS.init();


</script>


<?php wp_footer(); ?>

<script>

$(document).ready(function() {
// Check if element is scrolled into view
function isScrolledIntoView(elem) {
var docViewTop = $(window).scrollTop();
var docViewBottom = docViewTop + $(window).height();

var elemTop = $(elem).offset().top;
var elemBottom = elemTop + $(elem).height();

return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}
// If element is scrolled into view, fade it in
$(window).scroll(function() {
$('.scroll-animations .animated').each(function() {
if (isScrolledIntoView(this) === true) {
$(this).addClass('fadeInLeft');
}
});
});
});

</script>

<script>

let SlideImages = document.querySelectorAll('.carousel-item');

let CarourselIndicator = document.querySelectorAll('.dot');
let _slideIndex = 0;

function slideLeft() {
SlideImages[_slideIndex].classList.remove('active');
CarourselIndicator[_slideIndex].classList.remove('active');
_slideIndex = _slideIndex === 0 ? SlideImages.length - 1 : _slideIndex - 1;
SlideImages[_slideIndex].classList.add('active');
CarourselIndicator[_slideIndex].classList.add('active');  
}

function slideRight() {
SlideImages[_slideIndex].classList.remove('active');
CarourselIndicator[_slideIndex].classList.remove('active');
_slideIndex = (_slideIndex === (SlideImages.length - 1)) ? 0 : _slideIndex + 1;
SlideImages[_slideIndex].classList.add('active');
CarourselIndicator[_slideIndex].classList.add('active');  
}

function ChangeSlide(slideNumber) {
SlideImages[_slideIndex].classList.remove('active');
CarourselIndicator[_slideIndex].classList.remove('active');
_slideIndex = slideNumber - 1;
SlideImages[_slideIndex].classList.add('active');
CarourselIndicator[_slideIndex].classList.add('active');  
}

(function($) {
$('#toggle').toggle( 
function() {
$('#popout').animate({ left: 0 }, 'slow', function() {
$('#toggle').html('<img src="<?php echo get_template_directory_uri(); ?>/img/hamburger.png">');
});
}, 
function() {
$('#popout').animate({ left: -250 }, 'slow', function() {
$('#toggle').html('<img src="<?php echo get_template_directory_uri(); ?>/img/hamburger.png">');
});
}
);
})(jQuery);




</script>
<script>
if (!localStorage.getItem('cookieconsent')) {

document.querySelector('.cookieconsent').style.display = 'block';


}

var x = document.getElementById("consent_button");

function acceptConsent() {


document.querySelector('.cookieconsent').style.display = 'none';
localStorage.setItem('cookieconsent', true);

}





</script>


<script>
setTimeout(function(){

var myElementArray = document.querySelectorAll('._field57 input');


for(var i=0;i< myElementArray.length; i++){
myElementArray[i].value = "<?php echo basename(get_permalink()); ?>";
}

}, 10000);





</script>



</body>
</html>
