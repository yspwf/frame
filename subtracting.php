<?php

interface operation{
      function getVal($num1, $num2);
}


class operationAdd implements operation{
	  public function getVal($num1, $num2){
             return $num1+$num2;
	  }
}

/*
减法类
*/
class operationSub implements operation{
	  public function getVal($num1,$num2){
	  	 return $num1-$num2;
	  } 
}

class operationMul implements operation{
	  public function getVal($num1,$num2){
	  	 return $num1*$num2;
	  }
}

class operationDiv implements operation{
	  public function getVal($num1,$num2){
          try{
          	 if($num2==0){
          	 	  throw new Exception("除数不能为0");
          	 }else{
          	 	   return $num1/$num2;
          	 }
          }catch(Exception $e){
          	  echo "错误：".$e->getMessage();
          }
	  }
}

class operationRem implements operation{
	   public function getVal($num1, $num2){
	   	   try{
	   	   	   if($num2==0){
	   	   	   	   throw new Exception('除数不能为0');
	   	   	   }else{
	   	   	   	   return $num1%$num2;
	   	   	   }
	   	   }catch(Exception $e){
	   	   	    echo "错误:".$e->getMessage();
	   	   }
	   }
}


class Factory{

       public static function obj($operate){

       	   switch ($operate) {
       	   	case '+':
       	   		return new operationAdd();
       	   		break;
       	   	case '-':
       	   		return new operationSub();
       	   		break;
       	   	case '*':
       	   		return new operationMul();
       	   		break;
       	   	case '/':
       	   		return new operationDiv();
       	   		break;
       	   	default:
       	   		# code...
       	   		break;
       	   }

       } 

}

$obj = Factory::obj('/');

echo $obj->getVal(12,2);

?>