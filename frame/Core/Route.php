<?php 
namespace Core;
class Route{

	/*
	*分析url
	*/
	public function parse(){
		
		if(getConfig('URL_MODE')===1){
            $appName = getConfig('DEFAULT_APP_NAME');
            $className = !empty($_GET['c']) ? trim($_GET['c']) : getConfig('DEFAULT_CONTROLLER');
            $methodName = !empty($_GET['a']) ? trim($_GET['a']) : getConfig('DEFAULT_METHOD');
            $objfile = $appName.'\Controller\\'.$className.'Controller';
          
		    
		    
		    $obj = new $objfile($className, $methodName);
		    if(!method_exists($obj, $methodName)){
		    	exit('Error:'.$methodName.'方法不存在！');
		    }
		    $obj->$methodName();
		    
		}else if(getConfig('URL_MODE')===2){

			$pathInfo = !empty($_SERVER['PATH_INFO']) ? explode('/', $_SERVER['PATH_INFO']) : array();
		    $appName = !empty($pathInfo['1']) ? $pathInfo['1'] : getConfig('DEFAULT_APP_NAME');
		    $className = !empty($pathInfo['2']) ? $pathInfo['2'] : getConfig('DEFAULT_CONTROLLER');
		    $methodName = !empty($pathInfo['3']) ? $pathInfo['3'] : getConfig('DEFAULT_METHOD');
		    $objfile = $appName.'\Controller\\'.$className.'Controller';
		    $obj = new $objfile;
		    if(!method_exists($obj, $methodName)){
		    	exit('Error:'.$methodName.'方法不存在！');
		    }
		    $obj->$methodName();

		}

		
		
	}

}
?>