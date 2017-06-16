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
    <link href="/tp3/Public/Admin/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/tp3/Public/Admin/assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/tp3/Public/Admin/assets/css/weather-icons.min.css" rel="stylesheet" />

    <!--Beyond styles-->
    <link href="/tp3/Public/Admin/assets/css/beyond.min.css" rel="stylesheet" type="text/css" />
    <link href="/tp3/Public/Admin/assets/css/demo.min.css" rel="stylesheet" />
    <link href="/tp3/Public/Admin/assets/css/typicons.min.css" rel="stylesheet" />
    <link href="/tp3/Public/Admin/assets/css/animate.min.css" rel="stylesheet" />

    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="/tp3/Public/Admin/assets/js/skins.min.js"></script>
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
                            <img src="/tp3/Public/Admin/assets/img/logo.png" alt="" />
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
	<div class="col-lg-12">
		<h1 class="page-header">品牌管理</h1>
	</div>
</div>
<form role="form" action="add" method="post" enctype="multipart/form-data">
	<div class="panel panel-default">
		<div class="panel-heading">
			品牌添加
		</div>
		<div class="panel-body">
			<div class="form-group">
				<label>品牌名称</label>
				<input class="form-control" name="brand_name">
				<p class="help-block">请填写品牌名称</p>
			</div>
			
			<div class="form-group">
				<label>Logo</label>
				<input type="file" name="logo">
			</div>
		</div>
	</div>
	<button type="submit" class="btn btn-default">保存数据</button>
</form>
				</div>
                <!-- /Page Body -->
            </div>
            <!-- /Page Content -->
        </div>
        <!-- /Page Container -->
        <!-- Main Container -->

    </div>

    <!--Basic Scripts-->
    <script src="/tp3/Public/Admin/assets/js/jquery-2.0.3.min.js"></script>
    <script src="/tp3/Public/Admin/assets/js/bootstrap.min.js"></script>

    <!--Beyond Scripts-->
    <script src="/tp3/Public/Admin/assets/js/beyond.min.js"></script>

    <!--Page Related Scripts-->
    <!--Sparkline Charts Needed Scripts-->
    <script src="/tp3/Public/Admin/assets/js/charts/sparkline/jquery.sparkline.js"></script>
    <script src="/tp3/Public/Admin/assets/js/charts/sparkline/sparkline-init.js"></script>
	
	 <!--Fuelux Spinner-->
    <script src="/tp3/Public/Admin/assets/js/fuelux/spinner/fuelux.spinner.min.js"></script>
	
	<script>
	
	var btn = {
		window : function(msg,func,p){
			var html =  '<div class="modal-dialog modal-msg-windows" style="position: fixed;top: 50%;left: 50%;margin-top:-83px;margin-left:-300px;">'+
						'	<div class="modal-content">'+
						'		<div class="modal-header">'+
						'			<button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="btn.closeBtn(this)">×</button>'+
						'			<h4 class="modal-title">信息提示</h4>'+
						'		</div>'+
						'		<div class="modal-body">'+
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
		uploader:function(o,input,Multiple,main){
			if($('input[name="myfile"]').length > 0 ){
				$('input[name="myfile"]').remove();
			}
			$(o).after('<input type="file" name="myfile" style="display:none;">');
			$('input[name="myfile"]').click();
			
			// 上传图片
			$('input[name="myfile"]').change(function(){

				$(this).after('<img id="loading" src="/tp3/Public/Admin/images/loading1.gif" width="30" style="margin-left:10px;">');

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
						
						var li = '<li>'+
								 '	<img src="/'+data.path+'" width="100" height="100">'+
								 '	<input type="hidden" name="'+input+'" value="'+data.path+'">'+
								 '<p>' ;
							if(Multiple !== false){
								li += '<span class="label label-info" onclick="btn.mainimg(this,\''+main+'\',\''+input+'\')">主图</span>';  
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
			
		}
	}
	</script>
</body>
<!--  /Body -->
</html>