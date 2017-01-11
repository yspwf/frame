<?php
/*
工厂方法模式
*/
interface people{
       function go();
}


class man implements people{
	   function go(){
	   	   echo "走路";
	   }
}


interface createObj{
	  function createObj();
}

class Factory implements createObj{
	  function createObj(){
	  	  return new man();
	  }
}

class test{

	  public function my(){
	  	  $fac = new Factory();
	  	  $man = $fac->createObj();
	  	  $man->go();
	  }
}

$test=new test();
$test->my();
?>