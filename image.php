<?php 
/*
工厂模式实现解析图片
*/
interface Image{
	 function getHeight();

	 function getWidth();

	 function getData();
}


class Image_png implements Image{

    private $_width,$_height;$_data;

    public function __construct($file){
    	$this->_file = $file;
    	$this->_parse();
    }


    private function _parse(){
    	//完成png格式解析工作
    	//并填充参数
    }

    public function getWidth(){
    	 return $this->_width;
    }

    public function getHeight(){
    	 return $this->_height;
    }

    public function getData(){
    	 return $this->_data;
    }

}

?>
























