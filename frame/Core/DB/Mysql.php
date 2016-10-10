<?php 
namespace Core\DB;

class Mysql implements DbInterface{

     private $_conn = null;

     public function __construct($dbConfig){
     	  if(is_null($this->_conn)){
     	  	  $this->_connect($dbConfig);
     	  }
     }
   
     private function _connect($dbConfig='DB_CONFIG'){
          $db = getConfig($dbConfig);
          $this->_conn = mysqli_connect($db['DB_HOST'],$db['DB_USERNAME'],$db['DB_PASSWORD'],$db['DB_NAME'],$db['DB_PORT']);
     }

    public function close(){
    	 mysqli_close($this->_getInstance());
    }

    public function query($sql){
    	$result = mysqli_query($this->_conn, $sql);
    	return $result;
    }


   public function fetchAssoc($resource){
   	   $rowList = array();
   	   while($row = mysqli_fetch_assoc($resource)){
   	   	   $rowList[] = $row;
   	   }
   	   return $rowList;
   }


   public function select($sql){
       $result = $this->query($sql);
       $rowList = $this->fetchAssoc($result);
       return $rowList;
   }

}

/*
class Mysql implements DbInterface{


    private $_conn = null;


    public function __construct($dbConfigKey='DB_CONFIG'){

        if(is_null($this->_conn)){

            $this->_connect($dbConfigKey);

        }

    }


    private function _connect($dbConfigKey='DB_CONFIG'){

        $dbConfig = getConfig($dbConfigKey);

        $this->_conn = mysqli_connect($dbConfig['DB_HOST'], $dbConfig['DB_USERNAME'], $dbConfig['DB_PASSWORD'], $dbConfig['DB_NAME'], $dbConfig['DB_PORT']);

    }


    public function close(){

        mysqli_close($this->_getInstance());

    }


    public function query($sql){

        $result = mysqli_query($this->_conn, $sql);

        return $result;

    }


    public function fetchAssoc($resource){

        $rowList = array();

        while($row = mysqli_fetch_assoc($resource)){

            $rowList[] = $row;

        }

        return $rowList;

    }


    public function select($sql){

        $result = $this->query($sql);

        $rowList = $this->fetchAssoc($result);

        return $rowList;

    }

}
*/