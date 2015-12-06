<div class="container">
<div class="panel panel-default col-md-8 col-md-offset-2">
<div class="panel-heading">签到情况预览</div>
<table class="table table-hover ">
<tbody>
<tr>
		<th>ID</th>
		<th>与会人员姓名</th>
		<th>单位</th>
		<th>是否签到</th>
		<th>签到时间</th>
</tr>
<?php
foreach ($data as $row){
	echo "<tr>";
	echo "<th>$row[id]</th>";
	echo "<th>$row[username]</th>";
	echo "<th>$row[school_id]</th>";
	echo "<th>$row[time]</th>";
	echo "<th>$row[login_time]</th>";
	echo "</tr>";

} 
?>

</tbody>
</table>
</div>
</div>