<?php 
/*
  3.1php设计模式-观察者模式 
  * 3.1.1概念:其实观察者模式这是一种较为容易去理解的一种模式吧，它是一种事件系统，意味 
  *          着这一模式允许某个类观察另一个类的状态，当被观察的类状态发生改变的时候， 
  *          观察类可以收到通知并且做出相应的动作;观察者模式为您提供了避免组件之间
  *          紧密耦合的另一种方法
  * 3.1.2关键点:
  *        1.被观察者->追加观察者;->一处观察者;->满足条件时通知观察者;->观察条件
  *        2.观察者 ->接受观察方法
  * 3.1.3缺点:
  * 3.1.4观察者模式在PHP中的应用场合:在web开发中观察者应用的方面很多
  *        典型的:用户注册(验证邮件，用户信息激活)，购物网站下单时邮件/短信通知等
  * 3.1.5php内部的支持
  *        SplSubject 接口，它代表着被观察的对象，
  *        其结构：
  *        interface SplSubject
  *        {
  *            public function attach(SplObserver $observer);
  *            public function detach(SplObserver $observer);
  *            public function notify();
  *        }
  *        SplObserver 接口，它代表着充当观察者的对象，
  *        其结构：
  *        interface SplObserver
  *        {  
  *            public function update(SplSubject $subject);
  *        }
  用户登录--诠释观察者模式
*/

class User implements SplSubject{

	//注册观察者
	public $observer = array();

	//动作类型
	const OBSERVER_TYPE_REGISTER = 1; //注册
	const OBSERVER_TYPE_EDIT = 2; //编辑

	/*
      追加观察者
	*/
    public function attach(SplObserver $observer,$type){
    	  $this->observer[$type][] = $observer;
    }  

    /**
    去除观察者
    */
    public function detach(SplObserver $observer,$type){
    	   // if($idx = array_search($observer, $this->observer[$type],true)){
    	    //	unset($this->observer[$type][$idx]);
    	    //}
    }

    /**
    *满足条件时通知观察者
    */
    public function notify($type){
    	//  if(!empty($this->observer[$type])){
    	  //	   foreach($this->observer[$type] as $observer){
    	  	//   	     $observer->update($this);
    	  	//   }
    	 // }
    }

    
    /**
    *添加用户
    $username 用户名
    $password 密码
    $email    邮箱
    */
    public function addUser(){
    	//执行sql

    	//数据库插入成功
    	//$res = true;

    	//调用通知观察者
    	//$this->notify(self::OBSERVER_TYPE_REGISTER);
    	//return $res;
    }


    /**
    *用户信息编辑
    $username 用户名
    $password 密码
    $email    邮箱
    */
    public function editUser(){
    	  //执行sql

    	  //数据库插入成功
    	  //$res = true;

    	  //调用通知观察者
    	  //$this->notify(self::OBSERVER_TYPE_EDIT);
    	  //return $res; 
    }
     


}  

/***
观察者-发送邮件
*/
class Send_Mail implements SplObserver{

     /**
     *相应被观察者的变更信息
     */
     public function update(SplSubject $subject){
     	 $this->sendMail($subject->email,$title,$content);
     }

     /**
     *发送邮件
     $email 邮箱地址
     $title 邮件标题
     $content 邮件内容
     */
     public function sendEmail($email, $title, $content){
     	  //调用邮件接口，发送邮件
     	  echo "发送邮件";
     }



}


$user = new User();


$email = new Send_Mail();

$user->attach($email, $user::OBSERVER_TYPE_EDIT);




?>