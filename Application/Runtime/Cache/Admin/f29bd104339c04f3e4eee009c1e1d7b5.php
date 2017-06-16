<?php if (!defined('THINK_PATH')) exit();?>
<!-- Sidebar Menu -->
<ul class="nav sidebar-menu">
	<!--后台首页-->
	<li class="active">
		<a href="<?php echo U('Index/index');?>">
			<i class="menu-icon glyphicon glyphicon-home"></i>
			<span class="menu-text"> 后台首页 </span>
		</a>
	</li>
	<!--商品管理-->
	<li>
		<a href="#" class="menu-dropdown">
			<i class="menu-icon glyphicon glyphicon-tasks"></i>
			<span class="menu-text"> 商品管理 </span>
			<i class="menu-expand"></i>
		</a>
		
		<ul class="submenu">
			<li>
				<a href="<?php echo U('Goods/index');?>">
					<span class="menu-text">商品列表</span>
				</a>
			</li>
			<li>
				<a href="<?php echo U('Spec/index');?>">
					<span class="menu-text">商品规格</span>
				</a>
			</li>
			<li>
				<a href="<?php echo U('Attr/index');?>">
					<span class="menu-text">商品属性</span>
				</a>
			</li>
			<li>
				<a href="<?php echo U('Brand/index');?>">
					<span class="menu-text">品牌列表</span>
				</a>
			</li>
			<li>
				<a href="<?php echo U('Category/index');?>">
					<span class="menu-text">分类列表</span>
				</a>
			</li>
			<li>
				<a href="modals.html">
					<span class="menu-text">商品评论</span>
				</a>
			</li>
		</ul>
	</li>
	<!--文章管理-->
	<li>
		<a href="#" class="menu-dropdown">
			<i class="menu-icon fa fa-th"></i>
			<span class="menu-text"> 文章管理 </span>
			<i class="menu-expand"></i>
		</a>

		<ul class="submenu">
			<li>
				<a href="<?php echo U('Article/index');?>">
					<span class="menu-text">文章列表</span>
				</a>
			</li>
			<li>
				<a href="<?php echo U('ArticleCategory/index');?>">
					<span class="menu-text">文章分类</span>
				</a>
			</li>
		</ul>
	</li>
	<!--管理员-->
	<li>
		<a href="#" class="menu-dropdown">
			<i class="menu-icon fa fa-user"></i>
			<span class="menu-text"> 管理员 </span>
			<i class="menu-expand"></i>
		</a>

		<ul class="submenu">
			<li>
				<a href="tables-simple.html">
					<span class="menu-text">管理员列表</span>
				</a>
			</li>
			<li>
				<a href="tables-data.html">
					<span class="menu-text">角色列表</span>
				</a>
			</li>
			<li>
				<a href="tables-data.html">
					<span class="menu-text">节点列表</span>
				</a>
			</li>
		</ul>
	</li>
</ul>
<!-- /Sidebar Menu -->