<?php
namespace Core\DB;

class Model implements DbInterface {
	
	protected $dbConfig = null;

    private $_db = null;

    private function _getInstance(){
    	if(is_null($this->_db)){
    		  if(is_null($this->dbConfig)){
    		  	  $this->_db = DB::factory();
    		  }else{
    		  	  $this->_db = DB::factory($this->dbConfig);
    		  }
    	}
    	return $this->_db;
    }


    public function close(){
    	$this->_getInstance()->close();
    }


    public function query($sql){
    	  return $this->_getInstance()->query($sql);
    }

    public function fetchAssoc($resource){
    	  return $this->_getInstance()->fetchAssoc($resource);
    }

    public function select($sql){
          return $this->_getInstance()->select($sql);
    }

   
}

/*
class Model implements DbInterface {


    protected $dbConfigKey = null;


    private $_db = null;


    private function _getInstance(){

        if(is_null($this->_db)){

            if(is_null($this->dbConfigKey)){

                $this->_db = DB::factor();

            }else{

                $this->_db = DB::factor($this->dbConfigKey);

            }

        }

        return $this->_db;

    }


    public function close(){

        $this->_getInstance()->close();

    }



    public function query($sql){

        return $this->_getInstance()->query($sql);

    }


    public function fetchAssoc($resource){

        return $this->_getInstance()->fetchAssoc($resource);

    }


    public function select($sql){

        return $this->_getInstance()->select($sql);

    }

}
*/