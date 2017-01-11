<?php 
/*
装饰模式： 顾名思义，装饰模式是一种对对象数据的多次过滤，就像装饰一样， 一层层的修饰， 获取满意的结果。
装饰模式共分为两个部分：
1： 装饰者： 在这个接口接口下面的类和方法用以对数据进行修饰（即对数据进行过滤修改）
2： 被装饰者： 这个就是要被过滤的数据接口对象

情景：炒菜之前要对买来的菜进行拣菜， 洗菜等操作。这个就类似于装饰操作， 装饰者就是洗净的过程操作， 被装饰者就是菜。
*/


//装饰者
abstract class Decorator{
	   //装饰操作
	   abstract function process(Cai $cai);
}

class xicai extends Decorator{
	   public function process(Cai $cai){
	   	   echo "这个是洗菜操作。<br/>";
	   }
}


//被装饰者
abstract class Cai{
	 abstract function getGanJingZhi();
}

//青菜
class QingCai extends Cai{
	  public function getGanJingZhi(){
	  	  return 2;
	  }
}

class BaiCai extends Cai{
	public function getGanJingZhi(){
		 return 3;
	}
}


//让已经装饰的装饰者再进行新的装饰，表示多步过滤
abstract class DecorateActor extends Decorator{
	  protected $decorator;

	  public function __construct(){
	  	  $this->decorator = $id;
	  }

	  public function process(Cai $cai){
	  	  $this->decorator->process($cai);
	  }
}


//拣菜操作
class JianCai extends DecorateActor{
	  public function process(Cai $cai){
	  	  echo '这个是剪裁操作 <br/>';
	  	  parent::process($cai); //进行下一步操作
	  }
}


//泡菜操作
class PaoCai extends DecorateActor{
	  public function process(Cai $cai){
	  	   echo "这个是泡菜操作";
	  	   parent::process($cai);  //进行下一步过滤
	  }
}


$cai = new QingCai();
$process = new JingCai(new PaoCai(new xicai($cai)));
$process->process($cai);

?>







































