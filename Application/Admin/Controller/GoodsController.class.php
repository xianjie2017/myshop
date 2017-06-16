<?php
namespace Admin\Controller;
class GoodsController extends \Common\Controller\BaseController
{
	protected $relation = true;

	public function _before_index()
	{
		$this -> assign('page_title','商品管理');
	}
	
	// 列表
	protected function _list($param)
	{
		// 开启关联查询
		$this -> relation = true;
	}

	protected function _doSubmit($param)
	{
		// 是否更新数据
		$is_update = empty(I($param['model'] -> getPk(),0)) ? false : true;
		
		if($is_update){
			$goods_id = I($param['model'] -> getPk(),0);
		}else{
			$goods_id = $param['result']['goods_id'];
		}
		
		// 商品详情
		$desc = [
			'goods_id' => $goods_id,
			'content'  => I('content',''),
		];
		if( ! $is_update){
			M('goods_desc') -> add($desc);
		}else{
			M('goods_desc') -> save($desc);
		}
		
		// 相册
		$path = I('path',[]);
		if( ! empty($path)){
			$img = [];
			foreach($path as $value){
				$img[] = [
					'goods_id' => $goods_id,
					'path' => $value
				];
			}
			
			// 如果是更新先删除原来的规格
			if($is_update){
				M('goods_img') -> where(['goods_id'=>$goods_id]) -> delete();
			}
			
			M('goods_img') -> addAll($img);
		}
		
		// 商品规格
		$spec_price = I('spec_price',[]);
		$spec_stock = I('spec_stock',[]);
		$spec_sku   = I('spec_sku',[]);
		$spec_key_name   = I('spec_key_name',[]);
		if( ! empty($spec_price)){
			$sepc = [];
			foreach($spec_price as $key => $price){
				// 如果价格为0，则不加入套餐表
				if(empty(intval($price))){
					continue;
				}
				$sepc[] = [
					'goods_id' => $goods_id,
					'spec_price' => $price,
					'spec_key' => $key,
					'spec_key_name' => ! empty($spec_key_name[$key]) ? $spec_key_name[$key] : '',
					'spec_stock' => ! empty($spec_stock[$key]) ? intval($spec_stock[$key]) : 0,
					'spec_sku' => ! empty($spec_sku[$key]) ? $spec_sku[$key] : 'xianj-' . time(),
				];
			}
			
			// 如果是更新先删除原来的规格
			if($is_update){
				M('goods_spec') -> where(['goods_id'=>$goods_id]) -> delete();
			}
			
			M('goods_spec') -> addAll($sepc);
		}
		
		// 商品属性
		$attr_value = I('attr_value',[]);
		if( ! empty($attr_value)){
			$attr = [];
			foreach($attr_value as $key => $value){
				$attr[] = [
					'goods_id' => $goods_id,
					'attr_item_id' => $key,
					'attr_value' => $value,
				];
			}
			
			// 如果是更新先删除原来的属性
			if($is_update){
				M('goods_attr') -> where(['goods_id'=>$goods_id]) -> delete();
			}
			
			M('goods_attr') -> addAll($attr);
		}
		
	}
	
	protected function _add()
	{
		// 商品分类
		$this -> assign('category',$this -> getCategroyTree());
		
		// 商品品牌
		$this -> assign('brand',$this -> getBrand());
		
		// 商品规格
		$this -> assign('specHtml',$this -> getSpecBtnHtml());

		// 商品属性
		$this -> assign('attrHtml',$this -> getAttrBtnHtml());
	}
	
	protected function _edit($param)
	{
		$this -> _add();
		
		// 通用条件
		$map = [
			'goods_id' => $param['result']['id']
		];
		// 相册
		$goods_img = M('goods_img') -> where($map) -> select();
		$this -> assign('goods_img',$goods_img);

		// 详情
		$goods_desc = M('goods_desc') -> where($map) -> getField('content');
		$this -> assign('goods_desc',$goods_desc);

		// 商品规格
		$goods_spec = M('goods_spec') -> where($map) -> select();
		$item_id = [];
		$spec = [];
		foreach($goods_spec as $key => $value){
			$tmp = explode(',',$value['spec_key']);
			$item_id = array_merge($item_id,$tmp);
			$spec[$value['spec_key']] = &$goods_spec[$key];
		}
		$item_id = array_unique($item_id);
		$this -> assign('specItemHtml',$this -> handelSpecItemHtml($item_id, $spec));

		// 属性名称
		$attr = M('attr') -> getField('id,attr_name');
		$this -> assign('attr',$attr);

		// 商品属性
		$goods_attr = D('GoodsAttr') -> where($map) -> relation('attr_items') -> select();
		$attr_value = [];
		foreach( $goods_attr as $key => $value) {
			$attr_value[$attr[$value['attr_items']['attr_id']]][] = &$goods_attr[$key];
		}
		$this -> assign('attr_value', $attr_value);
	}
	
	// 获取品牌
	protected function getBrand()
	{
		return D('Brand') -> field('id,brand_name') -> select();
	}
	
