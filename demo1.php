<?php 
class subject implements SplSubject{

      protected $observers,$value;

      public function __construct(){
      	 $this->observers = array();
      }

      public function attach(SplObserver $observer){
         $this->observers[] =$observer;
      }

      public function detach(SplObserver $observer){
      	 if($idx = array_search($observer, $this->observers,true)){
      	 	 unset($this->observers[$idx]);
      	 }
      }

      public function notify(){
      	  foreach($this->observers as $observer){
      	  	  $observer->update($this);
      	  }
      }

      public function setValue($value){
      	  $this->value = $value;
      	  $this->notify();
      }
      
      public function getValue(){
      	   return $this->value;
      }
}


class observer implements SplObserver{

      public function update(SplSubject $subject){
      	  echo "这是观察者".$subject->getValue();;
      }

}

$subject = new subject();
$observer = new observer();

$subject->attach($observer);
$subject->setValue(555);



