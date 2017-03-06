<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('tanggalan')) {

    function tanggalan($tanggal) {
        $getyear = substr($tanggal, 0, 4);
        $getmonth = substr($tanggal, 5, 2);
        $getdate = substr($tanggal, 8, 2);

        switch ($getmonth) {
            case "01":
                $bulan = "Januari";
                break;

            case "02":
                $bulan = "Februari";
                break;

            case "03":
                $bulan = "Maret";
                break;

            case "04":
                $bulan = "April";
                break;

            case "05":
                $bulan = "Mei";
                break;

            case "06":
                $bulan = "Juni";
                break;

            case "07":
                $bulan = "Juli";
                break;

            case "08":
                $bulan = "Agustus";
                break;

            case "09":
                $bulan = "September";
                break;

            case "10":
                $bulan = "Oktober";
                break;

            case "11":
                $bulan = "November";
                break;

            case "12":
                $bulan = "Desember";
                break;

            default:
                $bulan = "Bulan tidak diketahui";
                break;
        }

        $hasil = $getdate . ' ' . $bulan . ' ' . $getyear;

        return $hasil;
    }

}

if (!function_exists('add_meta_title')) {

    function add_meta_title($string) {
        $CI = & get_instance();
        $CI->data['meta_title'] = e($string) . ' - ' . $CI->data['meta_title'];
    }

}

if(!function_exists('rubah_tanggal_excel_to_sql')){
    function rubah_tanggal_excel_to_sql($date){
        $getyear = date('Y',strtotime($date));//substr($date,6,4);
        $getmonth = date('m',strtotime($date));
        $getdate = date('d',strtotime($date));
        $susun = $getyear."-".$getmonth."-".$getdate;
        return $susun;

    }      
}
if (!function_exists('btn_edit')) {

    function btn_edit($uri) {
        return anchor($uri, '<span class="glyphicon glyphicon-pencil" aria-hidden="true"> </span>', array('title' => "Edit Data"));
    }

}

if (!function_exists('btn_reply')) {

    function btn_reply($uri) {
        return anchor($uri, '<span class="glyphicon glyphicon-share" aria-hidden="true"> </span>', array('title' => "Reply"));
    }

}

if (!function_exists('btn_delete')) {

    function btn_delete($uri) {
        return anchor($uri, '<span class="glyphicon glyphicon-trash" aria-hidden="true"> </span> ', array('title' => "Delete Data", 'onclick' => "return confirm('are you sure to delete this data,this cannot be undone');"));
    }

}

if (!function_exists('e')) {

    function e($string) {
        return htmlentities($string);
    }

}

if (!function_exists('thumbs')) {

    function thumbs($data) {
        $CI = & get_instance();
        //$CI->data['thumbnails'];
        $result = '';
        //foreach($data as $list){
        if ($data->photo == '' || $data->photo == NULL) {
            $result = "<img src=" . base_url('assets/img/defaultpic.gif') . " style='width:90px; height:60px; margin-top:-120px;'>";
            //}
        } else {
            $result = "<img src=" . $data->photo . " style='width:90px; height:60px; margin-top:-120px;'>";
            //}
        }

        return $result;
    }

}

if (!function_exists('article_link')) {

    function article_link($article) {
        return 'article/' . intval($article->id) . '/' . str_replace(" ", "-", $article->title);
    }

}

if (!function_exists('article_links')) {

    function article_links($articles) {
        $string = '<ul class="list-group">';
        foreach ($articles as $article) {
            $url = '<li class="list-group-item" >' . anchor(article_link($article), $article->title, 'class="label label-danger"') . '<br>' . tanggalan($article->pubdate) . '</li>';
            $string .= $url;
        }
        $string .= '</ul>';
        return $string;
    }

}

if (!function_exists('remove_space')) {

    function remove_space($string) {
        return str_replace(" ", "-", $string);
    }

}

