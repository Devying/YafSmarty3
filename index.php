<?php
define('ROOT_PATH', dirname(__FILE__).DIRECTORY_SEPARATOR);

#设置全局访问类库的位置
ini_set('yaf.library',ROOT_PATH."/library");
require_once ROOT_PATH."/library/Smarty/Smarty.class.php";
#取到模块名称 随时设置MODULE为模块当前访问模块名称

$uri = $_SERVER['REQUEST_URI'];
$ary = explode('/', $uri);
if (count($ary) > 1 && strlen($ary[1]) > 0) {
    //这里也可以直接include模块的index.php入口文件
    $module = $ary[1];
} else {
    $module = 'index';
}
$modules = array('admin', 'home', 'user');
if(!in_array($module,$modules)){
    $module = 'index';
}
define("MODULE", $module);
Yaf_Registry::set('module', $module);

$application = new Yaf_Application( ROOT_PATH . "conf/application.ini");
try {
    $application->bootstrap ()->run ();
}catch (Exception $ex){
    $message = $ex->getMessage();
    if (ini_get('display_errors')) {
        $message .= '<br>'. nl2br($ex->getTraceAsString());
        echo $message;
    } elseif ($_SERVER['REQUEST_URI'] != '/error/wrong') {
        header('Location:/error/noexists');
        exit;
    }
}
?>
