<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- Head -->
<head>
    <meta charset="utf-8" />
    <title><?php echo ((isset($page_title) && ($page_title !== ""))?($page_title):''); ?> - 后台管理系统</title>

    <meta name="description" content="Dashboard" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">


    <!--Basic Styles-->
    <link href="/Public/Admin/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/Public/Admin/assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/Public/Admin/assets/css/weather-icons.min.css" rel="stylesheet" />

    <!--Beyond styles-->
    <link href="/Public/Admin/assets/css/beyond.min.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/assets/css/demo.min.css" rel="stylesheet" />
    <link href="/Public/Admin/assets/css/typicons.min.css" rel="stylesheet" />
    <link href="/Public/Admin/assets/css/animate.min.css" rel="stylesheet" />

    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="/Public/Admin/assets/js/skins.min.js"></script>
</head>
<!-- /Head -->
<!-- Body -->
<body>
<!-- Loading Container -->
    <div class="loading-container">
        <div class="loading-progress">
            <div class="rotator">
                <div class="rotator">
                    <div class="rotator colored">
                        <div class="rotator">
                            <div class="rotator colored">
                                <div class="rotator colored"></div>
                                <div class="rotator"></div>
                            </div>
                            <div class="rotator colored"></div>
                        </div>
                        <div class="rotator"></div>
                    </div>
                    <div class="rotator"></div>
                </div>
                <div class="rotator"></div>
            </div>
            <div class="rotator"></div>
        </div>
    </div>
    <!--  /Loading Container -->
    <!-- Navbar -->
    <div class="navbar">
        <div class="navbar-inner">
            <div class="navbar-container">
                <!-- Navbar Barnd -->
                <div class="navbar-header pull-left">
                    <a href="#" class="navbar-brand">
                        <small>
                            <img src="/Public/Admin/assets/img/logo.png" alt="" />
                        </small>
                    </a>
                </div>
                <!-- /Navbar Barnd -->

                <!-- Sidebar Collapse -->
                <div class="sidebar-collapse" id="sidebar-collapse">
                    <i class="collapse-icon fa fa-bars"></i>
                </div>
                <!-- /Sidebar Collapse -->
                <!-- Account Area and Settings --->
                <div class="navbar-header pull-right">
                    <div class="navbar-account">
                        <?php echo W('Admin/top');?>
                    </div>
                </div>
                <!-- /Account Area and Settings -->
            </div>
        </div>
    </div>
    <!-- /Navbar -->
    <!-- Main Container -->
    <div class="main-container container-fluid">
        <!-- Page Container -->
        <div class="page-container">
            <!-- Page Sidebar -->
            <div class="page-sidebar" id="sidebar">
                <!-- Page Sidebar Header-->
                <div class="sidebar-header-wrapper">
                    <input type="text" class="searchinput" />
                    <i class="searchicon fa fa-search"></i>
                    <div class="searchhelper">请输入需要搜索的商品名称</div>
                </div>
                <!-- /Page Sidebar Header -->
                
				<?php echo W('Admin/menu');?>
                
            </div>
            <!-- /Page Sidebar -->
            <!-- Page Content -->
            <div class="page-content">
                <!-- Page Breadcrumb -->
                <div class="page-breadcrumbs">
                    <ul class="breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>
                            <a href="<?php echo U('Index/index');?>">Home</a>
                        </li>
                        <li class="active"><?php echo ((isset($page_title) && ($page_title !== ""))?($page_title):''); ?></li>
                    </ul>
                </div>
                <!-- /Page Breadcrumb -->
                <!-- Page Header -->
                <div class="page-header position-relative">
                    <div class="header-title">
                        <h1>
                            <?php echo ((isset($page_title) && ($page_title !== ""))?($page_title):''); ?>
                        </h1>
                    </div>
                    <!--Header Buttons-->
                    <div class="header-buttons">
                        <a class="sidebar-toggler" href="#">
                            <i class="fa fa-arrows-h"></i>
                        </a>
                        <a class="refresh" id="refresh-toggler" href="">
                            <i class="glyphicon glyphicon-refresh"></i>
                        </a>
                        <a class="fullscreen" id="fullscreen-toggler" href="#">
                            <i class="glyphicon glyphicon-fullscreen"></i>
                        </a>
                    </div>
                    <!--Header Buttons End-->
                </div>
                <!-- /Page Header -->
                <!-- Page Body -->
                <div class="page-body">
					<div class="row">
	<div class="col-lg-12 col-sm-12 col-xs-12">
		<div class="well with-header with-footer">
			<div class="header bordered-sky">
				<i class="fa fa-edit magenta"></i>
				商品添加
				
				<a class="btn btn-darkorange  btn-xs pull-right" href="<?php echo U('index');?>">
					<i class="fa fa-list"></i>
					商品列表
				</a>
			</div>
			<div class="widget-main ">
				<div class="tabbable">
					<ul class="nav nav-tabs tabs-flat" id="myTab11">
						<li class="active">
							<a data-toggle="tab" href="#home11">
								基本信息
							</a>
						</li>
						<li class="">
							<a data-toggle="tab" href="#profile11">
								商品详情
							</a>
						</li>
						
						<li class="">
							<a data-toggle="tab" href="#spec">
								商品规格
							</a>
						</li>
						
						<li class="">
							<a data-toggle="tab" href="#attr">
								商品属性
							</a>
						</li>
					</ul>
					<form class="form-horizontal" role="form" action="" method="post">
						<div class="tab-content tabs-flat">
							<div id="home11" class="tab-pane active">
								<!-- 商品标题 -->
								<div class="form-group">
									<label for="goods_name" class="col-sm-2 control-label no-padding-right">商品标题</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="goods_name" id="goods_name" placeholder="商品标题" value="<?php echo ((isset($data["goods_name"]) && ($data["goods_name"] !== ""))?($data["goods_name"]):""); ?>">
									</div>
								</div>
								<!-- 手机商品标题 -->
								<div class="form-group">
									<label for="mobie_goods_name" class="col-sm-2 control-label no-padding-right">手机商品标题</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="mobie_goods_name" id="mobie_goods_name" placeholder="手机商品标题" value="<?php echo ((isset($data["mobie_goods_name"]) && ($data["mobie_goods_name"] !== ""))?($data["mobie_goods_name"]):""); ?>">
									</div>
								</div>
								<!-- 商品分类 -->
								<div class="form-group">
									<label for="cate_id" class="col-sm-2 control-label no-padding-right">商品分类</label>
									<div class="col-sm-6">
										<select id="cate_id" name="cate_id" style="width:100%;">
											<option value="0" />请选择分类</option>
											<?php if(is_array($category)): foreach($category as $key=>$cate): ?><option value="<?php echo ($cate["id"]); ?>"/>├<?php echo str_repeat('──',$cate['level'] - 1); echo ($cate["cate_name"]); ?></option><?php endforeach; endif; ?>
											</select>
									</div>
								</div>
								<!-- 商品品牌 -->
								<div class="form-group">
									<label for="brand_id" class="col-sm-2 control-label no-padding-right">商品品牌</label>
									<div class="col-sm-6">
										<select id="brand_id" name="brand_id" style="width:100%;">
											<option value="0" />请选择品牌</option>
											<?php if(is_array($brand)): foreach($brand as $key=>$b): ?><option value="<?php echo ($b["id"]); ?>" /><?php echo ($b["brand_name"]); ?></option><?php endforeach; endif; ?>
										</select>
									</div>
								</div>
								<!-- 市场价格 -->
								<div class="form-group">
									<label for="market_price" class="col-sm-2 control-label no-padding-right">市场价格</label>
									<div class="col-sm-3">
										<div class="spinner spinner-horizontal spinner-two-sided">
											<div class="spinner-buttons	btn-group spinner-buttons-left">
												<button type="button" class="btn spinner-down danger">
													<i class="fa fa-minus"></i>
												</button>
											</div>
											<input type="text" value='<?php echo ((isset($data["market_price"]) && ($data["market_price"] !== ""))?($data["market_price"]):"1"); ?>' id="market_price" name="market_price" class="spinner-input form-control" maxlength="8">
											<div class="spinner-buttons	btn-group spinner-buttons-right">
												<button type="button" class="btn spinner-up blue">
													<i class="fa fa-plus"></i>
												</button>
											</div>
										</div>
									</div>
								</div>
								<!-- 商店价格 -->
								<div class="form-group">
									<label for="shop_price" class="col-sm-2 control-label no-padding-right">商店价格</label>
									<div class="col-sm-3">
										<div class="spinner spinner-horizontal spinner-two-sided">
											<div class="spinner-buttons	btn-group spinner-buttons-left">
												<button type="button" class="btn spinner-down danger">
													<i class="fa fa-minus"></i>
												</button>
											</div>
											<input type="text" value='<?php echo ((isset($data["shop_price"]) && ($data["shop_price"] !== ""))?($data["shop_price"]):"1"); ?>' id="shop_price" name="shop_price" class="spinner-input form-control" maxlength="8">
											<div class="spinner-buttons	btn-group spinner-buttons-right">
												<button type="button" class="btn spinner-up blue">
													<i class="fa fa-plus"></i>
												</button>
											</div>
										</div>
									</div>
								</div>
								<!-- 商店库存 -->
								<div class="form-group">
									<label for="stock" class="col-sm-2 control-label no-padding-right">商店库存</label>
									<div class="col-sm-3">
										<div class="spinner spinner-horizontal spinner-two-sided">
											<div class="spinner-buttons	btn-group spinner-buttons-left">
												<button type="button" class="btn spinner-down danger">
													<i class="fa fa-minus"></i>
												</button>
											</div>
											<input type="text" value='<?php echo ((isset($data["stock"]) && ($data["stock"] !== ""))?($data["stock"]):"1"); ?>' id="stock" name="stock" class="spinner-input form-control" maxlength="8">
											<div class="spinner-buttons	btn-group spinner-buttons-right">
												<button type="button" class="btn spinner-up blue">
													<i class="fa fa-plus"></i>
												</button>
											</div>
										</div>
									</div>
								</div>
								<!-- 图片 -->
								<div class="form-group">
									<label for="mobie_goods_name" class="col-sm-2 control-label no-padding-right">商品相册</label>
									<div class="col-sm-10">
										<a onclick="btn.uploader(this,'path',true,'pic')" href="javascript:void(0);" class="btn btn-darkorange">
											<i class="fa fa-picture-o"></i>
											上传图片
										</a>
										<?php if(!empty($data["pic"])): ?><ul class="pic-list-body">
											<li>	
												<img src="/<?php echo ($data["pic"]); ?>" width="100" height="100">	
												<input type="hidden" name="pic" value="<?php echo ($data["pic"]); ?>">
												<p>
													<span class="label label-success" onclick="btn.mainimg(this,'pic','pic')">主图</span>
													<span class="label label-orange" onclick="btn.delimg(this)">删除</span>
												</p>
											</li>
											
											<!-- 相册 -->
											<?php if(is_array($goods_img)): foreach($goods_img as $key=>$img): ?><li>	
												<img src="/<?php echo ($img["path"]); ?>" width="100" height="100">	
												<input type="hidden" name="path" value="<?php echo ($img["path"]); ?>">
												<p>
													<span class="label label-success" onclick="btn.mainimg(this,'pic','pic')">主图</span>
													<span class="label label-orange" onclick="btn.delimg(this)">删除</span>
												</p>
											</li><?php endforeach; endif; ?>
										</ul><?php endif; ?>
									</div>
								</div>
								<!-- 是否上架 -->
								<div class="form-group">
									<label for="is_sale" class="col-sm-2 control-label no-padding-right">是否上架</label>
									<div class="col-sm-10">
										<label style="margin-top:8px;">
											<input name="is_sale" value="1" class="checkbox-slider toggle colored-blue" <?php if(($data["is_sale"]) == "1"): ?>checked<?php endif; ?> <?php if(empty($_GET['id'])): ?>checked<?php endif; ?> type="checkbox">
											<span class="text"></span>
										</label>
									</div>
								</div>
								<!-- 关键字 -->
								<div class="form-group">
									<label for="keywords" class="col-sm-2 control-label no-padding-right">关键字</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="keywords" id="keywords" placeholder="关键字" value='<?php echo ((isset($data["keywords"]) && ($data["keywords"] !== ""))?($data["keywords"]):""); ?>'>
									</div>
								</div>
								<!-- 描述 -->
								<div class="form-group">
									<label for="description" class="col-sm-2 control-label no-padding-right">网页描述</label>
									<div class="col-sm-10">
										<textarea class="form-control" rows="6" name="description" id="description" placeholder="网页描述"><?php echo ((isset($data["description"]) && ($data["description"] !== ""))?($data["description"]):""); ?></textarea>
									</div>
								</div>
							</div>

							<div id="profile11" class="tab-pane" style="padding-bottom:20px;">
								<!-- 加载编辑器的容器 -->
								<textarea id="container" name="content"><?php echo ($goods_desc); ?></textarea>
								<!-- 配置文件 -->
								<script type="text/javascript" src="/Public/Admin/ueditor/ueditor.config.js"></script>
								<!-- 编辑器源码文件 -->
								<script type="text/javascript" src="/Public/Admin/ueditor/ueditor.all.js"></script>
								<!-- 实例化编辑器 -->
								<script type="text/javascript">
									var ue = UE.getEditor('container');
								</script>
							</div>
							
							<div id="spec" class="tab-pane">								
								<!-- 规格 -->
								<div class="form-group">
									<label for="mobie_goods_name" class="col-sm-2 control-label no-padding-right"></label>
									<div class="col-sm-10">
										商品规格【购买套餐】 同一个商品有多个不同价格的套餐的时候
									</div>
								</div>
								
								<!-- 规格 -->
								<div class="form-group">
									<label class="col-sm-2 control-label no-padding-right">规格</label>
									<div class="col-sm-10">
										<a onclick="btn.spec(this)" href="javascript:void(0);" class="btn btn-darkorange">
											<i class="fa fa-shopping-cart"></i>
											添加规格
										</a>
										
										<!-- 套餐列表 -->
										<div class="spec-item-list" style="margin-top:15px;"><?php echo ((isset($specItemHtml) && ($specItemHtml !== ""))?($specItemHtml):''); ?></div>
									</div>
								</div>
							</div>
							
							<div id="attr" class="tab-pane">
								<!-- 规格 -->
								<div class="form-group">
									<label class="col-sm-2 control-label no-padding-right"></label>
									<div class="col-sm-10">
										商品属性是商品的特性，用于商品也显示及商品筛选
									</div>
								</div>
								
								<!-- 属性 -->
								<div class="form-group">
									<label class="col-sm-2 control-label no-padding-right">属性</label>
									<div class="col-sm-10">
										<a onclick="btn.attr(this)" href="javascript:void(0);" class="btn btn-darkorange attr-btn">
											<i class="fa fa-shopping-cart"></i>
											添加属性
										</a>
									</div>
								</div>
								
								<!-- 属性列表 -->
								<div class="attr-item-list" style="margin-top:15px;">
									<?php if(!empty($attr_value)): if(is_array($attr_value)): foreach($attr_value as $key=>$attr): ?><div class="form-group" style="margin-bottom:8px;">
												<label class="col-sm-2 control-label no-padding-right">
													<?php echo ($key); ?>
												</label>
												<div class="col-sm-10 labels-container" style="padding-top:7px;">
													<?php if(is_array($attr)): foreach($attr as $key=>$item): ?><span class="label label-info"><?php echo ($item["attr_value"]); ?>
															<input type="hidden" name="attr_item_id[]" value="1">
															<input type="hidden" name="attr_value[<?php echo ($item["attr_item_id"]); ?>]" value="<?php echo ($item["attr_value"]); ?>">
														</span><?php endforeach; endif; ?>
												</div>
											</div><?php endforeach; endif; endif; ?>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-palegreen">
										<i class="fa fa-edit"></i>
										保存数据
										<?php if(!empty($_GET['id'])): ?><input type="hidden" name="id" value="<?php echo ($_GET['id']); ?>"><?php endif; ?>
									</button>
								</div>
							</div>
						</div>
						
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-12 col-sm-12 col-xs-12">
	
	</div>
