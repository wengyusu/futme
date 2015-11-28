<div class="container">
<div class="panel panel-default col-md-8 col-md-offset-2">
<div class="panel-heading">Add</div>
<table class="table table-hover ">
<tbody>
<tr>
<th>发布用户</th>
<th>用户名</th>
</tr>
<?php
$i=1;
foreach ($admin as $row){
	echo "<tr>";
	echo "<th>$i</th>";
	echo "<th>$row</th>";
	echo "</tr>";
	$i++;
} 
?>
<tr>
<th>查看用户</th>
<th>用户名</th>
</tr>
<?php
$i=1;
foreach ($watcher as $row){
	echo "<tr>";
	echo "<th>$i</th>";
	echo "<th>$row</th>";
	echo "</tr>";
	$i++;
} 
?>
</tbody>
</table>
</div>
</div>