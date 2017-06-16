<?php
namespace Admin\Controller;

class IndexController extends \Common\Controller\BaseController 
{
    public function index() {
		$this->assign('page_title','欢迎页面');
        return $this->display();
    }
}
