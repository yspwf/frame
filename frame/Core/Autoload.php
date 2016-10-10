<?php 
namespace Core;
class Autoload{

    //自动载入函数
    public function register(){
        spl_autoload_register(array($this, 'autoload'));
    }

    public function autoload($className){
        $fileName = str_replace('\\','/',$className.'.php');
        if(file_exists($fileName)){
             include APP_PATH.'/'.$fileName;
        }else{
            exit('Ereor:'.$fileName.'加载失败！');
        }
    	/*
    	$pathArr = explode('\\', $className);
    	$fileName = array_pop($pathArr);
    	$dir = implode(DIRECTORY_SEPARATOR,$pathArr);
        $fileName = $dir.'/'.$fileName.'.php';
        if(file_exists($fileName)){
        	 include $fileName;
        }else{
        	exit('Ereor:'.$fileName.'加载失败！');
        }
        */
    }
    
}
?>