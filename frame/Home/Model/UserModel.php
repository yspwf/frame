<?php
namespace Home\Model;

use Core\DB\Model;

class UserModel extends Model{

	public  function getVersion(){
		 return $this->select('select * from user');
          
	} 




}

