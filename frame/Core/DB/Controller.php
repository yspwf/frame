<?php 
namespace Core\DB;
use Core\DB\View;
class Controller{

    protected $_controller;

    protected $_action;

    protected $_view;


    //构造函数，初始化属性，并实例化对应的模型
    function __construct($_controller, $_action){
         $this->_controller = $_controller;
         $this->_action = $_action; 
    	 $this->_view= new View($_controller, $_action); 
    }


    //分配变量
    function assign($name, $value){
          $this->_view->assign($name, $value);
    }


   //渲染视图
    function display(){
         $this->_view->render();
    }


}
