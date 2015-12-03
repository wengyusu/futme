<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	 <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- 新 Bootstrap 核心 CSS 文件 -->
	<link rel="stylesheet" href="http://localhost/newmeeting/css/bootstrap.min.css">

	<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
	<script src="http://localhost/newmeeting/js/jquery.min.js"></script>

	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<script src="http://localhost/newmeeting/js/bootstrap.min.js"></script>
	<style>
	.container {margin-top:10%;}
	</style>
	<title>登陆</title>
</head>

<body>
<?php
 $this->load->helper('url');
 $this->load->library('session');
  $this->load->helper('form');
?>
<div class="container">
	<div class="panel panel-default col-md-8 col-md-offset-2">
	<div class="panel-heading">星辰工作室-后台登陆</div>
	<form class="form-horizontal panel-body" name="input" action="<?php echo site_url('check'); ?>" method="post">
  <div class="rows">
  <div class="form-group">
    <label class="col-md-4 control-label">Username</label>
    <div class="col-md-4">
      <input type="text" class="form-control" placeholder="Username" value="<?php echo set_value('username'); ?>" name="username">
    </div>
	<span><?php echo $usererror;?></span>
</div>
  </div>
  <div class="form-group">
    <label class="col-md-4 control-label">Password</label>
    <div class="col-md-4">
      <input type="password" class="form-control" placeholder="Password" name="password">
    </div>
	<span><?php echo $requireerror;?></span>
  </div>
    <div class="form-group">
    <label class="col-md-4 control-label">验证码</label>
	    <div class="col-md-4">
      <input type="text" class="form-control" placeholder="验证码" name="code">
    </div>
    <div class="col-md-4">
      <img src="<?php echo site_url('check/get_code/?_=12839400'); ?>" id="code" >	<span><?php echo $codeerror;?></span>
    </div>
		<div class="col-md-4">
	<a id="update" onclick="javascript:code.src='<?php echo site_url('check/get_code/?_=12839400/?tm='); ?>'+Math.random()">刷新（不区分大小写）</a>
	</div>

  </div>
  <div class="form-group">
    <div class="col-md-offset-4 col-md-4">
      <button type="submit" class="btn btn-default" name="submit" value="session">Sign in</button>
    </div>
  </div>
</form>
</div>
</div>
</body>
</html>