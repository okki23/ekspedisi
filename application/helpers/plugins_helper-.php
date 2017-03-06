<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Digunakan untuk memanggil javascript per-module
if (!function_exists('call_js_modules')) {

    function call_js_modules($jsfiles = array()) {
        $ci = & get_instance();
        foreach ($jsfiles as $jsFiles) {
            $ci->layouts->add_includes(ASSETS_JS . $jsFiles . '.js');
        }
    }

}

// Digunakan untuk memanggil javascript Utama dalam Folder Assets/js
if (!function_exists('call_js_utama')) {

    function call_js_utama($jsutama = array()) {
        $ci = & get_instance();
        foreach ($jsutama as $jsFiles) {
            $ci->layouts->add_includes(ASSETS_FOLDER . "/js/" . $jsFiles . '.js');
        }
    }

}

// Digunakan utuk memanggil CSS dalam Folder Assets/css
if (!function_exists('call_js')) {

    function call_js($jsUtama = array()) {
        $ci = & get_instance();
        foreach ($jsUtama as $js) {
            $ci->layouts->add_includes(ASSETS_FOLDER . "/" . $js . '.js');
        }
    }

}

// Digunakan utuk memanggil CSS dalam Folder Assets/css
if (!function_exists('call_css')) {

    function call_css($cssUtama = array()) {
        $ci = & get_instance();
        foreach ($cssUtama as $css) {
            $ci->layouts->add_includes(ASSETS_FOLDER . "/" . $css . '.css');
        }
    }

}


// Digunakan untuk memanggil semua kebutuhan dalam Folder Themes
if (!function_exists('call_themes')) {

    function call_themes($themes = array()) {
        $ci = & get_instance();
        foreach ($themes as $theme) {
            $ci->layouts->add_includes(THEMEPATH . "/" . $theme);
        }
    }

}

// Digunakan untuk memanggil css Themes dalam Folder Assets/themes/css
if (!function_exists('call_css_themes')) {

    function call_css_themes($cssThemes = array()) {
        $ci = & get_instance();
        foreach ($cssThemes as $css) {
            $ci->layouts->add_includes(THEMEPATH . "/" . $css . '.css');
        }
    }

}

// Digunakan utuk memanggil js THemes dalam Folder Assets/themes/js
if (!function_exists('call_js_themes')) {

    function call_js_themes($jsThemes = array()) {
        $ci = & get_instance();
        foreach ($jsThemes as $js) {
            $ci->layouts->add_includes(THEMEPATH . "/" . $js . '.js');
        }
    }

}
