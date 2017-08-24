<?php
class AdminController extends Yaf_Controller_Abstract {
    public $actions=array(
        "info"=>"actions/Info.php",
        "m3u8"=>"actions/M3u8.php",
    );

    public function helloAction(){
        echo __METHOD__;
    }
}