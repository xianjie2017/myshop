<?php
namespace Admin\Widget;

class AdminWidget extends \Think\Controller
{
	public function menu()
	{
		$this->display('Layout/menu');
	}
	
	public function top()
	{
		$this->display('Layout/top');
	}
}