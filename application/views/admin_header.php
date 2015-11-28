<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
	 <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://localhost/css/bootstrap.min.css" media="screen">
	<script src="http://localhost/js/jquery.min.js"></script>
	<script src="http://localhost/js/bootstrap.min.js" charset="UTF-8"></script>
	
	<style>
	.container {margin-top:10%;}
	.leftContent {float:left;}
	</style>
	<title>签到系统后台管理系统</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/css/admin.css">
</head>
<?php $this->load->helper('url'); ?>
<body>
	<div class="heading">
	<span><?php echo $_SESSION['username'];?></span>
		<img class="logo" src="http://localhost/img/logo.gif">
		<ul class="fun nav nav-tabs">
			<li role="presentation"><a href="<?php echo site_url('admin/schooladd'); ?>">新增与会单位</a></li>
			<li role="presentation"><a href="<?php echo site_url('admin/joineradd'); ?>">新增与会人员</a></li>
			<li role="presentation"><a href="<?php echo site_url('admin'); ?>">开启/关闭网站</a></li>
			<li role="presentation"><a href="<?php echo site_url('admin/upload'); ?>">导入外部Excel数据</a></li>
			<li role="presentation"><a href="<?php echo site_url('admin'); ?>">导出签到数据</a></li>
			<li role="presentation"><a href="<?php echo site_url('admin/clear'); ?>">清空签到数据</a></li>
			<a class="btn btn-default" href="<?php echo site_url('admin/logout'); ?>">退出</a>
		</ul>
			
	</div>
	<div class="leftContent">
		<ul class="nav nav-pills nav-stacked">
			<li role="presentation" class="contentManu">内容管理</li>
			<li role="presentation"><a href="<?php echo site_url('admin/settime'); ?>">设置会议时间</a></li>
			<li role="presentation"><a href="<?php echo site_url('admin'); ?>">签到情况预览</a></li>
			<li role="presentation"><a href="<?php echo site_url('admin'); ?>">查看已签到</a></li>
			<li role="presentation"><a href="<?php echo site_url('admin'); ?>">查看未签到</a></li>
			
		</ul>
		<ul class="nav nav-pills nav-stacked">
			<li role="presentation" class="contentManu">权限管理</li>
			<li role="presentation" class="contentManu"><a href="<?php echo site_url('admin/preadd/0'); ?>">新增发布人员</a></li>
			<li role="presentation" class="contentManu"><a href="<?php echo site_url('admin/preeadd/2'); ?>">新增查看人员</a></li>
			<li role="presentation" class="contentManu"><a href="<?php echo site_url('admin/showuser'); ?>">查看用户</a></li>
			<li role="presentation" class="contentManu"><a href="<?php echo site_url('admin/change'); ?>">修改用户密码</a></li>
		</ul>
	</div>




