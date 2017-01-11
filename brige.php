<?php 
/**
 * 【桥接模式(针对 二维模型)】
 * 对于多维度需要处理的事情，多耦合
 * 第一维度，发送信息的类型：站内信、email、手机短信
 * 第二维度，发送信息的紧急程度：普通、加急、特级
 * （说明）桥接模式只需要 A+B种类，但是常规的需要 A*B种类；
 *            维度越多，各维度下的分类越多，桥接模式越有优势！
 * 
 */

/*
  抽象信息类
*/
abstract class Msg{
	 protected $send = null;  //发送器

     public function __construct($send){
     	 $this->send = $send;
     }
     
     
     abstract public function msg($content);  //信息的紧急程度

     public function send($to,$content){
     	//对 $content 进行加工
     	$content = $this->msg($content);
     	//执行发送
     	$this->send->sendmsg($to,$content);
     }
     

}

/*
  按照信息类型 划分三类
*/

 class Web{  //站内信
     public function sendmsg($to,$content){
     	 echo "站内信发给 $to  内容 $content";
     }
 } 

 class Email{  //email邮件
     public function sendmsg($to,$content){
     	  echo "邮件发给 $to 内容 $content";
     }
 }

 class Sms{   //手机短信
      public function sendmsg($to,$content){
      	  echo "手机短信发给 $to 内容 $content";
      }
 }


class PtMsg extends Msg{  //普通
	   public function msg($content){
            return "这是测试站内信";
	   }
}


$pt_msg = new PtMsg(new Web());
$pt_msg->send("ysp","工作来了");

?>