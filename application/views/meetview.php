<div class="container">
<<<<<<< HEAD
<canvas id="myChart" width="400" height="400"></canvas>
<div class="panel panel-default col-md-8 col-md-offset-1">
=======
<div class="panel panel-default col-md-8 col-md-offset-2">
>>>>>>> fa340523b5c99084dc38ac6e5372964666abb82f
<div class="panel-heading">签到情况预览</div>
<table class="table table-hover ">
<tbody>
<tr>
		<th>ID</th>
		<th>与会人员姓名</th>
		<th>单位</th>
		<th>是否签到</th>
<<<<<<< HEAD
		<th>是否迟到</th>
=======
>>>>>>> fa340523b5c99084dc38ac6e5372964666abb82f
		<th>签到时间</th>
</tr>
<?php
foreach ($data as $row){
	echo "<tr>";
	echo "<th>$row[id]</th>";
	echo "<th>$row[username]</th>";
	echo "<th>$row[school_id]</th>";
	echo "<th>$row[time]</th>";
<<<<<<< HEAD
	echo "<th>$row[late]</th>";	
=======
>>>>>>> fa340523b5c99084dc38ac6e5372964666abb82f
	echo "<th>$row[login_time]</th>";
	echo "</tr>";

} 
?>

</tbody>
</table>
</div>
<<<<<<< HEAD
</div>
<script src="../../js/chart.min.js" charset="UTF-8"></script>
<script type="text/javascript">
window.onload = function(){
				var ctx = document.getElementById("myChart").getContext("2d");
				window.myDoughnut = new Chart(ctx).Doughnut(doughnutData, {responsive : true});
			};
var data = [
	{
		value: 30,
		color:"#F38630"
	},
	{
		value : 50,
		color : "#E0E4CC"
	},
	{
		value : 100,
		color : "#69D2E7"
	}			
]

</script>
=======
</div>
>>>>>>> fa340523b5c99084dc38ac6e5372964666abb82f
