<?php 
namespace Core\DB;

Interface DbInterface{

     public function close();

     public function query($sql);

     public function fetchAssoc($resource);

     public function select($sql); 

}

/*
Interface DbInterface{


    public function close();


    public function query($sql);


    public function fetchAssoc($resource);


    public function select($sql);

}
*/