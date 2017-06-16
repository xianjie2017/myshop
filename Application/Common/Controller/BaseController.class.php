<?php
namespace Common\Controller;
class BaseController extends \Think\Controller
{
	// 操作的model
	protected $doModelName = CONTROLLER_NAME;
	// 跳转的地址
	protected $doJumpUrl = 'index'; 
	// 排序
	protected $order = '';
	// 每页显示的数量
	protected $listRows = 15;
	
	protected function _initialize()
	{
		$this -> userAuth();
		// 圈子圈套
		
		if(method_exists($this,'_init')){
			call_user_func([$this,'_init']);
		}
	}
	
	protected function _init(){}

	protected function userAuth()
	{
		$cl = B('Admin\\Behaviors\\Auth');
		if($cl['error'] == 1){
			return $this -> error($cl['msg'],U('Login/index'));
		}
	}
	
	public function index(){
		$model = D($this->doModelName);
		$this -> doList($model,isset($this->where) ? $this->where : []);
		if(is_file($this->view->parseTemplate())){
			$this -> display();
		}
	}
	
	protected function doList($model,$map=[])
	{
		// 排序
		if(empty($this -> order)){
			$sort = $model -> getPk() . ' desc';
		}else{
			$sort = $this -> $this -> order;
		}
		
		// 计算总数
		$count = $model -> where($map) -> count(1);

		// 查询数据
		$list = $model -> where($map) -> order($sort) -> page(I('p',1),$this->listRows);
		
		if(method_exists($model,'relation') && ! empty($this->relation)){
			$list = $list -> relation($this->relation);
		}
		
		$list = $list -> select();
		
		if(method_exists($this,'_list')){
			$params['list'] = $list;
			$params['model'] = $model;
			call_user_func([$this,'_list'],$params);
		}

		$page = new \Common\Tool\Page($count,$this->listRows);
				 
		$this -> assign('list', $list);
		$this -> assign('count', $count);
		$this -> assign('listRows', $this->listRows);
		$this -> assign('page', $page -> show());
	}
	
	public function add(){
		if(IS_POST){
			return $this -> save_add();
		}
		
		if(method_exists($this,'_add')){
			call_user_func([$this,'_add']);
		}
		
		if(is_file($this->view->parseTemplate())){
			$this -> display();
		}else{
			$this -> display('edit');
		}
	}
	
	protected function save_add()
	{
		$this -> save_edit();
	}
	
	public function edit(){
		if(IS_POST){
			$this -> save_edit();
		}
		
		$model = D($this -> doModelName);
		
		// 找出当前信息
		$data = $model -> find(I($model->getPk()));
		$this -> assign('data',$data);
		
		if(method_exists($this,'_edit')){
			call_user_func([$this,'_edit'],['model'=>$model,'result'=>$data]);
		}
		
		if(is_file($this->view->parseTemplate())){
			$this -> display();
		}else{
			$this -> display('edit');
		}
	}
	
	protected function save_edit(){
		$this -> doSubmit();
	}
	
	public function del(){
		$model = D($this->doModelName);
		if (! empty(I($model->getPk()))) {
			$rs = $model->delete(I($model->getPk()));
			
			if( $rs === false ){
				$this->error($model->getError());
			}
			
			$this->success('删除成功', U($this->doJumpUrl));
		}
	}
	
	// 简易保存数据
	protected function doSubmit()
	{
		// 实例化模型
		$model = D($this -> doModelName);
		
		// 保存前置操作
		$methodName = 'create';
		if(method_exists($model,'exCreate')){
			$methodName = 'exCreate';
		}
		
		// 收集数据 / 验证数组
		if(false === call_user_func([$model,$methodName])){
			die( $this -> error( $model -> getError() ));
		}

		// 修改数据
		if( ! empty(I($model -> getPk()))){
			$printInfo = '修改';
			$res = $model -> save();
		}else{ // 添加数据
			$printInfo = '添加';
			$res = $model -> add();
		}
		
		if($res !== false){ // 保存成功
			// 保存后置操作
			$methodName = '_doSubmit';
			if(method_exists($this,'_doSubmit')){
				$param['result'] = $res;
				$param['model']  = $model;
				call_user_func([$this,'_doSubmit'],$param);
			}
		
			die( $this -> success($printInfo . '成功!',U($this->doJumpUrl)) );
		}
		
		die( $this -> error($printInfo . '失败!' . $model->getLastSql()) );
	}
	
	// 上传文件
	public function ajaxUpload()
	{
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     3145728 ;// 设置附件上传大小
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->rootPath  =      'Public/Uploads/'; // 设置附件上传根目录
		
		// 如果目录不存在,则创建目录
		if( ! is_dir($upload->rootPath)){
			mkdir($upload->rootPath);
		}
		
		// 上传单个文件 
		$info   =   $upload->uploadOne($_FILES['myfile']);
		if(!$info) {// 上传错误提示错误信息
			$this->error($upload->getError());
			exit;
		}else{// 上传成功 获取上传文件信息
			$path = $upload->rootPath . $info['savepath'] . $info['savename'];
			die( json_encode(['status'=>1,'path'=>$path]) );
		}
	}
}
