<?php

    function ffp_button_shortcode($args=array()) {
        if (!$args) {
            $args = array();
        }

        if ( empty( $args['url'] ) ) {
            return '';
        } 
        
        if ( empty( $args['label'] ) ) {
            return '';
        }
        
        $args['target'] = ($args['target'] != null) ? $args['label'] : '';
        $args['additional_class'] = ($args['additional_class'] != null) ? $args['additional_class'] : '';

        $html = '<a href="'.$args['url'].'" class="button '.$args['mode'].' '.$args['additional_class'].'" target="'.$args['target'].'">'.$args['label'].'</a>';
        return $html;
    }
    add_shortcode('button', 'ffp_button_shortcode');

?>