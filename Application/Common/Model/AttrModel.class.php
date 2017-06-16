<?php
namespace Common\Model;

class AttrModel extends \Think\Model\RelationModel
{
    protected $_validate = [
        //['user_name','require','用戶名必須'],
    ];
	
	protected $_link = [
		'attr_items' => self::HAS_MANY,
	];
	
	// 插入数据前的回调方法
    protected function _before_insert(&$data,$options) 
	{
		return $this -> checkattr();
	}
	
	protected function _after_insert($data,$options)
	{
		$this->saveItems($data['id']);
	}
	
	// 更新数据前的回调方法
    protected function _before_update(&$data,$options) {
		return $this -> checkattr();
	}
	
    // 更新成功后的回调方法
    protected function _after_update($data,$options) {
		$this->saveItems($data['id']);
	}
	
	protected function checkattr($attr_id=0)
	{
		// 添加规格选项
		$attr_values = I('attr_value');

		if(empty($attr_values)){
			$this -> error = '属性的选项不能为空';
			return false;
		}
		
		// 字符串转数组
		$attr = explode("\r\n",$attr_values);
		// 清除两边空格
		$attr = array_map('trim',$attr);
		// 删除相同的选项
		$attr = array_unique($attr);
		// 如果没有数据，则返回错误
		if(empty($attr)){
			$this -> error = '属性的选项不能为空';
			return false;
		}
		
		$this -> attr_items = $attr;
	}

	// 保存规格选项
	protected function saveItems($attr_id = 0)
	{
		// 找出原来存在的
		$old = M('attr_items') -> where(['attr_id'=>$attr_id]) -> getField('id,attr_value');
		
		
		if( ! empty($old)){
			// 需要删除的数据
			$new = array_diff($this -> attr_items,$old);
			// 需要新增的数据
			$del = array_diff($old,$this -> attr_items);
			if( ! empty($del)){
				// 删除需要删除的数据
				M('attr_items')->where(['attr_value'=>['in',$del]])->delete();
			}
		}else{
			// 默认新增的数据为新提交的数据
			$new = $this->attr_items;
		}
		
		$attr_value = [];
		foreach($new as $value){
			$tmp = ['attr_value'=>$value];
			if( ! empty($attr_id)){
				$tmp['attr_id'] =  $attr_id;
			}
			$attr_value[] = $tmp;
		}

		M('attr_items')->addAll($attr_value);
	}
}