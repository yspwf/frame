<?php 

/*
适配器
*/

abstract class Toy{

	  public abstract function openMouth();

	  public abstract function closeMouth();

}

class Dog extends Toy{

	 public function openMouth(){
	 	  echo "Dog open Mouth\n";
	 }

	 public function closeMouth(){
	 	  echo "Dog close Mouth\n";
	 }
}

class Cat extends Toy{
    
    public function openMouth()  
    {  
        echo "Cat open Mouth\n";  
    }  

    public function closeMouth(){
    	echo "Cat close Mouth\n";
    }

}

//定义接口A
interface RedTarget{
	  public function doMouthOpen();

}

//定义接口B
interface GreenTarget{
	  public function operateMouth($type=0);
}

//类适配器角色A
class RedAdapter implements RedTarget{
	  private $adapter;

	  function __construct(Toy $adaptee){
	  	     var_dump($adaptee);
             $this->adapter = $adaptee;
	  }

	  public function doMouthOpen(){
	  	     $this->adapter->openMouth();
	  }
}


class Diver{

	 public function run(){
	 	  $adapter_dog = new Dog();
	 	  //$adapter_dog->openMouth();
	 	  $adapter_red = new RedAdapter($adapter_dog);
          $adapter_red->doMouthOpen();
        

	 	  $adapter_cat = new Cat();
	 	  $adapter_cat->openMouth();
	 }

}

$obj = new Diver();
$obj->run();



?>