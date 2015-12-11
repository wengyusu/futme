<div class="container">
<canvas id="myChart" width="300" height="300" class="col-md-offset-1"></canvas>
<canvas id="myChart1" width="300" height="300" class="col-md-offset-1"></canvas>
<div class="panel panel-default col-md-8 col-md-offset-1">
<div class="panel-heading">签到情况预览</div>
<table class="table table-hover ">
<tbody>
<tr>
		<th>ID</th>
		<th>与会人员姓名</th>
		<th>单位</th>
		<th>是否签到</th>
		<th>是否迟到</th>
		<th>签到时间</th>
</tr>
<?php
foreach ($data as $row){
	echo "<tr>";
	echo "<th>$row[id]</th>";
	echo "<th>$row[username]</th>";
	echo "<th>$row[school_id]</th>";
	echo "<th>$row[time]</th>";
	echo "<th>$row[late]</th>";	
	echo "<th>$row[login_time]</th>";
	echo "</tr>";

} 
?>

</tbody>
</table>
</div>
</div>
<script src="../../js/chart.min.js" charset="UTF-8"></script>
<script type="text/javascript">
window.onload = function(){
				var ctx = document.getElementById("myChart").getContext("2d");
				window.myDoughnut = new Chart(ctx).Doughnut(data);
				var ctx1 = document.getElementById("myChart1").getContext("2d");
				window.myDoughnut1 = new Chart(ctx1).Doughnut(data1);
			};
var data = [
	{
		value: <?=$numyes?>,
		color:"#F38630",
		label:"已签到"
	},
	{
		value : <?=$numall-$numyes?>,
		color : "#69D2E7",
		label:"未签到"
	}			
]

var data1 = [
	{
		value: <?=$numlate?>,
		color:"#56ce21",
		label:"准时"
	},
	{
		value : <?=$numall-$numlate?>,
		color : "#7f6000",
		label:"迟到"
	}			
]

</script>
