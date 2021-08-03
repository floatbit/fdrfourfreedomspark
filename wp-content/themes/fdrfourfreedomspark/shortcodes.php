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
        
        $args['target'] = ($args['target'] != null) ? $args['target'] : '';
        $args['additional_class'] = ($args['additional_class'] != null) ? $args['additional_class'] : '';

        $html = '<a href="'.$args['url'].'" class="button '.$args['mode'].' '.$args['additional_class'].'" target="'.$args['target'].'">'.$args['label'].'</a>';
        return $html;
    }
    add_shortcode('button', 'ffp_button_shortcode');

    function ffp_deck_shortcode($args=array(), $content){

        return '<div class="deck-text">'.$content.'</div>';
    }
    add_shortcode('deck', 'ffp_deck_shortcode');

    function ffp_link_with_icon_shortcode($args=array(), $content){
        
        $html = '<a href="'.$args['url'].'" class="" target="'.$args['target'].'">'.$args['title'].'</a>';
        return $html;
    }
    add_shortcode('link-with-icon', 'ffp_link_with_icon_shortcode');

    function ffp_link_with_arrow_shortcode($args=array()) {
        if (!$args) {
            $args = array();
        }

        if ( empty( $args['url'] ) ) {
            return '';
        } 
        
        if ( empty( $args['label'] ) ) {
            return '';
        }
        
        $args['target'] = ($args['target'] != null) ? $args['target'] : '';
        $args['class'] = ($args['class'] != null) ? $args['class'] : '';

        $html = '<a href="'.$args['url'].'" class="button with-arrow '.$args['class'].'" target="'.$args['target'].'">'.$args['label'].'</a>';
        return $html;
    }
    add_shortcode('button', 'ffp_link_with_arrow_shortcode');

?>