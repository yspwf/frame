<?php 
/*
单例模式
*/
class single{

     protected static $conn;

     public static function getInstance(){

            if(!(self::$conn instanceof self)){
            	   self::$conn = new self();
            }
            return self::$conn;
     }

     //阻止用户复制对象实例
     private function __clone(){
     	  trigger_error("对象不允许复制");
     }

     public function talk(){
     	 return "说话";
     }

}

$obj = new single();
echo $obj::getInstance()->talk();





?>