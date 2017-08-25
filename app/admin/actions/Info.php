<?php

class InfoAction extends Base_Action{
    public function execute(){
        echo "<br> this is InfoAction <br/>";
        $name = "huangby";
        $this->assign("name",$name);
        //手动渲染先关闭自动渲染然后指定模板
        // Yaf_Dispatcher::getInstance ()->disableView ();
        // $this->_view->display('admin/index.phtml');//渲染别的模板
    }
}
