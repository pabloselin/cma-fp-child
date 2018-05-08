<?php
/*
Template Name: Front
*/
get_header(); ?>

<div class="row">
	<section class="home grid-x">
		<div class="cell medium-8">
			<?php dynamic_sidebar( 'front-widgets' );?>
		</div>
		<div class="cell medium-4">
			<div class="front-widgets">
				<?php dynamic_sidebar( 'sidebar-front-widgets' );?>
			</div>
			<div class="front-banners">
				<?php dynamic_sidebar( 'sidebar-front-banners' );?>
			</div>
		</div>
	</section>
</div>


<?php get_footer();
