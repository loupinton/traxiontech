<?php

/**
 * Returns Path of view
 *
 * @param string $path - path/file info
 *
 * @return boolean
 *

 */

if (!function_exists('viewPath')) {
    function viewPath($path)
    {
        return VIEWPATH . '/' . $path . '.php';
    }
}

//Dynamically add CSS files to header page
if (!function_exists('add_css')) {
    function add_css($file = '')
    {
        $str = '';
        $ci = &get_instance();
        $header_css = $ci->config->item('header_css');

        if (empty($file)) {
            return;
        }

        if (is_array($file)) {
            if (!is_array($file) && count($file) <= 0) {
                return;
            }
            foreach ($file as $item) {
                $header_css[] = $item;
            }
            $ci->config->set_item('header_css', $header_css);
        } else {
            $str = $file;
            $header_css[] = $str;
            $ci->config->set_item('header_css', $header_css);
        }
    }
}
/* helper functions to load css and js on a page */
//Dynamically add Javascript files to header page
if (!function_exists('add_footer_js')) {
    function add_footer_js($file = '')
    {
        $str = '';
        $ci = &get_instance();
        $footer_js = $ci->config->item('footer_js');

        if (empty($file)) {
            return;
        }

        if (is_array($file)) {
            if (!is_array($file) && count($file) <= 0) {
                return;
            }
            foreach ($file as $item) {
                $footer_js[] = $item;
            }

            $ci->config->set_item('footer_js', $footer_js);
        } else {
            $str = $file;
            $footer_js[] = $str;
            $ci->config->set_item('footer_js', $footer_js);
        }
    }
}

if (!function_exists('put_header_assets')) {
    function put_header_assets()
    {
        $str = '';
        $ci = &get_instance();
        $header_css = $ci->config->item('header_css');
        $header_js = $ci->config->item('header_js');

        foreach ($header_css as $item) {
            if (strpos($item, 'https://') !== false) {
                $str .= '<link rel="stylesheet" href="' . $item . '" type="text/css" />' . "\n";
            } else {
                $str .= '<link rel="stylesheet" href="' . base_url() . $item . '" type="text/css" />' . "\n";
            }
        }
        if (is_array($header_js)) {
            foreach ($header_js as $item) {
                if (strpos($item, 'https://') !== false) {
                    $str .= '<script type="text/javascript" src="' . $item . '"></script>' . "\n";
                } else {
                    $str .= '<script type="text/javascript" src="' . base_url() . $item . '"></script>' . "\n";
                }
            }
        }

        return $str;
    }
}


if (!function_exists('put_footer_assets')) {
    function put_footer_assets()
    {
        $str = '';
        $ci = &get_instance();
        $footer_js = $ci->config->item('footer_js');

        
        foreach ($footer_js as $item) {
            if (strpos($item, 'https://') !== false) {
                $str .= '<script type="text/javascript" src="' . $item . '"></script>' . "\n";
            } else {
                $str .= '<script type="text/javascript" src="' . base_url() . $item . '"></script>' . "\n";
            }
        }

        return $str;
    }
}
