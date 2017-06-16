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
				<?php echo str_replace('管理','',$page_title); if(empty($_GET['id'])): ?>添加<?php else: ?>修改<?php endif; ?>
				
				<a class="btn btn-darkorange  btn-xs pull-right" href="<?php echo U('index');?>">
					<i class="fa fa-list"></i>
					<?php echo str_replace('管理','',$page_title);?>列表
				</a>
			</div>
			<div class="widget-main">
				<form class="form-horizontal" role="form" action="/Admin/Attr/add" method="post">
					<!-- 分类名称 -->
					<div class="form-group">
						<label for="attr_name" class="col-sm-2 control-label no-padding-right">属性名称</label>
						<div class="col-sm-10">
							<input type="text" value="<?php echo ((isset($data["attr_name"]) && ($data["attr_name"] !== ""))?($data["attr_name"]):''); ?>" class="form-control" name="attr_name" id="attr_name" placeholder="属性名称">
						</div>
					</div>	
					
					<!-- 简介 -->
					<div class="form-group">
						<label for="attr_value" class="col-sm-2 control-label no-padding-right">属性选项</label>
						<div class="col-sm-10">
							<textarea class="form-control" rows="6" name="attr_value" id="attr_value" placeholder="属性选项"><?php echo ((isset($items) && ($items !== ""))?($items):''); ?></textarea>
							<p>一行为一个属性选项</p>
						</div>
					</div>
							
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-palegreen">
								<i class="fa fa-edit"></i>
								保存数据
							</button>
							<?php if(!empty($_GET['id'])): ?><input type="hidden" name="id" value="<?php echo ($_GET['id']); ?>"><?php endif; ?>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-lg-12 col-sm-12 col-xs-12">
	
	</div>
</div>
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
			
			if(btn.select_attr_id.length != 0){
				$('.modal-dialog-attr-items input[name="attr_item_id[]"]').each(function(){
					if($.inArray($(this).val(),btn.select_attr_id) != '-1'){
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
			btn.select_attr_id = [];
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
						btn.select_attr_id.push($(this).find('input').val());
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
		select_attr_id:[]
	}
	</script>
</body>
<!--  /Body -->
</html>