if (!function_exists('get_excerpt')) {

    function get_excerpt($article, $numwords = 50) {
        $string = '';
        $url = base_url('article/' . intval($article->id) . '/' . remove_space($article->title));
        //$string .=  $url;
        $string .= '<h2>' . anchor($url, e($article->title)) . '</h2>';
        $string .= '<p>' . tanggalan((strip_tags($article->pubdate))) . '</p>';
        $string .= '<p align="justified">' . e(limit_to_numwords(strip_tags($article->body), $numwords)) . '</p>';
        $string .= '<p>' . anchor($url, 'Read More > ', 'class=btn btn-success', array('title' => e($article->title)), 'class=btn btn-primary') . '</p>';
        return $string;
    }

}



if (!function_exists('get_excerpt_detail')) {

    function get_excerpt_detail($article) {
        $string = '';
        $url = base_url('article/' . intval($article->id) . '/' . remove_space($article->title));
        $string .= '<h2 align="center">' . anchor($url, e($article->title)) . '</h2>';
        $string .= "<br>";
        //$string .= '<div align="center"><img src="http://abiocoffee.com/uploads/americano.jpg" style="width:20%; height:20%;"></div>';
        //$string .= "<h3><b>Deskripsi Produk : <br></b></h3>";
        // $string .= '<p>' . tanggalan((strip_tags($article->pubdate))) . '</p>';
        $string .= '<p align="justify">' . $article->body . '</p>';

        $string .= " <hr>";

        return $string;
    }

}

if (!function_exists('get_product_detail')) {

    function get_product_detail($article) {
        $string = '';
        $url = base_url('product/' . intval($article->id) . '/' . remove_space($article->caption));
        $string .= '<h2 align="center">' . anchor($url, e($article->caption)) . '</h2>';
        $string .= '<div align="center"><img src="http://abiocoffee.com/uploads/americano.jpg" style="width:20%; height:20%;"></div>';
        $string .= "<h3><b>Deskripsi Produk : <br></b></h3>";
        // $string .= '<p>' . tanggalan((strip_tags($article->pubdate))) . '</p>';
        $string .= '<p align="justify">' . $article->description . '</p>';

        $string .= " <hr>";

        return $string;
    }

}

if (!function_exists('limit_to_numwords')) {

    function limit_to_numwords($string, $numwords) {
        $excerpt = explode(' ', $string, $numwords + 1);
        if (count($excerpt) >= $numwords) {
            array_pop($excerpt);
        }
        $excerpt = implode(' ', $excerpt);
        return $excerpt;
    }

}

if (!function_exists('get_menu')) {

    function get_menu($array, $child = FALSE) {
        $str = "";
        $CI = & get_instance();
        if (count($array)) {
            $str .= $child == FALSE ? '<ul class="nav navbar-nav navbar-right" style="z-index:1000;">' . PHP_EOL : '<ul class="dropdown">' . PHP_EOL;

            foreach ($array as $item) {
                $active = $CI->uri->segment(1) == $item['slug'] ? TRUE : FALSE;
                if (isset($item['children']) && count($item['children'])) {
                    $str .= '<li>';

                    $str .= '<a ';

                    $str .= $active ? ' class="active" ' : ' class="" ';

                    $str .= 'href="javascript:void(0)">' . e($item['title']);

                    $str .= '<b class="caret"></b></a>' . PHP_EOL;

                    $str .= get_menu($item['children'], TRUE);
                } else {
                    $str .= '<li>';

                    $str .= '<a ';

                    $str .= $active ? ' class="active" ' : ' class="" ';

                    $str .= 'href="' . base_url($item['slug']) . '">' . e($item['title']) . '</a>';
                }


                $str .= '</li>' . PHP_EOL;
            }

            $str .= '</ul>' . PHP_EOL;
        }
        return $str;
    }

}

