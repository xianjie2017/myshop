<?php
namespace Common\Model;

class BrandModel extends \Think\Model
{
    protected $_validate = [
        //['user_name','require','用戶名必須'],
    ];
	
	// 更新前置操作
	protected function _before_update(&$data,$options) 
	{
		if( ! isset($data['logo'])){
			$data['logo'] = '';
		}
	}
}