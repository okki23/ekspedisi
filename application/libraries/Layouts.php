<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Layouts {

    // hold CI Instance
    private $CI;
    // hold layout title
    private $layout_title = null;
    // hold layout description
    private $layout_description = null;
    // hold includes like css and js files
    private $includes = array();

    public function __construct() {
        $this->CI = & get_instance();
    }

    public function set_title($title) {
        $this->layout_title = $title;
    }

    public function set_description($description) {
        $this->layout_description = $description;
    }

    public function add_includes($path, $prepend_base_url = true) {
        if ($prepend_base_url) {
            $this->includes[] = base_url() . $path;
        } else {
            $this->includes[] = $path;
        }

        return $this;
    }

    public function print_includes() {
        $final_includes = '';
        foreach ($this->includes as $include) {
            if (preg_match('/.js$/', $include)) {
                $final_includes .= '<script src="' . $include . '"></script>';
            } elseif (preg_match('/.css$/', $include)) {
                $final_includes .= '<link href="' . $include . '" rel="stylesheet" />';
            }
        }

        return $final_includes;
    }

    public function print_css() {
        $final_css = '';
        foreach ($this->includes as $include) {
            if (preg_match('/.css$/', $include)) {
                $final_css .= '<link href="' . $include . '" rel="stylesheet" />';
            }
        }
        return $final_css;
    }

    public function print_js() {
        $final_js = '';
        foreach ($this->includes as $include) {
            if (preg_match('/.js$/', $include)) {
                $final_js .= '<script src="' . $include . '"></script>';
            }
        }
        return $final_js;
    }

    public function view_user($view_name, $layouts = array(), $params = array(), $default = true) {
        if (is_array($layouts) && count($layouts) >= 1) {
            foreach ($layouts as $layout_key => $layout) {
                $params[$layout_key] = $this->CI->load->view($layout, $params, true);
            }
        }

        if ($default) {
            // set layout title
            $header_params['layout_title'] = $this->layout_title;

            // set layout description
            $header_params['layout_description'] = $this->layout_description;

            // render default header
            $this->CI->load->view('user_layout/header', $header_params);

            // render content
            $this->CI->load->view($view_name, $params);

            // set Year
            $footer_params['year'] = date("Y");

            $this->CI->load->view('user_layout/footer', $footer_params);
        } else {
            // render viewer
            $this->CI->load->view($view_name, $params);
        }
    }

    public function view_admin($view_name, $layouts = array(), $params = array(), $default = true) {
        if (is_array($layouts) && count($layouts) >= 1) {
            foreach ($layouts as $layout_key => $layout) {
                $params[$layout_key] = $this->CI->load->view($layout, $params, true);
            }
        }

        if ($default) {
            // set layout title
            $header_params['layout_title'] = $this->layout_title;

            // set layout description
            $header_params['layout_description'] = $this->layout_description;

            // render default header
            $this->CI->load->view('admin_layout/header', $header_params);

            // render default menu
            $this->CI->load->view('admin_layout/menu', $header_params);

            // render content
            $this->CI->load->view($view_name, $params);

            // set Year
            $footer_params['year'] = date("Y");

            $this->CI->load->view('admin_layout/footer', $footer_params);
        } else {
            // render viewer
            $this->CI->load->view($view_name, $params);
        }
    }

}

?>
