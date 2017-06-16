<?php
namespace Admin\Behaviors;

class AuthBehavior extends \Think\Behavior
{
	public function run(&$param)
	{
		if(! empty($param)){
			$method = 'do'.$param['do'];
			$res = call_user_func_array(array($this,$method),$param);
			return $res;
		}else{
			return $this -> auth();
		}
	}
	
	// 登陆
	public function doLogin()
	{
		$rules = [
			['user_name','require','用户名不能为空',1],
			['user_name','5,18','用户名长度为5到18个字符',1,'length'],
			['password','require','密码不能为空',1],
			['password','5,18','密码长度为5到18个字符',1,'length'],
		];
		
		$res = M('admin') -> validate($rules) -> create();
		if($res === false){
			return [
				'error' => 1,
				'msg' => M('admin') -> getError()
			];
		}
		
		$user_name = I('post.user_name');
		$password = I('post.password');

		$user = M('admin')->where(['user_name'=>$user_name])->find();
		if(empty($user)){
			return [
				'error'=> 1,
				'msg' => '用户不存在'
			];
		}

		if(md5($password) != $user['password']){
			return [
				'error'=> 1,
				'msg' => '密码错误'
			];
		}

		session('admin_id',$user['id']);
		session('admin_name',$user['user_name']);
		
		$this -> recordLogin($user['id']);
		
		return [
			'error'=> 0,
			'msg' => '登陆成功'
		];
	}
	
	// 记录登陆信息
	protected function recordLogin($user_id)
	{
		$data = [
			'ip' => get_client_ip(),
			'last_time' => time()
		];
		M('admin') -> where(['id'=>$user_id]) -> save($data);
	}
	
	public function auth()
	{
		// 登陆验证
		if(! session('?admin_id')){
			return [
				'error' => 1,
				'msg' => '请登陆'
			];
		}
	}
}