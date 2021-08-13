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

        $html = '<a href="'.$args['url'].'" class="button '.$args['additional_class'].'" target="'.$args['target'].'">'.$args['label'].'</a>';
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
        if (!$args) {
            $args = array();
        }

        if ( empty( $args['url'] ) ) {
            return '';
        } 
        
        if ( empty( $args['title'] ) ) {
            return '';
        }
        $icon = $args['icon'];
        if ( empty( $args['icon'] ) ) {
            $icon = '';
        }

        $html = '<a href="'.$args['url'].'" class="btn-link-with-icon" target="'.$args['target'].'"> <span class="icon icon-'.$icon.'"></span>'.$args['title'].'</a>';
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
        
        if ( empty( $args['title'] ) ) {
            return '';
        }
        
        $target = ($args['target'] != null) ? $args['target'] : '';
        $class  = ($args['class']  != null) ? $args['class'] : '';

        $html = '<a href="'.$args['url'].'" class="btn-with-arrow '.$class.'" target="'.$target.'">'.$args['title'].'</a>';
        return $html;
    }
    add_shortcode('link-with-arrow', 'ffp_link_with_arrow_shortcode');

    function ffp_quote_shortcode($args=array(), $content){
        if (strpos($content, '<p>') !== false) {
            $content = substr_replace($content, '<p>&#8220;', 0, 3);
            $content = substr_replace($content, '&#8221;</p>', -5, 4);
        } else {
            $content = '&#8220;'.$content.'&#8221;';
        }

        if ($args) {
            $class = $args['class'];
            $by = $args['by'];
            if ($args['text_color']) {
                $text_color = $args['text_color'];
            } else {
                $text_color = 'color-blue';
            }

        }

        return 
            '<div class="quote-container '.$class.'">
                <div class="quote-text '.$text_color.'">'
                    .$content.
                '</div>
                <div class="quote-by p-style">
                    <i class="fal fa-minus"></i>'.$by.
                '</div>
            </div>';
    }
    add_shortcode('quote', 'ffp_quote_shortcode');

?>