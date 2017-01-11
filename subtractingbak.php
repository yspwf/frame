<?php 

abstract class operation{
       abstract function getVal($num1, $num2);
}


class operationAdd extends operation{
	    public function getVal($num1, $num2){
	    	  return $num1+$num2;
	    }
}


class Factory{


         public static function obj(){
         	   return new operationAdd();
         } 

}

$obj = Factory::obj();
echo $obj->getVal(23,1);


?>