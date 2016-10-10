<?php 
namespace Core\DB;

class Db{

    public static function factory($dbConfig='DB_CONFIG'){

    	   //根据参数选择加载不同的数据库配置
    	$dbType = strtolower(getConfig($dbConfig)['DB_TYPE']);

    	switch($dbType){
    		 case 'mysql':
    		      $className = 'Mysql';
    		      break;
    		 default:
    		      exit('Error:Database Type'); 
    	}
       
    	$className = '\Core\DB\\'.$className;
    	//echo $className;
    	return new $className($dbConfig);
    }

}



/*
class Db{

    public static function factor($dbConfigKey='DB_CONFIG'){

        //根据参数选择加载不同的数据库配置

        $dbType = strtolower(getConfig($dbConfigKey)['DB_TYPE']);

        switch($dbType){

            case 'mysql':

                $className = 'Mysql';

                break;

            default:

                exit('Error：Database Type');

        }

        $className = 'UniverseInvincibleFrameWork\DB\\'.$className;

        return new $className($dbConfigKey);

    }

}
*/