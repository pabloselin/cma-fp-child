<div class="widget-novedades-sidebar">
    <?php 
        $menu_name = 'novedades';
		$locations = get_nav_menu_locations();
		$menu_id = $locations[ $menu_name ] ;

		$menu = wp_get_nav_menu_object($menu_id);
		$novedades = wp_get_nav_menu_items($menu->term_id);

        if($novedades){
            foreach($novedades as $novedad) { 
                $novedad_data = cms_preparecontent($novedad->object_id, $novedad->title, 'fp-small');
                $type = get_post_type($novedad->object_id);?>

                 <div class="sidebar-item-wrap">
                    <?php set_query_var('novedad_data', $novedad_data);
                        get_template_part('template-parts/item-novedad-sidebar');
                    ?>
                </div>
                
                <?php }
                }
            ?>
</div>