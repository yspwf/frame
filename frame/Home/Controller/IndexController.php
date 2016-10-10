<?php 
namespace Home\Controller;

use Core\DB\Controller;


class IndexController extends Controller{

   public function index(){
     	echo "333";
   }

   public function test(){
   	
   	 $this->assign('name','ysp');
     $this->display();
   }

}
