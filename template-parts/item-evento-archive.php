<article class="item-evento-archive">
        <div class="item-text-wrap">
            <h4><a href="<?php echo $novedad_data['link'];?>"><?php echo $novedad_data['post_title'];?></a></h4>
            
            <?php 
            $agenda_fields = single_customfields($novedad_data['id'], 'cms_agenda');
            set_query_var( 'iteminfo', $agenda_fields );
            get_template_part('template-parts/agenda-metadata');
            ?>
        </div>
</article>