if (!function_exists('get_menu_responsive')) {

    function get_menu_responsive($array, $child = FALSE) {

        $strb = "";
        $CI = & get_instance();
        if (count($array)) {

            $strb .= $child == FALSE ? '<ul class="wpb-mobile-menu">' . PHP_EOL : '<ul class="dropdown">' . PHP_EOL;
            foreach ($array as $item) {
                $active = $CI->uri->segment(1) == $item['slug'] ? TRUE : FALSE;
                if (isset($item['children']) && count($item['children'])) {

                    $strb .= '<li>';

                    $strb .= '<a ';

                    $strb .= $active ? ' class="active" ' : ' class="" ';

                    $strb .= 'href="javascript:void(0)">' . e($item['title']);

                    $strb .= '<b class="caret"></b></a>' . PHP_EOL;

                    $strb .= get_menu($item['children'], TRUE);
                } else {

                    $strb .= '<li>';

                    $strb .= '<a ';

                    $strb .= $active ? ' class="active" ' : ' class="" ';

                    $strb .= 'href="' . base_url($item['slug']) . '">' . e($item['title']) . '</a>';
                }



                $strb .= '</li>' . PHP_EOL;
            }


            $strb .= '</ul>' . PHP_EOL;
        }

        return $strb;
    }

}

if (!function_exists('enkrip_password')) {

    function enkrip_password($username, $password) {
        $passw = hash('sha512', sha1($password . $username));
        return $passw;
    }

}


if (!function_exists('create_paging')) {

    function create_paging($id = 0, $data = array()) {
        $config = array();
        switch ($id) {
            case 1:
                $config = paging_default($data);
                break;
            case 2:
                $config = paging_custom($data);
                break;
            default:
                $config = paging_default($data);
                break;
        }

        return $config;
    }

}


if (!function_exists('paging_default')) {

    function paging_default($data = array()) {

        $classParent = !empty($data['classParent']) ? $data['classParent'] : "pagination";
        $classActive = !empty($data['classActive']) ? $data['classActive'] : "active";

        $config['full_tag_open'] = '<ul class="' . $classParent . '">';
        $config['full_tag_close'] = '</ul>';

        $config['first_link'] = "<<";
        $config['last_link'] = ">>";

        $config['first_tag_open'] = "<li>";
        $config['first_tag_close'] = "</li>";

        $config['last_tag_open'] = "<li>";
        $config['last_tag_close'] = "</li>";

        $config['next_link'] = ">>";
        $config['prev_link'] = "<<";

        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";

        $config['prev_tag_open'] = "<li>";
        $config['prev_tag_close'] = "<li>";

        $config['cur_tag_open'] = "<li class=" . $classActive . "> <a href='#'>";
        $config['cur_tag_close'] = "</a></li>";

        $config['num_tag_open'] = "<li>";
        $config['num_tag_close'] = "</li>";

        //S$config['attributes'] = array('class' => $classParent);

        $config['total_rows'] = $data['total_rows'];
        $config['per_page'] = $data['limit'];
        $config['uri_segment'] = $data['segment'];
        $config['base_url'] = $data['url'];

        return $config;
    }

}

if (!function_exists('paging_custom')) {

    function paging_custom($data = array()) {
        $classParent = !empty($data['classParent']) ? $data['classParent'] : "navlinks";
        $classActive = !empty($data['classActive']) ? $data['classActive'] : "navlinks current";
        //$config['full_tag_open'] = '<a class="' . $classParent . '">';
        //$config['full_tag_close'] = '</a>';

        $config['first_link'] = "<<";
        $config['last_link'] = ">>";

        $config['first_tag_open'] = '<a>';
        $config['first_tag_close'] = "</a>";

        $config['last_tag_open'] = '<a>';
        $config['last_tag_close'] = "</a>";

        $config['next_link'] = " NEXT >";
        $config['prev_link'] = "< PREVIOUS ";

        //$config['next_tag_open'] = '<a class="' . $classParent . '">';
        //$config['next_tag_close'] = "</a>";
        //$config['prev_tag_open'] = '<a class="' . $classParent . '">';
        //$config['prev_tag_close'] = "<a>";

        $config['cur_tag_open'] = "<a class='" . $classActive . "' href='#'>";
        $config['cur_tag_close'] = "</a>";

        //$config['num_tag_open'] = "<a class='" . $classParent . "'>";
        //$config['num_tag_close'] = "</a>";

        $config['attributes'] = array('class' => $classParent);

        $config['total_rows'] = $data['total_rows'];
        $config['per_page'] = $data['limit'];
        $config['uri_segment'] = $data['segment'];
        $config['base_url'] = $data['url'];

        return $config;
    }

}

