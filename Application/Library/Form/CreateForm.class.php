<?php
namespace Library\Form;

class CreateForm
{
	protected static $instances;
	
	protected $config = [
		'begin' 	  => '<div class="form-group">',
		'title_begin' => '<label for="inputEmail3" class="col-sm-2 control-label">',
		'title_end'	  => '</label>',
		'body_begin'  => '<div class="col-sm-10">',
		'body_end'	  => '</div>',
		'end'		  => '</div>',
	];
	
	protected function __construct($config)
	{
		$this->config = array_merge($this->config,$config);
	}
	
	public static function getInstances(array $config = [])
	{
		if(! (self::$instances instanceOf self)){
			self::$instances = new self($config);
		}
		
		return self::$instances;
	}
	
	
	public function exec($data)
	{
		return $this -> areaHtml('brand_name','','请输入品牌名称');
	}
	
	// text
	protected function textHtml($name,$value=null,$desc='')
	{
		$body = '<input type="text" class="form-control" value="'.$value.'" name="'.$name.'" id="input-'.$name.'" placeholder="'.$desc.'">';
		return $this->combination($name,$body);
	}
	
	// area
	protected function areaHtml($name,$value=null,$desc='')
	{
		$body = '<textarea class="form-control" rows="3" name="'.$name.'" placeholder="'.$desc.'">'.$value.'</textarea>';
		return $this->combination($name,$body);
	}
	
	//select
	public function selectHtml($name,$value=null,$list=[])
	{
		$option = '';
		foreach($list as $key => $value){
			$option .= '<option value="'.$key.'">'.$value.'</option>';
		}
		$body = '<select name="'.$name.'">'.$option.'</select>';
		return $this->combination($name,$body);
	}
	
	// 自定义表单
	protected function custom($name,$value=null)
	{
		return $this->combination($name,$value);
	}
	
	protected function combination($name,$body)
	{
		$html  = $this -> config['begin'];
		$html .= $this -> config['title_begin'];
		$html .= $name;
		$html .= $this -> config['title_end'];
		$html .= $this -> config['body_begin'];
		$html .= $body;
		$html .= $this -> config['body_end'];
		$html .= $this -> config['end'];
		
		return $html;
	}
}