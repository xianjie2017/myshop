<?php if (!defined('THINK_PATH')) exit();?>
<ul class="account-area">
	<li>
		<a class="login-area dropdown-toggle" data-toggle="dropdown">
			<div class="avatar" title="View your public profile">
				<img src="/Public/Admin/assets/img/avatars/adam-jansen.jpg">
			</div>
			<section>
				<h2><span class="profile"><span><?php echo (session('admin_name')); ?> 
				,欢迎回来
				</span></span></h2>
			</section>
		</a>
		<!--Login Area Dropdown-->
		<ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
			<li class="email"><a><?php echo (session('admin_name')); ?></a></li>
			<!--Avatar Area-->
			<li>
				<div class="avatar-area">
					<img src="/Public/Admin/assets/img/avatars/adam-jansen.jpg" class="avatar">
				</div>
			</li>

			<!--/Theme Selector Area-->
			<li class="dropdown-footer">
				<a href="login.html">
					<i class="glyphicon glyphicon-share"></i> 退出登陆
				</a>
			</li>
		</ul>
		<!--/Login Area Dropdown-->                  
	</li>
</ul>