<?php 
/*
  观察者模式
*/
class Pager{

     private $_observers=array();

     public function register($sub){   //注册观察者
     	   $this->_observers[]=$sub;
     }

     public function trigger(){  //外部统一访问
          if(!empty($this->_observers)){
          	  foreach ($this->_observers as $observer) {
          	  	  $observer->update();
          	  }
          }
     }

}  

/**
   观察者要实现接口
*/
interface Observerable{
	  public function update();
}

class Subscriber implements Observerable{
	  public function update(){
	  	  echo "Callback  \n";
	  }
}

class Subscriber1 implements Observerable{
	  public function update(){
	  	  echo "Callback111111111  \n";
	  }
}

$pager = new Pager();
$pager->register(new Subscriber());
$pager->register(new Subscriber1());
$pager->trigger();





?>