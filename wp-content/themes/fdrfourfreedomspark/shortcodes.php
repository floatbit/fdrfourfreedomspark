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

    function ffp_deck_shortcode($args=array(), $content){
        $content = str_ireplace('<p>','', $content);
        $content = str_ireplace('</p>','', $content);   
        if ($args) {
            $class = $args['class'];
        }

        return '<div class="deck-text h3-style '.$class.'">'.$content.'</div>';
    }
    add_shortcode('deck', 'ffp_deck_shortcode');

    function ffp_link_with_icon_shortcode($args=array(), $content){
        
        $html = '<a href="'.$args['url'].'" class="" target="'.$args['target'].'">'.$args['title'].'</a>';
        return $html;
    }
    add_shortcode('link-with-icon', 'ffp_link_with_icon_shortcode');

?>