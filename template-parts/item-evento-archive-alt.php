<article class="item-evento-archive media-object">
    <div class="media-object-section">
        <a class="block-link" href="<?php echo $novedad_data['id'];?>">
            <i class="fa fa-calendar fa-4x"></i>
        </a>
    </div>
    <div class="media-object-section">
        <div class="item-text-wrap">
        	<?php if(!is_post_type_archive( )):?>
            	<span class="ptype">Agenda</span>
        	<?php endif;?>
            <h4><a href="<?php echo $novedad_data['link'];?>"><?php echo $novedad_data['post_title'];?></a></h4>
            
            <?php 
            $agenda_fields = single_customfields($novedad_data['id'], 'cms_agenda');
            set_query_var( 'iteminfo', $agenda_fields );
            get_template_part('template-parts/agenda-metadata');
            ?>
        </div>
    </div>
</article>