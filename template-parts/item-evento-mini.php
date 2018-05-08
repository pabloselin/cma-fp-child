<article class="item-evento-archive">
        <div class="item-text-wrap">
            <h1><a href="<?php echo $novedad_data['link'];?>"><?php echo $novedad_data['post_title'];?></a></h1>
            
            <div class="event-data">
                <?php $agenda_fields = cms_agenda_fields($novedad_data['id']);
                if($agenda_fields['_cmb_fecha_inicio']):
                    echo '<p>Inicio:' . $agenda_fields['_cmb_fecha_inicio'] . '</p>';
                endif;
                if($agenda_fields['_cmb_fecha_cierre'] && $agenda_fields['_cmb_fecha_inicio'] != $agenda_fields['_cmb_fecha_cierre']):
                    echo '<p>Cierre: ' . $agenda_fields['_cmb_fecha_cierre'] . '</p>';
                endif;
                if($agenda_fields['_cmb_hora_inicio']):
                    echo '<p><i class="fa fa-clock-o"></i> ' . $agenda_fields['_cmb_hora_inicio'];
                    if($agenda_fields['_cmb_hora_cierre']):
                        echo ' - ' . $agenda_fields['_cmb_hora_cierre'];
                    endif;
                    echo '</p>';
                endif;
                ?>
            </div>
        </div>
</article>