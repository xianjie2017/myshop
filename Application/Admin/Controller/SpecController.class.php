<?php
namespace Admin\Controller;

class SpecController extends \Common\Controller\BaseController
{
	protected function _init()
	{
		$this -> assign('page_title','规格管理');
	}
	
	public function _before_index()
	{
		$this->relation = ['SpecItems'];
	}
	
	protected function _edit($param)
	{
		$specItems = $param['model']->relationGet('SpecItems');
		
		$items = [];
		foreach($specItems as $key => $value){
			$items[] = $value['spec_value'];
		}
		
		$this -> assign('items',implode("\r\n",$items));
	}
}