<?php 
/*
简单工厂模式
*/
interface  people{
	  

	  function talk();
}


class man implements people{
    
      public function talk(){
      	  echo "说话";
      }

}

class Factory{
	  public static function opretion(){
	  	   return new man();
	  }
}


$obj = Factory::opretion();
$obj->talk();







?>