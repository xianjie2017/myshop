<?php
namespace Admin\Controller;

class BrandController extends \Common\Controller\BaseController
{
	protected function _init()
	{
		$this -> assign('page_title','品牌管理');
	}
}