</div>

<script>
var specHtml = '<?php echo ($specHtml); ?>';
var attrHtml = '<?php echo ($attrHtml); ?>';
var select_attr_id = [];


<?php if(!empty($attr)): if(is_array($attr)): foreach($attr as $key=>$at): ?>select_attr_id.push('<?php echo ($at["attr_item_id"]); ?>');<?php endforeach; endif; endif; ?>
console.log(select_attr_id);

</script>
				</div>
                <!-- /Page Body -->
            </div>
            <!-- /Page Content -->
        </div>
        <!-- /Page Container -->
        <!-- Main Container -->

    </div>

    <!--Basic Scripts-->
    <script src="/Public/Admin/assets/js/jquery-2.0.3.min.js"></script>
    <script src="/Public/Admin/assets/js/bootstrap.min.js"></script>

    <!--Beyond Scripts-->
    <script src="/Public/Admin/assets/js/beyond.min.js"></script>

    <!--Page Related Scripts-->
    <!--Sparkline Charts Needed Scripts-->
    <script src="/Public/Admin/assets/js/charts/sparkline/jquery.sparkline.js"></script>
    <script src="/Public/Admin/assets/js/charts/sparkline/sparkline-init.js"></script>
	
	 <!--Fuelux Spinner-->
    <script src="/Public/Admin/assets/js/fuelux/spinner/fuelux.spinner.min.js"></script>
	
	<script>
	var btn = {
		// 模态窗口
		window : function(msg,func,p,h){

			if(typeof h == 'undefined'){
				h = 166;
				bh = 62;
			}else{
				bh = eval(h + 62);
				h = eval(h + 166);
			}

			var maincss = 'position: fixed;top: 50%;left: 50%;margin-top:-'+eval(h/2)+'px;margin-left:-300px;z-index:9999;';
			var bodycss = 'height:' + bh + 'px;overflow-y:auto;';
		
			var html =  '<div class="modal-dialog modal-msg-windows" style="'+maincss+'">'+
						'	<div class="modal-content">'+
						'		<div class="modal-header">'+
						'			<button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="btn.closeBtn(this)">×</button>'+
						'			<h4 class="modal-title">信息提示</h4>'+
						'		</div>'+
						'		<div class="modal-body" style="'+bodycss+'">'+
						'			<p>'+msg+'</p>'+
						'		</div>'+
						'		<div class="modal-footer">'+
						'			<button type="button" class="btn btn-warning" data-dismiss="modal" onclick="btn.closeBtn(this)">Close</button>';
				
				if(func){
					html += '<button type="button" class="btn btn-primary" onclick="btn.'+func+'(\''+p+'\')">确定</button>';
				}
				
				html +=	'		</div>'+
						'	</div>'+
						'</div>';
						
			if($('.modal-msg-windows').length == 0){
				$('body').append(html);
			}
		},
		del : function(url){
			btn.window('您确定要删除该信息吗?','jumpBtn',url);
		},
		closeBtn:function(o,btn){
			$(o).parents('.modal-dialog').remove();
		},
		jumpBtn:function(url){
			window.location.href = url;
		},
		// 上传商品
		uploader:function(o,input,Multiple,main){
			if($('input[name="myfile"]').length > 0 ){
				$('input[name="myfile"]').remove();
			}
			$(o).after('<input type="file" name="myfile" style="display:none;">');
			$('input[name="myfile"]').click();
			
			// 上传图片
			$('input[name="myfile"]').change(function(){

				$(this).after('<img id="loading" src="/Public/Admin/images/loading1.gif" width="30" style="margin-left:10px;">');

				var formData = new FormData();
				formData.append('myfile', $(this)[0].files[0]);
				$.ajax({
					url: '<?php echo U('ajaxUpload');?>',
					method: 'POST',
					data: formData,
					contentType: false, // 注意这里应设为false
					processData: false,
					cache: false,
					success: function(data) {
					
						$('img#loading').remove();
						$('input[name="myfile"]').remove();
						
						var data = eval('('+data+')');
						
						if(data.status == 0 ){
							btn.window(data.info);
							return false;
						}
						
						// 如果input是匿名函数
						if(typeof input == 'function'){
							eval(input)(data.path);
							return true;
						}
						
						if($('.pic-list-body').length == 0 ){
							var body = '<ul class="pic-list-body"></ul>';
							$(o).after(body);
						}
						
						if(!input){
							input = 'path';
						}
						
						if(!main){
							main = 'pic';
						}
						
						label = 'label-info';
						if($('.pic-list-body li').length == 0){
							input = main;
							label = 'label-success';
						}else{
							input += '[]';
						}
						
						var li = '<li>'+
								 '	<img src="/'+data.path+'" width="100" height="100">'+
								 '	<input type="hidden" name="'+input+'" value="'+data.path+'">'+
								 '<p>' ;
							if(Multiple !== false){
								li += '<span class="label '+label+'" onclick="btn.mainimg(this,\''+main+'\',\''+input+'\')">主图</span>';  
							}
								 
							li += '<span class="label label-orange" onclick="btn.delimg(this)">删除</span>'	+
								  '</p>';
								  '</li>';
								 
						if(Multiple === false){
							$('.pic-list-body').html(li);
						}else{
							$('.pic-list-body').append(li);
						}
						
					},
					error: function (jqXHR) {
						console.log(JSON.stringify(jqXHR));
					}
				})
				.done(function(data) {
					//console.log('done');
				})
				.fail(function(data) {
					//console.log('fail');
				})
				.always(function(data) {
					//console.log('always');
				}); 
			});
		},
		delimg:function(o){
			$(o).parents('li').remove();
		},
		mainimg:function(o,main,input){
			$(o).parents('ul').find('.label-success').removeClass('label-success').addClass('label-info');
			$(o).addClass('label-success').removeClass('label-info');
			
			$(o).parents('ul').find('input[type="hidden"]').prop('name',input);
			$(o).parents('li').find('input[type="hidden"]').prop('name',main);
			
		},
		// 商品规格
		spec:function(o){
			var p = [];
			btn.window(specHtml,'spec_add', p,120);
			
			$('.modal-dialog-spec-items span').click(function(){
				$(this).toggleClass('btn-darkorange').toggleClass('btn-default');
			});
			
		},
		spec_add:function(p){
			var item_id = [];
			$('.modal-dialog-spec-items span.btn-darkorange input').each(function(){
				item_id.push($(this).val());
			});
			
			
			var error_len = $('.modal-footer .error').length;
			
			if(item_id.length == 0){
				if(error_len == 0){
					$('.modal-footer .loading').remove();
					$('.modal-footer').prepend('<span class="error" style="color:red">请选择规格选项!</span>');
				}
				return false;
			}
			
			if($('.modal-footer .loading').length == 0){
				$('.modal-footer .error').remove();
				$('.modal-footer').prepend('<span class="loading"><img id="loading" src="/Public/Admin/images/loading1.gif" width="30" style="margin-left:10px;"></span>');
			}
			
			$.post('<?php echo U('Goods/ajaxGetSpecItemHtml');?>',{item_id:item_id},function(data){
				$('.spec-item-list').html(data);
				$('.modal-footer .loading').remove();
				$('.modal-dialog').remove();
			},'html');
		},
		// 商品属性
		attr:function(o){
			var p = [];
			btn.window(attrHtml,'attr_add', p,120);
			
			if(select_attr_id.length != 0){
				$('.modal-dialog-attr-items input[name="attr_item_id[]"]').each(function(){
					if($.inArray($(this).val(),select_attr_id) != '-1'){
						$(this).parent().addClass('btn-darkorange');
					}
				});
			}
			
			$('.modal-dialog-attr-items span').click(function(){
				// 单选
				/*if($(this).hasClass('btn-darkorange')){
					$(this).removeClass('btn-darkorange');
				}else{
					$(this).addClass('btn-darkorange').siblings().removeClass('btn-darkorange');
				}*/
				
				// 多选
				$(this).toggleClass('btn-darkorange').toggleClass('btn-default');
			});
			
		},
		attr_add:function(p){
			var html = '';
			select_attr_id = [];
			// 单选
			/*$('.modal-dialog-attr-items span.btn-darkorange input').each(function(){
				
				var label_name = $(this).parents('.row').find('label').html();
			
				html += '<div class="form-group">';
				html += '<label class="col-sm-2 control-label no-padding-right">'+label_name+'</label>';
				html += '<div class="col-sm-10">';
				
				html += '<label class="control-label">' + $(this).parent().html() + '</label>';
				
				html += '</div>';
				html += '</div>';
				
				// 把选中的属性入栈
				btn.select_attr_id.push($(this).val());
			});*/
			
			// 多选
			$('.modal-msg-windows .modal-body .row').each(function(){
				if($(this).find('span.btn-darkorange').length != 0){
					var label_name = $(this).find('label').html();
					html += '<div class="form-group" style="margin-bottom:8px;">';
					html += '<label class="col-sm-2 control-label no-padding-right">'+label_name+'</label>';
					html += '<div class="col-sm-10 labels-container" style="padding-top:7px;">';
					
					$(this).find('span.btn-darkorange').each(function(){
						html += '<span class="label label-info">'+ $(this).html() +'</span>';
						select_attr_id.push($(this).find('input').val());
					});
					
					html += '</div>';
					html += '</div>';
				}
			});
			
			$('.attr-item-list').html(html);
			$('.modal-dialog').remove();
			$('.attr-btn').html('<i class="fa fa-shopping-cart"></i> 修改属性');
		},
		td_remove:function(o){
			$(o).parents('tr').remove();
		},
		// 选中的属性id
		select_attr_id:[],
	}
	</script>
</body>
<!--  /Body -->
</html>