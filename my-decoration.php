<?php 
/*
  用户类
*/
class User{

	//用户的唯一标识
	private $_userId;

	//用户初始化是需要指定ID
	public function __construct($userId){
         $this->_userId = $userId;
	} 

    //获取用户ID
    public function getUserId(){
    	 return $this->_userId;
    }

    //展示推送过来的消息
    public function showMessage($msg){
    	  echo "Message: $msg".PHP_EOL;
    }

}


/*
消息类
*/
class Message{

	 //数组存储需要推送消息的用户
	 protected $user = array();

     //推送消息给用户
	 public function push(User $user,String $msg){
	 	   $user->showMessage($msg);
	 }

	 //将消息推送给所有的用户
	 public function pushAll($msg){
	 	   foreach($this->user as $user){
	 	   	   $this->push($user, $msg);
	 	   }
	 }

	 //添加用户
	 public function addUser(User $user){
            $this->user[$user->getUserId()] = $user;
	 }
     

     //删除用户
     public function delUser($userId){
     	unset($this->user[$userId]);
     }

     //清除用户
     public function clearUser(){
     	   $this->user = array();
     }

}

$user1 = new User(1);
$user2 = new User(2);
$user3 = new User(3);
$msg = new Message();
$msg->addUser($user1);
$msg->addUser($user2);
$msg->addUser($user3);
$msg->pushAll('测试消息！');



?>