	// 获取分类tree
	protected function getCategroyTree()
	{
		// 找出上级分类
		$parent = D('GoodsCategory') -> field('id,cate_name,pid') -> select();
		return list_to_tree($parent);
	}
	
	// 获取规格按钮html
	protected function getSpecBtnHtml()
	{
		$spec = D('Spec') -> relation('SpecItems') -> select();
		$specHtml = '';
		foreach($spec as $key => $value){
			if( ! empty($value['SpecItems'])){
				$btnHtml = '<div class="col-sm-10 labels-container modal-dialog-spec-items">';
				foreach($value['SpecItems'] as $item){
					$btnHtml .= '<span class="btn btn-default btn-sm label">' . $item['spec_value'] . '<input type="hidden" name="spec_item_id[]" value="' . $item['id'] . '"></span>';
				}
				$btnHtml .= '</div>';
				$specHtml .= '<div class="row"><label class="col-sm-2 control-label no-padding-right text-right">' . $value['spec_name'] . ':</label>' . $btnHtml . '</div>';
			}
		}
		return $specHtml;
	}
	
	// 获取属性按钮html
	protected function getAttrBtnHtml()
	{
		$attr = D('Attr') -> relation('attr_items') -> select();
		$attrHtml = '';
		foreach($attr as $key => $value){
			if( ! empty($value['attr_items'])){
				$btnHtml = '<div class="col-sm-10 labels-container modal-dialog-attr-items">';
				foreach($value['attr_items'] as $item){
					$btnHtml .= '<span class="btn btn-default btn-sm label">' . $item['attr_value'] . '<input type="hidden" name="attr_item_id[]" value="' . $item['id'] . '"><input type="hidden" name="attr_value['.$item['id'].']" value="' . $item['attr_value'] . '"></span>';
				}
				$btnHtml .= '</div>';
				$attrHtml .= '<div class="row"><label class="col-sm-2 control-label no-padding-right text-right">' . $value['attr_name'] . ':</label>' . $btnHtml . '</div>';
			}
		}
		return $attrHtml;
	}
	
	// 获取规格选项html
	public function ajaxGetSpecItemHtml($item_id = [])
	{
		die($this -> handelSpecItemHtml($item_id));
	}
	
	// 处理规格html
	protected function handelSpecItemHtml($item_id,$spec = [])
	{
		if(empty($item_id)){
			return '';
		}
		$spec_items = D('SpecItems') 
					  -> order('spec_id asc') 
					  -> where(['id'=>['in',$item_id]]) 
					  -> select();
					  
		$items = [];
		$spec_id = [];
		$group = [];
		foreach($spec_items as $key => $value){
			$items[$value['id']] = & $spec_items[$key];
			if( ! in_array($value['spec_id'],$spec_id)) $spec_id[] = $value['spec_id'];
			$group[$value['spec_id']][] = $value['id'];
		}
		
		// 套餐
		$package = get_array_group($group);

		$spec_name = D('Spec') 
					 -> order('id asc')
					 -> where(['id'=>['in',$spec_id]])
					 -> select();
		$html  = '<table class="table table-striped table-bordered table-hover">';
		$html .= '	<thead><tr>';
		foreach($spec_name as $value){
			$html .= '	<th>'. $value['spec_name'] .'</th>';
		}
		$html .= '		<th>价格</th>';
		$html .= '		<th>库存</th>';
		$html .= '		<th>SKU</th>';
		$html .= '		<th>操作</th>';
		$html .= '	</tr></thead>';
		$html .= '	<tbody>';
		
		foreach($package as $g){
			$html .= '	<tr>';
			$spec_key = implode(',',$g);
			$spec_key_name_array = [];
			foreach($g as $v){
				$spec_key_name_array[] = $items[$v]['spec_value'];
				$html .= '	<td>'.$items[$v]['spec_value'].'</td>';
			}

			$spec_price = '';
			$spec_stock = '';
			$spec_sku   = '';

			$spec_key_name = implode(',',$spec_key_name_array);

			if( ! empty($spec[$spec_key])) {
				$spec_price = $spec[$spec_key]['spec_price'];
				$spec_stock = $spec[$spec_key]['spec_stock'];
				$spec_sku   = $spec[$spec_key]['spec_sku'];
			}

			$html .= '	<td><input type="text" class="form-control" name="spec_price['.$spec_key.']"  placeholder="套餐价格" value="'.$spec_price.'"><input type="hidden" name="spec_key_name['.$spec_key.']"  value="'.$spec_key_name.'"></td>';
			$html .= '	<td><input type="text" class="form-control" name="spec_stock['.$spec_key.']"  placeholder="套餐库存" value="'.$spec_stock.'"></td>';
			$html .= '	<td><input type="text" class="form-control" name="spec_sku['.$spec_key.']"  placeholder="套餐sku" value="'.$spec_sku.'"></td>';
			$html .= '	<td><i class="fa fa-trash-o" onclick="btn.td_remove(this)"></i></td>';
			$html .= '	</tr>';
		}
		
		$html .= '	</tbody>';
		$html .= '	</table>';
		
		return $html;
	}
}
