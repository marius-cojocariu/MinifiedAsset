<?php

class Minified_Asset_Serve_Controller extends Base_Controller {
    public function action_style($data) {
        $minify = IoC::resolve('Minify');
        
        if(strpos($data, '.css') == (strlen($data) - 4)) {
            $data = substr($data, 0, strlen($data) - 4);
        }
        if(strpos($data, '.js') == (strlen($data) - 3)) {
            $data = substr($data, 0, strlen($data) - 3);
        }
        
        $files = unserialize(base64_decode(rawurldecode($data)));
        if($files) {
            $minify_controller = new Minify_Controller_Asset();
            $minify_controller->setFiles($files);
            
            $minify->serve($minify_controller);
            
            //the minify library will take care of the rest
            exit();
        } else {
            //serve 404
        }
    }
    
    public function action_script($data) {
        $minify = IoC::resolve('Minify');
        
        if(strpos($data, '.css') == (strlen($data) - 4)) {
            $data = substr($data, 0, strlen($data) - 4);
        }
        if(strpos($data, '.js') == (strlen($data) - 3)) {
            $data = substr($data, 0, strlen($data) - 3);
        }
        
        $files = unserialize(base64_decode(rawurldecode($data)));
        if($files) {
            $minify_controller = new Minify_Controller_Asset();
            $minify_controller->setFiles($files);
            
            $minify->serve($minify_controller);
            
            //the minify library will take care of the rest
            exit();
        } else {
            //serve 404
        }
    }
}