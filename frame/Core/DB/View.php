<?php 
namespace Core\DB;
class View{

     protected $variables = array();

     protected $_controller;

     protected $_action;
    
     function __construct($_controller, $_action){
          $this->_controller = $_controller;
          $this->_action = $_action;
     }

     /*
       设置变量
     */
      function assign($name, $value){
      	 $this->variables[$name] = $value;
      } 

      /**
      显示
      */
      function render(){

      	  extract($this->variables);
           
          $defaultHeader = APP_PATH.'/Home/views/header.php';
          $defaultFooter = APP_PATH.'/Home/views/footer.php';
      	  
          //页头文件
          if(file_exists($defaultHeader)){
             include $defaultHeader;
          }

          

          // 页脚文件
          if (file_exists($defaultFooter)) {
              include $defaultFooter;
          } 
          
       }


}


