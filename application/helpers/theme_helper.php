<?php
    function minify_html($html){
        return preg_replace(array('/<!--(.*)-->/Uis',"/[[:blank:]]+/"),array('',' '),str_replace(array("\n","\r","\t"),'',$html));
    }

    function show_alert($key){
        $ci =& get_instance();
        return $ci->session->flashdata($key);
    }

    function render_success($title = '', $msg = ''){
        return "<div class=\"alert alert-success alert-dismissible\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
                <h4><i class=\"icon fa fa-warning\"></i> $title</h4>
                $msg
              </div>";
    }

    function render_error($title = '', $msg = ''){
         return "<div class=\"alert alert-danger alert-dismissible\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
                <h4><i class=\"icon fa fa-warning\"></i> $title</h4>
                $msg
              </div>";
    }

    function render_warning($title = '', $msg = ''){
        return "<div class=\"alert alert-warning alert-dismissible\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
                <h4><i class=\"icon fa fa-warning\"></i> $title</h4>
                $msg
              </div>";
    }

    function render_info($title = '', $msg = ''){
         return "<div class=\"alert alert-info alert-dismissible\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
                <h4><i class=\"icon fa fa-warning\"></i> $title</h4>
                $msg
              </div>";
    }

    function render_view($url, $variable = '', $inner = '') {
        $ci =& get_instance();
        if($inner == true) {
            return minify_html($ci->load->view("$url", $variable, $inner));
        }else {
            $vars = minify_html($ci->load->view("$url", $variable, true));
            echo $vars;
        }
    }

?>
