<?php
/*
Template Name: Archivo de Novedades
*/

get_header(); ?>

<div class="main-wrap real-full-width" role="main">
	<div class="main-content">

    <div class="row">
		<div class="columns medium-8 medium-offset-2">

		<header class="archive-header">
			<h1>Archivo de Noticias
			</h1>	
        </header>
    <?php 
		$paged = get_query_var( 'paged' );
		$args = array(
				'post_type' => 'post',
				'posts_per_page' => 10,
				'paged' => $paged
			);
			$noticias = new WP_Query($args);
			$temp_query = $wp_query;
			$wp_query = NULL;
			$wp_query = $noticias;
    ?>
	<?php if ( $noticias->have_posts() ) : ?>

		<?php /* Start the Loop */ ?>
		<?php while ( $noticias->have_posts() ) : $noticias->the_post(); ?>
			<?php 
			$novedad_data = cms_preparecontent($post->ID, $post->post_title, 'thumbnail');
			set_query_var('novedad_data', $novedad_data);
            echo '<div class="row">';
            get_template_part( 'template-parts/item-novedad-archive' );
            echo '</div>';
             ?>
		<?php endwhile; ?>

		<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; // End have_posts() check. ?>

		<?php /* Display navigation to next/previous pages when applicable */ ?>
		<?php
		if ( function_exists( 'foundationpress_pagination' ) ) :
			foundationpress_pagination();
		elseif ( is_paged() ) :
		?>
			<nav id="post-nav">
				<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ), $noticias->max_num_pages ); ?></div>
				<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
			</nav>
		<?php endif; ?>

	</div>

</div>

</div>
</div>

<?php get_footer();
