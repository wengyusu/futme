 <?php $this->load->helper('form'); ?>

<div class="container">
	<div class="panel panel-default col-md-8 col-md-offset-2">
	<div class="panel-heading">添加与会人员</div>
	<form class="form-horizontal panel-body" name="input" action="<?php echo site_url('check/joineradd'); ?>" method="post">
  <div class="form-group">
    <label class="col-md-4 control-label">姓名</label>
    <div class="col-md-4">
      <input type="password" class="form-control" placeholder="name" value="" name="name">
    </div>
	<span><?php echo $requireerror;?></span>
</div>
<div class="form-group">
<label class="col-md-4 control-label">单位</label>
<div class="col-md-4">
<select class="form-control" name="school_id">
<option>请选择</option>
<?php 
for($i=0;$i<count($school);$i++){
	$row=$school[$i];
	echo "<option value=$row[id]>$row[name]</option>";
}
	?>
</select>
</div>

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
<a id="update" onclick="javascript:code.src='<?php echo site_url('check/get_code/?_=12839400/?tm='); ?>'+Math.random()">刷新(不区分大小写)</a>
	</div>
  </div>
  <div class="form-group">
    <div class="col-md-offset-4 col-md-4">
      <button type="submit" class="btn btn-default" name="submit" value="submit">Add</button>
    </div>
  </div>
</form>
</div>
</div>