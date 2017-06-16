<?php
if(!function_exists('get_cate_tree')){
	/**
	 * 获取数组的排列组合 
	 * @param array cateArr 需要组合的数组
	 * @return array
	 */
	function get_array_group($arr)
	{
		$group = [];
			
		foreach($arr as $value){
			if(empty($group)){
				foreach($value as $val){
					$group[] = [$val];
				}
			}else{
				$tmp = [];
				foreach($group as $g){
					foreach($value as $val){
						$g[] = $val;
						$tmp[] = $g;
						// 删除最后一项
						array_pop($g);
					}
				}
				
				$group = $tmp;
			}
		}
		
		return $group;
	}
}

if(!function_exists('get_cate_tree')){
	/**
	 * 说明:查找分类树
	 * @param array $array 需要操作的数组
	 * @param int $root 开始操作的位置
	 * @param int $pk 使用的主键
	 * @param int $parent 关联父级主键的值
	 * @return array
	 */
	function list_to_tree(array $array , $root = 0 , $pk = 'id' , $parent = 'pid' ) {
		$tree = [];
		$task = [$root];
		
		while( ! empty($task)){
			// 默认是没有找到子类
			$status = false;
			
			foreach($array as $key => $value){
				if($value[$parent] == end($task)){
					$value['level'] = count($task);
					$task[] = $value[$pk];
					$tree[] = $value;
					unset($array[$key]);
					$status = true;
				}
			}
			
			// 没有找到子类的时候，把任务删掉
			if($status === false){
				array_pop($task);
			}
		}
		
		return $tree;
	}
}
