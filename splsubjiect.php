<?php 

class User implements SplSubject { 

    private $email; 
    private $username; 
    private $mobile; 
    private $password; 
    /** 
     * @var SplObjectStorage 
     */ 
    private $observers = NULL; 

    public function __construct($email, $username, $mobile, $password) { 
        $this->email = $email; 
        $this->username = $username; 
        $this->mobile = $mobile; 
        $this->password = $password; 

        $this->observers = new SplObjectStorage(); 
    } 

    public function attach(SplObserver $observer) { 
        $this->observers->attach($observer); 
    } 

    public function detach(SplObserver $observer) { 
        $this->observers->detach($observer);
    } 

    public function notify() { 
        $userInfo = array( 
            'username' => $this->username, 
            'password' => $this->password, 
            'email' => $this->email, 
            'mobile' => $this->mobile, 
        ); 
        foreach ($this->observers as $observer) { 
            $observer->update($this, $userInfo); 
        } 
    } 

    public function create() { 
        echo __METHOD__, PHP_EOL; 
        $this->notify(); 
    } 

    public function changePassword($newPassword) { 
        echo __METHOD__, PHP_EOL; 
        $this->password = $newPassword; 
        $this->notify(); 
    } 

    public function resetPassword() { 
        echo __METHOD__, PHP_EOL; 
        $this->password = mt_rand(100000, 999999); 
        $this->notify(); 
    } 

 }



 class EmailSender implements SplObserver { 

    public function update(SplSubject $subject) { 
        if (func_num_args() === 2) { 
            $userInfo = func_get_arg(1); 
            echo "向 {$userInfo['email']} 发送电子邮件成功。内容是：你好 {$userInfo['username']}" . 
            "你的新密码是 {$userInfo['password']}，请妥善保管", PHP_EOL; 
        } 
    } 

 }


 $email_sender = new EmailSender(); 
 //$mobile_sender = new MobileSender(); 
 //$web_sender = new WebsiteSender(); 

 $user = new User('user1@domain.com', '张三', '13610002000', '123456'); 

 // 创建用户时通过 Email 和手机短信通知用户
 $user->attach($email_sender); 
 //$user->attach($mobile_sender); 
 $user->create($user); 
 echo PHP_EOL; 

 // 用户忘记密码后重置密码，还需要通过站内小纸条通知用户
 //$user->attach($web_sender); 
 //$user->resetPassword(); 
 //echo PHP_EOL; 

 // 用户变更了密码，但是不要给他的手机发短信
 //$user->detach($mobile_sender); 
 //$user->changePassword('654321'); 
 //echo PHP_EOL;

