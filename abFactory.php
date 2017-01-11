<?php 
/*
    get_called_class  php 5.3
    通过get_called_class 获取调用类名称，基于类中的静态化实例
    优点:
        $user  = new User;
        $userinfo = $user->userInfo();
    现在：
        $userinfo = User::Instance()->userInfo();
*/


/*
  class Base
  静态化--实例化工厂类
  Base.php
*/

abstract class Base{
   
      static protected $instance;

      public static function Instance(){
      	   $class = get_called_class();
      	   if(empty(self::$instance[$class])){
      	   	      self::$instance[$class] = new $class();
      	   }
      	   return self::$instance[$class];
      }

}


/*
  服务类
*/
 class User extends Base{

       protected $user = "ysp";

       public static function Instance(){
       	    return parent::Instance();
       }

       public function userInfo(){
       	   return $this->user;
       }

 } 

echo User::Instance()->userinfo();














?>