<?php
namespace Admin\Controller;

use Think\Controller;

class LoginController extends Controller
{
	// 自动登陆
	public function _before_index()
	{
		if(session('?admin_id')){
			return $this -> redirect('Index/index');
		}
	}
	
    // 登陆页面
    public function index()
    {
        if(IS_POST){
			$param = ['do'=>'Login'];
			$cl = B('Admin\\Behaviors\\Auth','',$param);
			if($cl['error'] == 1){
				return $this->error($cl['msg'],U('index'));
			}
            return $this->success($cl['msg'],U('Index/index'));
        }

        return $this -> display();
    }

    // 验证码
    public function vcode()
    {
        $vcode = new \Think\Verify([
			'imageH'    =>  34,              // 验证码图片高度
			'imageW'    =>  100,             // 验证码图片宽度
			'length'    =>  1,               // 验证码位数
			'fontSize'  =>  20,              // 验证码字体大小(px)
        ]);

        $vcode -> entry();
    }
}
