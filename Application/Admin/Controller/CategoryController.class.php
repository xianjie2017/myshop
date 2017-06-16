<?php
namespace Admin\Controller;

class CategoryController extends \Common\Controller\BaseController
{
	protected $doModelName = 'GoodsCategory';
	protected $listRows = 100;
	
	protected function _init()
	{
		$this -> assign('page_title','分类管理');
	}
	
	// 对列表处理
	protected function _list($param)
	{
		return list_to_tree($param['list']);
	}
	
	protected function _add()
	{
		// 找出上级分类
		$parent = D($this -> doModelName) -> field('id,cate_name,pid') -> select();
		$this -> assign('parent',list_to_tree($parent));
	}
	
	protected function _edit()
	{
		// 找出上级分类 并把自己的 去除
		$parent = D($this -> doModelName) -> where(['id' => ['neq',I('id')]]) -> field('id,cate_name,pid') -> select();
		$this -> assign('parent',list_to_tree($parent));
	}
}
