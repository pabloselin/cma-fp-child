<?php
/**
* Custom Field Utils
*/

function cms_agenda_fields($postid) {
    $prefix = '_cmb_';

    $fieldnames = array(
        $prefix . 'fecha_inicio',
        $prefix . 'fecha_cierre',
        $prefix . 'hora_inicio',
        $prefix . 'hora_cierre',
        $prefix . 'lugar'
    );

    foreach($fieldnames as $key=>$fieldname) {
         if(get_post_meta($postid, $fieldname, true)) {
             $fieldlist[$fieldname] = get_post_meta($postid, $fieldname, true);
         }
     }

     return $fieldlist;
}

function cms_taxterms($postid) {
    $taxlist = array(
        'areas',
        'comunidad',
        'nivel'
    );

    foreach($taxlist as $taxonomy) {
        $taxc = get_the_terms( $postid, $taxonomy );
        if($taxc) {
           foreach($taxc as $taxitem) {
               $taxcontent[$taxonomy][$taxitem->slug] = $taxitem->name;
           }
        }
    }
    return $taxcontent;

}