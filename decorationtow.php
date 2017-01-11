<?php 
/*
观察者模式消息推送
*/
//观察者
interface IObserver{
	 public function notify();
}

//定义可以被观察的对象接口
interface IObservabel{
	  public function addObserver($observer);
}


//实现IObservable 接口
class MessageSystem implements IObservabel{
	   private $_observers = array();

	   public function addObserver($observer){
              $this->_observers[] = $observer;
	   }

	   public function doNotify(){
	   	  foreach($this->_observers as $o){
               
	   	  	   $o->notify();
	   	  }
	   }
}

//实现IObserver接口
class User implements IObserver{

        public function __construct($username){
                echo "我是新用户 {$username} <br/>";
        }

        //通知观察者方法
        public function notify(){
        	  echo "欢迎新用户！";
        }

}


$sys = new MessageSystem();
$sys->addObserver(new User('iii'));
$sys->addObserver(new User('ysp'));
$sys->addObserver(new User('oooo'));
$sys->doNotify();





































?>