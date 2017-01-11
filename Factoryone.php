<?php 
abstract class Base{

      protected static $obj;

      public static function getInstance(){
           $class = get_called_class();
           /*if(!(self::$obj instanceof self)){
           	    self::$obj = new $class();
           }                
           return self::$obj;*/
           if(empty(self::$obj[$class])){
           	     self::$obj[$class] = new $class();
           }
           return self::$obj[$class];
      }

      //abstract 抽象方法所有子类必须实现该方法
      public abstract function getVal();

      
}

class User extends Base{

    public function talk(){
    	 return "我要说话";
    }

}


class Message extends Base{
   
     public function push(){
     	  return "消息发送";
     }

}

$user = new User();
$msg = new Message();

echo $user::getInstance()->talk();
echo $msg::getInstance()->push();
?>