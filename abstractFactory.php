<?php 
/*
抽象工厂模式
*/
interface people{
	 function listen();
}


class Iman implements people{
	 function listen(){
	 	   echo "我在听";
	 }
}

class Oman implements people{
	 function listen(){
	 	   echo "我没在听";
	 }
}

interface createObj{
     function Iobj();
     function Oobj();
}


class man implements createObj{

	  function Iobj(){
	  	  return new Iman();
	  }

	  function Oobj(){
	  	  return new Oman();
	  }
}

class test{

       function my(){
       	   $man = new man();
       	   $iman = $man->Iobj();
       	   $iman->listen();

       	   $oman = $man->Oobj();
       	   $oman->listen();
       }

}

$test = new test();
$test->my();

?>