if (!function_exists('array_from_post')) {

    function array_from_post($fields) {
        $ci = & get_instance();
        $data = array();
        foreach ($fields as $field) {
            $data[$field] = $ci->input->post($field);
        }
        return $data;
    }

}
if (!function_exists('search_box')) {

    function search_box($data = array()) {
        $isi = '  <div style="float:right">
                    <form action="' . $data['url'] . '" method="POST" enctype="multipart/form-data">

                    <div class="input-group">
                    <div class="input-group-btn search-panel">
                        <button type="button" class="btn btn-default dropdown-toggle" id="cari" data-toggle="dropdown">
                            <span id="search_concept">Filter by</span> <span class="caret"></span>
                        </button>

                        <ul class="dropdown-menu" id="search_result" role="menu">';

        foreach ($data['data_filter'] as $key => $value) {
            $isi .= "<li><a  value='" . $key . "'>" . $value . "</a></li>";
        }

        $isi .= '</ul>
                    </div>
                        <input type="hidden" class="form-control" required="required" name="search_param" id="search_param" >         
                        <input type="text" class="form-control search" name="search" placeholder="Search..." disabled="disabled">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit" id="tombol" ><span class="glyphicon glyphicon-search"></span></button>
                    </span>
                </div>
                    </form>
                </div>';

        return $isi;
    }

}

if (!function_exists('enkrip_url')) {

    function enkrip_url($id) {
        $ci = get_instance();

        $encrypt_method = "AES-256-CBC";
        $secret_key = $ci->config->item('encryption_key');
        $secret_iv = $ci->config->item('encryption_key');
        // hash
        $key = hash('sha256', $secret_key);
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        $output = openssl_encrypt($id, $encrypt_method, $key, 0, $iv);
        $dicrypt = base64_encode($output);
        return $dicrypt;
    }

}

if (!function_exists('dekrip_url')) {

    function dekrip_url($id) {
        $ci = get_instance();

        $encrypt_method = "AES-256-CBC";
        $secret_key = $ci->config->item('encryption_key');
        $secret_iv = $ci->config->item('encryption_key');
        // hash
        $key = hash('sha256', $secret_key);
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        $output = base64_decode($id);
        $dicrypt = openssl_decrypt($output, $encrypt_method, $key, 0, $iv);
        return $dicrypt;
    }

}

if (!function_exists('get_the_current_url')) {

    function get_the_current_url() {

        $protocol = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
        $base_url = $protocol . "://" . $_SERVER['HTTP_HOST'];
        $complete_url = $base_url . $_SERVER["REQUEST_URI"];

        return $complete_url;
    }

}

/**
 * Dump helper. Functions to dump variables to the screen, in a nicley formatted manner.
 * @author Joost van Veen
 * @version 1.0
 */
if (!function_exists('dump')) {

    function dump($var, $label = 'Dump', $echo = TRUE) {
        // Store dump in variable 
        ob_start();
        var_dump($var);
        $output = ob_get_clean();

        // Add formatting
        $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
        $output = '<pre style="background: #FFFEEF; color: #000; border: 1px dotted #000; padding: 10px; margin: 10px 0; text-align: left;">' . $label . ' => ' . $output . '</pre>';

        // Output
        if ($echo == TRUE) {
            echo $output;
        } else {
            return $output;
        }
    }

}

if (!function_exists('dump_exit')) {

    function dump_exit($var, $label = 'Dump', $echo = TRUE) {
        dump($var, $label, $echo);
        exit;
    }

}
?>