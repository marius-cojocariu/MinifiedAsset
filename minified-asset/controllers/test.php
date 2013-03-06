<?php

class Minified_Asset_Test_Controller extends Base_Controller {
    public function action_index() {
        /*Asset::add('test', 'css/test.css', array('test32'));
        Asset::add('test2', 'css/test2.css', '', array("media" => "print"));
        Asset::add('test3', 'css/test.css');
        Asset::add('test43', 'css/test2.css', '', array("media" => "small-screen2"));
        Asset::add('test44', 'css/test2.css', '', array("media" => "small-screen2"));
        Asset::add('test31', 'css/test.css');
        Asset::add('test32', 'css/test.css');*/
        
        Asset::add('test', 'js/test.js');
        
        echo '<pre>';
        echo htmlentities(Asset::scripts());
    }
}