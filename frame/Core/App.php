<?php 
namespace Core;

class App{

	//运行框架
	public function Init(){
		//设置头部文件
         header('Content-type:text/html;charset=utf-8;');
         //载入系统文件
         $this->_loadSysFile();

         //自动加载函数
         $this->_setAutoload();
         $this->_route();
	}

    private function _loadSysFile(){
    	   require_once __DIR__.'/Function.php';
         $GLOBALS['config'] = require_once  __DIR__.'/Config/Config.php';
    }

	//自动加载函数
	private function _setAutoload(){
           require __DIR__.'/Autoload.php';
           $autoload=new Autoload(); 
           $autoload->register();
	}

	private function _route(){
		  $route = new Route();
		  $route->parse();
	}
}

?>