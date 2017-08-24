# yaf框架集成smarty3
## 运行环境
- lnmp [点击下载](https://lnmp.org/download.html)
- PHP 5.5.25 
- yaf 2.3.5 [点击下载](http://pecl.php.net/package/yaf)
- 其他软件版本自定
## 安装和配置 
### yaf框架的安装和配置

#### 编译安装yaf框架

```bash
[root@lnmp ~]# tar -xvf yaf-2.3.5.tgz
[root@lnmp ~]# cd yaf-2.3.5
[root@lnmp yaf-2.3.5]# phpizeSolarizedDark.xcs
Configuring for:
PHP Api Version:         20121113
Zend Module Api No:      20121212
Zend Extension Api No:   220121212
[root@lnmp yaf-2.3.5]# ./configure --with-php-config=/usr/local/php/bin/php-config
[root@lnmp yaf-2.3.5]# make
[root@lnmp yaf-2.3.5]# make install
Installing shared extensions:     /usr/local/php/lib/php/extensions/no-debug-non-zts-20121212/
```

#### 配置 

查看php.ini配置中是否加入了yaf.so

### nginx 的配置
在vhost目录中新建你想用的vhost配置，当然lnmp这个包为我们提供了简单的命令，直接只用命令
`lnmp vhost add` 根据提示一步步操作。
完成后打开配置文件添加配置
```
location /{
    if (!-e $request_filename){
        rewrite ^/(.*) /index.php?$1 last;
    }
}
```
注意root 要指向你的项目根目录

## 部署

将本代码克隆下来后放到上一步nginx 配置中的root指向的目录中：
(加入我上一步配置的nginx中root /home/wwwroot/default/YafApps )
```bash
[root@lnmp YafApps]# pwd
/home/wwwroot/default/YafApps
[root@lnmp YafApps]# tree -L 2
.
├── app
│   ├── admin
│   ├── home
│   ├── index
│   └── user
├── conf
│   └── application.ini
├── index.php
├── library
│   ├── Base
│   ├── DB
│   ├── readme.txt
│   └── Smarty
├── readme.md
└── views
    ├── templates
    └── templates_c

13 directories, 4 files
[root@lnmp YafApps]# 
```

## 说明
### app目录
app目录里面放着主要的业务代码。比如里面的admin模块，控制器在controllers里面是Admin.php
如下

```php
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
```
你可以把action直接写在controller里面比如 `helloAction` 也可以拆分到到actions目录里面
详细的可以参见鸟哥的[yaf手册](http://www.laruence.com/manual/)
### views目录
views目录里面放着的就是前端模板文件了。比如admin模块的模板就放到了views/template/admin目录中。具体模板的名字你可以在代码中`$this->display('info');`来指定。
