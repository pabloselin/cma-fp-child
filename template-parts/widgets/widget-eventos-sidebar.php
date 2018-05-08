<div class="widget-agenda-sidebar">
    <?php 
        $menu_name = 'eventos';
		$locations = get_nav_menu_locations();
		$menu_id = $locations[ $menu_name ] ;

		$menu = wp_get_nav_menu_object($menu_id);
		$eventos = wp_get_nav_menu_items($menu->term_id);

        if($eventos){
            foreach($eventos as $evento) { 
                $evento_data = cms_preparecontent($evento->object_id, $evento->title, 'fp-small');
                $type = get_post_type($evento->object_id);?>

                 <div class="sidebar-item-wrap">
                    <?php set_query_var('novedad_data', $evento_data);
                        get_template_part('template-parts/item-evento-sidebar');
                    ?>
                </div>
                
                <?php }
                }
            ?>
</div>