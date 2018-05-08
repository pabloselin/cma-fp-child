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
			<h1>Eventos</h1>	
        </header>

    <?php 
    $usedids = array();
    if(!is_paged()):?>

        <div class="eventos-hoy">
          <?php
            $today = strtotime(date('Y-m-d', time()). ' 00:00:00');
            $endtoday = strtotime(date('Y-m-d', time()). ' 23:59:59');
            $args = array(
                'post_type' => 'cms_agenda',
                'numberposts' => -1,
                'orderby' => 'meta_value',
                'meta_key' => '_cmb_fecha_inicio',
                'meta_type' => 'NUMERIC',
                'order' => 'ASC',
                'meta_query' => array(
                                    array(
                                        'key' => '_cmb_fecha_inicio',
                                        'compare' => 'BETWEEN',
                                        'value' => array($today, $endtoday)
                                    )
                )
            );
            $eventos_hoy = get_posts($args);
            
            if($eventos_hoy):
            ?>
            <h2 class="daterange-title">Hoy</h2>
            
            <?php
            foreach($eventos_hoy as $evento_hoy) {
                $usedids[] = $evento_hoy->ID;
                $novedad_data = cms_preparecontent($evento_hoy->ID, $evento_hoy->post_title, 'featured-medium');
				set_query_var('novedad_data', $novedad_data);
                get_template_part( 'template-parts/item-evento-archive' );
            }

            ?>

            <?php endif;?>


            <?php 
                $args = array(
                    'post_type' => 'cms_agenda',
                    'numberposts' => -1,
                    'orderby' => 'meta_value',
                    'meta_key' => '_cmb_fecha_inicio',
                    'meta_type' => 'NUMERIC',
                    'order' => 'ASC',
                    'meta_query' => array(
                                        'relation' => 'AND',
                                        array(
                                            'key' => '_cmb_fecha_inicio',
                                            'compare' => '<',
                                            'value' => $today
                                        ),
                                        array(
                                            'key' => '_cmb_fecha_cierre',
                                            'compare' => '>',
                                            'value' => $endtoday
                                        )
                    )
                );
                $eventos_desarrollo = get_posts($args);
                if($eventos_desarrollo):
                ?>

                <?php
                foreach($eventos_desarrollo as $evento_desarrollo) {
                    $usedids[] = $evento_desarrollo->ID;
                    $novedad_data = cms_preparecontent($evento_desarrollo->ID, $evento_desarrollo->post_title, 'featured-medium');
                    set_query_var('novedad_data', $novedad_data);
                    get_template_part( 'template-parts/item-evento-archive' );

                }
                ?> 

                <?php endif;?>

    </div>

            <?php 
                $args = array(
                    'post_type' => 'cms_agenda',
                    'numberposts' => -1,
                    'orderby' => 'meta_value',
                    'meta_key' => '_cmb_fecha_inicio',
                    'meta_type' => 'NUMERIC',
                    'order' => 'ASC',
                    'meta_query' => array(
                                        array(
                                            'key' => '_cmb_fecha_inicio',
                                            'compare' => '>',
                                            'value' => $endtoday
                                        )
                    )
                );
                $eventos_pronto = get_posts($args);
                if($eventos_pronto):
                ?>

                <div class="eventos-pronto">
                <h2 class="daterange-title">Pronto</h2>

                <?php
                foreach($eventos_pronto as $evento_pronto) {
                    $usedids[] = $evento_pronto->ID;
                    $novedad_data = cms_preparecontent($evento_pronto->ID, $evento_pronto->post_title, 'featured-medium');
                    set_query_var('novedad_data', $novedad_data);
                    get_template_part( 'template-parts/item-evento-archive' );

                }
?>

            </div>

                <?php endif;?>

        <?php endif;?>
          <span>Mostrar eventos anteriores</span>  
        <div class="switch tiny">
          <input class="switch-input" id="smallSwitch" name="showSwitch" type="checkbox">
          <label class="switch-paddle" for="smallSwitch">
          <span class="show-for-sr">Mostrar eventos anteriores</span>
          </label>
        </div>
        <p>&nbsp;</p>
        <div class="eventos-anteriores hidden">
       

		<?php 
        $paged = get_query_var('paged')? get_query_var('paged') : 0;
        $args = array(
            'post__not_in' => $usedids,
            'post_type' => 'cms_agenda',
            'paged' => $paged
        );
        query_posts($args);
        if ( have_posts() ) : ?>

            <h2 class="daterange-title">Anteriores</h2>
            
			<?php /* Start the Loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>
                
                    <?php 
                    $novedad_data = cms_preparecontent($post->ID, $post->post_title, 'featured-medium');
                    set_query_var('novedad_data', $novedad_data);
                    get_template_part( 'template-parts/item-evento-archive' );
                    ?>
                


            <?php endwhile; ?>
            

			<?php else : ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>

            <?php endif; // End have_posts() check. ?>
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

			<?php /* Display navigation to next/previous pages when applicable */ ?>
			
			</div>
		</div>
	</div>

</div>

<?php get_footer();
