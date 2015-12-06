<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1",maximum-scale=1,user-scalable=no>
	<title>签到主界面</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/newmeeting/css/index_index.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/newmeeting/css/bootstrap.min.css">

</head>
<body>

	<div class="container">
		<div class="head">
			
			<h1><span id="pen"></span>2016届毕业生秋季双选会<br/>签到系统</h1>
		</div>
		<div class="choose">
			<div id="school">
				<i></i><input type="text" style="width:80%" placeholder="请选择您的学校" readonly="readonly">
			</div>
			<div id="name">
				<i></i><input type="text" style="width:80%" placeholder="请输入您的姓名" readonly="readonly">
			</div>
		</div>
	</div>

	<div class="bt">
		<button id='bt1' onclick = postList(1)>签到</button>
		<button id='bt2' onclick = postList(0)>代签</button>
	</div>
	<div id="modalMask"></div>
	<div id ="chooseSchool">
		
		<div id="modelContent">
			<h2><span>&lt;&lt;返回</span>选择</h2>
			<div >
				<input id="list" placeholder="快速搜索" style="width:100%">
				<span></span>
			</div>	
			<ul class="list-group">
			</ul>>
		</div>
	</div>
<!-- 	<div class="success">
		<h1>签到成功</h1>
		<p><b>贵单位展位号是</b></p>
		<p>欢迎来我校选拔人才</p>
	</div> -->
	<script type="text/javascript" src="http://localhost/newmeeting/js/jquery.min.js"></script>
	<script type="text/javascript" src="http://localhost/newmeeting/js/index.js"></script>		
</body>
</html>