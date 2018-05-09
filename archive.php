<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div class="main-wrap real-full-width" role="main">
	<div class="main-content">

	<div class="row">
		<div class="columns medium-8 medium-offset-2">

		<header class="archive-header">
			<h1>Archivo de <?php if(is_tax()):
							single_term_title();
						elseif(is_category()):
							single_cat_title();
						elseif(is_tag()):
							single_tag_title();
						elseif(is_post_type_archive( )):
							post_type_archive_title( );
						endif;?>
			</h1>	
		</header>
	
		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php 
				$novedad_data = cms_preparecontent($post->ID, $post->post_title, 'thumbnail');
				set_query_var('novedad_data', $novedad_data);

				if(get_post_type($post->ID) == 'post'):
					get_template_part( 'template-parts/item-novedad-archive' );
				elseif(get_post_type($post->ID) == 'cms_agenda'):
					get_template_part( 'template-parts/item-evento-archive-alt' );
				else:
					get_template_part( 'template-parts/item-default-archive' );
				endif;	
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
					<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
					<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
				</nav>
			<?php endif; ?>

			</div>
		</div>
	</div>

</div>

<?php get_footer();
