<?php
namespace Admin\Controller;

class AttrController extends \Common\Controller\BaseController
{
	protected function _init()
	{
		$this -> assign('page_title','属性管理');
	}
	
	public function _before_index()
	{
		$this->relation = true;
	}
	
	protected function _edit($param)
	{
		
		
		$attrItems = $param['model']->relationGet('attr_items');
		
		$items = [];
		foreach($attrItems as $key => $value){
			$items[] = $value['attr_value'];
		}
		
		$this -> assign('items',implode("\r\n",$items));
	}
}