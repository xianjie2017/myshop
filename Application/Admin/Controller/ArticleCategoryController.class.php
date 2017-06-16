<?php
namespace Admin\Controller;

class ArticleCategoryController extends \Common\Controller\BaseController
{
	protected function _init()
	{
		$this -> assign('page_title','文章分类管理');
	}
	
	protected function _add()
	{
		// 找出上级分类
		$this -> getParent();
	}
	
	protected function _edit()
	{
		// 找出上级分类 并把自己的 去除
		$this -> getParent(['id' => ['neq',I('id')]]);
	}
	
	protected function getParent($where = [])
	{
		// 找出上级分类 并把自己的 去除
		$parent = D($this -> doModelName) -> where($where) -> field('id,cate_name,pid') -> select();
		$this -> assign('parent',list_to_tree($parent));
	}
}