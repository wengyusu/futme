<?php $this->load->helper('form'); ?>
<div class="container">
	<div class="panel panel-default col-md-8 col-md-offset-2">
	<div class="panel-heading">Add</div>
	<form class="form-horizontal panel-body" name="input" action="<?php echo site_url('check/add'); ?>" method="post">
  <div class="rows">
  <div class="form-group">
  <span><?php echo $repeaterror;?></span>
    <label class="col-md-4 control-label">用户名</label>
    <div class="col-md-4">
      <input type="text" class="form-control" placeholder="Username" value="<?php echo set_value('username'); ?>" name="username">
    </div>
	<span><?php echo $usererror;?></span>
</div>
  </div>
  <div class="form-group">
    <label class="col-md-4 control-label">密码</label>
    <div class="col-md-4">
      <input type="password" class="form-control" placeholder="Password" name="password">
    </div>
	<span><?php echo $requireerror;?></span>
  </div>
   <div class="form-group">
    <label class="col-md-4 control-label">确认密码</label>
    <div class="col-md-4">
      <input type="password" class="form-control" placeholder="Password" name="passwordconf">
    </div>
	<span><?php echo $conferror;?></span>
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
	<a id="update" onclick="javascript:code.src='<?php echo site_url('check/get_code/?_=12839400/?tm='); ?>'+Math.random()">刷新</a>
	</div>
  </div>
  <div class="form-group">
  <input type="hidden" name="lock" value="<?php echo $lock; ?>"> 
  </div>
  <div class="form-group">
    <div class="col-md-offset-4 col-md-4">
      <button type="submit" class="btn btn-default" name="submit" value="session">Add</button>
    </div>
  </div>
</form>
</div>
</div>