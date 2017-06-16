<?php
namespace Common\Model;

class SpecModel extends \Think\Model\RelationModel
{
    protected $_validate = [
        //['user_name','require','用戶名必須'],
    ];
	
	protected $_link = [
		'SpecItems' => [
			'mapping_type' => self::HAS_MANY,
			'foreign_key' => 'spec_id',
			'class_name' => 'spec_items',
			// 'condition' => '',
		],
	];
	
	// 插入数据前的回调方法
    protected function _before_insert(&$data,$options) 
	{
		return $this -> checkSpec();
	}
	
	protected function _after_insert($data,$options)
	{
		$this->saveItems($data['id']);
	}
	
	// 更新数据前的回调方法
    protected function _before_update(&$data,$options) {
		return $this -> checkSpec();
	}
	
    // 更新成功后的回调方法
    protected function _after_update($data,$options) {
		$this->saveItems($data['id']);
	}
	
	protected function checkSpec($spec_id=0)
	{
		// 添加规格选项
		$spec_values = I('spec_value');

		if(empty($spec_values)){
			$this -> error = '规格的名称不能为空';
			return false;
		}
		
		// 字符串转数组
		$spec = explode("\r\n",$spec_values);
		// 清除两边空格
		$spec = array_map('trim',$spec);
		// 删除相同的选项
		$spec = array_unique($spec);
		// 如果没有数据，则返回错误
		if(empty($spec)){
			$this -> error = '规格的名称不能为空';
			return false;
		}
		
		$this -> spec_items = $spec;
	}

	// 保存规格选项
	protected function saveItems($spec_id = 0)
	{
		// 找出原来存在的
		$old = M('spec_items') -> where(['spec_id'=>$spec_id]) -> getField('id,spec_value');
		
		
		if( ! empty($old)){
			// 需要删除的数据
			$new = array_diff($this -> spec_items,$old);
			// 需要新增的数据
			$del = array_diff($old,$this -> spec_items);
			if( ! empty($del)){
				// 删除需要删除的数据
				M('spec_items')->where(['spec_value'=>['in',$del]])->delete();
			}
		}else{
			// 默认新增的数据为新提交的数据
			$new = $this->spec_items;
		}
		
		$spec_value = [];
		foreach($new as $value){
			$tmp = ['spec_value'=>$value];
			if( ! empty($spec_id)){
				$tmp['spec_id'] =  $spec_id;
			}
			$spec_value[] = $tmp;
		}

		M('spec_items')->addAll($spec_value);
	}
}