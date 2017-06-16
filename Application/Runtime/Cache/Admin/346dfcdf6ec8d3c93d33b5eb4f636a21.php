<?php if (!defined('THINK_PATH')) exit();?>
<script type="text/javascript" src="/Public/jBox/jquery-1.4.2.min.js"></script>
<link id="skin" rel="stylesheet" href="/Public/jBox/Skins/Default/jbox.css" />
<script type="text/javascript" src="/Public/jBox/jquery.jBox-2.3.min.js"></script>
<script type="text/javascript" src="/Public/jBox/i18n/jquery.jBox-zh-CN.js"></script>

<div id="uploadForm">
    <input id="file" type="file"/>
    <button id="upload" type="button" onclick="upload()">upload</button>
</div>  
<script>
	function upload(){
		var formData = new FormData();
		formData.append('file', $('#file')[0].files[0]);
		$.ajax({
			url: '/Goods/up.html',
			type: 'POST',
			cache: false,
			data: formData,
			processData: false,
			contentType: false
		})
	}
</script>