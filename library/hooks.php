<?php
//Hooks for FoundationPress and Custom Content

function single_customfields($postid, $post_type) {
    
        switch($post_type):
            case('mtaller'):
                if(function_exists('talleres_fields')):
                    $iteminfo['fields'] = talleres_fields($postid);
                endif;
                if(function_exists('talleres_taxs')):
                    $iteminfo['taxterms'] = talleres_taxs($postid);
                endif;
            break;
            case('cms_agenda'):
                if(function_exists('cms_agenda_fields')):
                    $iteminfo['fields'] = cms_agenda_fields($postid);
                endif;
                if(function_exists('cms_taxterms')):
                    $iteminfo['taxterms'] = cms_taxterms($postid);
                endif;  
            break;
            default:
            break;
        endswitch;

    return $iteminfo;
}

function cms_renderiteminfo() {
    global $post;
    $post_type = $post->post_type;

    $iteminfo = single_customfields($post->ID, $post_type);
    
    switch($post_type):
        case('mtaller'):
            set_query_var( 'iteminfo', $iteminfo );
            get_template_part('template-parts/taller-metadata');
        break;
        case('cms_agenda'):
            set_query_var( 'iteminfo', $iteminfo );
            get_template_part('template-parts/agenda-metadata');
        break;
    endswitch;
}

add_action('foundationpress_post_before_entry_content', 'cms_renderiteminfo');

function cms_printbutton() {
    global $post;
    if(get_post_type($post->ID) == 'evaluaciones'):
        echo '<a class="printbutton button round small" title="Imprimir" href="javascript:window.print()"><i class="fa fa-print"></i> Imprimir</a>';
    endif;
}

add_action('foundationpress_post_before_entry_content', 'cms_printbutton');
add_action('foundationpress_page_before_entry_content', 'cms_printbutton');

function cms_linktalleres() {
    global $post;
    if(is_single() && get_post_type($post->ID) == 'mtaller'):
        $page = cm_get_option('cms_selectpagetalleres');
        echo '<a href="' . get_permalink($page) . '" class="button">Ver todos los talleres</a>';
    endif;
}

add_action('foundationpress_post_after_entry_content', 'cms_linktalleres');