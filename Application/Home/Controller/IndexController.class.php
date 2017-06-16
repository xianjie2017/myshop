<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	
	protected function handelCate($data)
	{
		foreach($data as $key => $value){
			
		}
	}
	
    public function index(){
		
		// 
	   $sql = INSERT INTO TALBE;
    }
	
	public function up()
	{
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     3145728 ;// 设置附件上传大小
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->rootPath  =     './public/Uploads/'; // 设置附件上传根目录
		$upload->savePath  =     ''; // 设置附件上传（子）目录
		// 上传文件 
		$info   =   $upload->uploadOne($_FILES['logo']);
		if(!$info) {// 上传错误提示错误信息
			$this->error($upload->getError());
		}else{// 上传成功
			$this->success('上传成功！');
		}
	}
}