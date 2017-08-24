<?php

class InfoAction extends Base_Action{
    public function execute(){
        echo "<br> this is InfoAction <br/>";
        $this->display('info');
    }
}
