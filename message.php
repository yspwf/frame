<?php 
/*
 设计模式练习
 1、数据库连接 (单列模式)
 2、调用接口实现留言板功能 (工厂模式)
 3、实现分级举报处理功能（责任链模式）
 4、发送不同组合的举报信息（桥接模式）
 5、发送不同格式的举报信息（适配器模式）
 6、在投诉内容后自动追加时间（装饰器模式）
 7、根据会员登录信息改变现实风格（观察者模式）
 8、根据发帖长度加经验值（策略模式）
*/

interface DB{

     function conn();

}

/**
  单列模式
*/
class MysqlSingle implements DB{

	  protected static $instance;

	  public function __construct(){}

	  public static function getInstance(){
	  	 if(!self::$instance instanceof self){
	  	 	   self::$instance = new self();
	  	 }
	  	 return self::$instance;
	  }

	  public function __clone(){

	  }

	  public function conn(){
            echo "链接成功！";
	  }
}


/*
  工厂模式
*/
interface Factory{
	function createDB();
}  

class MysqlFactory implements Factory{
	function createDB(){
		  echo "mysql工厂创建成功！";
		  return MysqlSingle::getInstance();
	}
}

/*
  根据用户名显示不同的风格
  观察者模式
*/
 class Observer implements SplSubject{

        protected $_observer = null;
        public $_style = null;

        public function __construct($style){
        	$this->_style = $style;
        	$this->_observer = new SplObjectStorage();
        }

        public function attach(SplObserver $observer){
        	   $this->_observer->attach($observer);
        }

        public function detach(SplObserver $observer){
        	   $this->_observer->detach($observer);
        }

        public function notify(){
        	/*
        	$this->_observers->rewind();
		    while ($this->_observers->valid()) {
		      $observer = $this->_observers->current();
		      $observer->update($this);
		      $this->_observers->next();
		    }
		    */
            
            foreach ($this->_observer as $observer) {
            	$observer->update($this);
            }

        }

        public function show(){
        	  $this->notify();
        }

 } 


 class StyleA implements SplObserver{

      public function update(SplSubject $subject){
      	  echo $subject->_style."模块A";
      }

 }

 class StyleB implements SplObserver{
       public function update(SplSubject $subject){
           echo $subject->_style."模块B";
       }
 }


/*
  根据不同的方式进行投诉
  桥接模式
*/
class Brige{
	 protected $_obj=null;

	 public function __construct($obj){
	 	 $this->_obj = $obj;
	 }

	 public function msg(){}

	 public function show(){
	 	  $msg = $this->msg();
	 	  $this->_obj->msg();
	 }
}  


class BrigeEmail extends Brige{
	  public function msg(){
	  	  echo "Email >>";
	  }
}

class BrigeSms extends Brige{
	  public function msg(){
	  	  echo "Sms >>";
	  }
}

class Normal{
	  public function msg(){
	  	  echo "Normal >><br/>";
	  }
}

class Danger{
	  public function msg(){
	  	  echo "Danger >> <br/>";
	  }
}

$normal = new Normal();
$brige = new Brige($normal);
$brige->show();

$obser = new StyleA();
$observer = new observer('A');
$observer->attach($obser);
$observer->show();






$obj = new MysqlFactory();
$obj->createDB()->conn();










































?>