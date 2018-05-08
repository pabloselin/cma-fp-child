<article class="item-evento-sidebar">
    <a href="<?php echo $novedad_data['link'];?>">
        <div class="item-text-wrap">
            <h1><?php echo $novedad_data['post_title'];?></h1>
            <?php 
            $agenda_fields = single_customfields($novedad_data['id'], 'cms_agenda');
            set_query_var( 'iteminfo', $agenda_fields );
            get_template_part('template-parts/agenda-metadata');
            ?>
        </div>
    </a>
</article>