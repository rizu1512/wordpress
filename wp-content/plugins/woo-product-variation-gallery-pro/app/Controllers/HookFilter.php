<?php

namespace Rtwpvgp\Controllers; 

class HookFilter {  

    function __construct() {    
        add_filter('rtwpvg_slider_js_options', array(&$this, 'rtwpvg_slider_js_options') ); 
        add_filter('rtwpvg_js_options', array(&$this, 'rtwpvg_js_options') ); 
        add_filter('rtwpvg_thumbnail_position', array(&$this, 'rtwpvg_thumbnail_position') ); 
    }  

    function rtwpvg_slider_js_options( $default ) {   
        $default['arrows'] = rtwpvg()->get_option('slider_arrow') ? true : false;
        $default['adaptiveHeight'] = rtwpvg()->get_option('slider_adaptive_height') ? true : false;
        return $default;
    } 

    function rtwpvg_js_options( $default ) {   
        $default['enable_thumbnail_slide'] = rtwpvg()->get_option('thumbnail_slide') ? true : false; 
        return $default;
    } 

    function rtwpvg_thumbnail_position( $default ) {    
        return rtwpvg()->get_option('thumbnail_position', 'bottom');
    } 
} 