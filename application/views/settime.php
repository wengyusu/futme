<?php $this->load->helper('form'); ?>
<link rel="stylesheet" type="text/css" href="http://localhost/css/bootstrap-datetimepicker.css" media="screen"/ >
<script src="../../../js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
<script src="../../../js/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
<div align="center">当前会议时间：<?php if(isset($time)){echo date('Y-m-d H:i:s',$time);} ?></div>
<div class="container">
	<div class="panel panel-default col-md-8 col-md-offset-2">
	<div class="panel-heading">Add</div>
	<form class="form-horizontal panel-body" name="input" action="<?php echo site_url('check/timeselect'); ?>" method="post">
            <div class="form-group">
                <label for="dtp_input1" class="col-md-4 control-label">时间选择</label>
                <div class="input-group date form_datetime col-md-5" data-date="2015-01-01T00:00:00Z" data-date-format="MM dd yyyy hh:ii" data-link-field="dtp_input1">
                    <input class="form-control" size="16" type="text" value=""  name="date" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
				<input type="hidden" id="dtp_input1" value="" /><br/>
            </div>
  <div class="form-group">
    <div class="col-md-offset-4 col-md-4">
      <button type="submit" class="btn btn-default" name="submit" value="session">Add</button>
    </div>
  </div>

</div>
</form>
</div>
</div>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
		//language: 'zh-CN',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 0
    });
	</script>