<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<?php if(get_post_type($post->ID) == 'evaluaciones'):
			$classes = 'main-wrap';
		else:
			$classes = 'main-wrap';
		endif;?>

<div class="<?php echo $classes;?>" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
		<header>
			
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<div class="info-entry">
				<?php foundationpress_entry_meta(); ?>
			</div>
			<?php the_post_thumbnail( 'fp-medium' );?>
		</header>
		<?php do_action( 'foundationpress_post_before_entry_content' ); ?>
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
		<?php do_action( 'foundationpress_post_after_entry_content' ); ?>
		<footer>
			<?php
				wp_link_pages(
					array(
						'before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ),
						'after'  => '</p></nav>',
					)
				);
			?>
			<div class="post-info">
				<p><?php the_tags('<span><i class="fa fa-fw fa-tag"></i> Etiquetas</span>', ' '); ?></p>
				<p><?php the_terms( $post->ID, 'areas', '<span><i class="fa fa-fw fa-file-text"></i> Áreas</span>', ' ', '' );?></p>
				<p><?php the_terms( $post->ID, 'comunidad', '<span><i class="fa fa-fw fa-group"></i> Comunidad</span>', ' ', '' );?></p>
				<p><?php the_terms( $post->ID, 'nivel', '<span><i class="fa fa-fw fa-level-up"></i> Nivel</span>', ' ', '' );?></p>
			</div>
			
		</footer>
	</article>
<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' ); ?>
<?php 
	get_sidebar();
?>
</div>
<?php get_footer();
