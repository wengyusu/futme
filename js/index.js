
//模态内容消失
function display(){
	var sc = document.getElementById('school');
	var nm = document.getElementById('name');
	document.getElementById('modalMask').style.display = 'none';
	document.getElementById('chooseSchool').style.display = 'none';

}
//获取学校列表
function scList(){
	var sc = document.getElementById('school');
	var nm = document.getElementById('name');
	var choice = document.getElementsByTagName('li');
	sc.onclick = function(){
			this.getElementsByTagName('input')[0].disabled = "disabled";
			document.getElementById('modalMask').style.display = 'block';
			document.getElementById('chooseSchool').style.display = 'block';

			for(var i=0;i<choice.length;i++){
				var schoolData;
				choice[i].onclick = function(){
					sc.getElementsByTagName('input')[0].value = this.firstChild.nodeValue;
					ajax(url,this.firstChild.nodeValue,displayName);                                //发送学校的名字到学校对应的URL，返回对应的姓名
					display();
				}	
			}
		 
		}
	document.getElementById('list').onclick = searchData;
	document.getElementById('modelContent').getElementsByTagName('span')[0].onclick = display;
	document.getElementById('modalMask').onclick = display;

}


//生成姓名并可自己编辑
function displayName(data){
	var data = JSON.parse(data);
	var nameChange = document.getElementById('name').getElementsByTagName('input')[0];
	nameChange.value = data[0].name;     //
	// nameChange.readOnly = undefined;
}
//快速搜索
function searchData(){
	var list = document.getElementById('list');
	list.oninput=function (event) {
		ajax(url,"word="+this.value,loadSchool);  //发送输入的关键字获得可能的学校名字
	}
}

//检查快速搜索内容输出
function loadSchool(data){
	var data = JSON.parse(data);
	var schoolChoise = document.getElementById('modelContent').getElementsByTagName('ul')[0];
	var choice = document.getElementsByTagName('li');
	schoolChoise.innerHTML = "";
	if(data){
		for(var i=0;i<data.length;i++){
			var li = document.createElement('li');
			li.innerHTML = data[i].school;
			schoolChoise.appendChild(li);
		}
	}else{
		var error = document.getElementById('modelContent').getElementsByTagName('span')[0];
		error.innerHTML = "未找到相关内容，请检查后重新输入";
		error.style.fontSize = "3em";
		error.style.fontWeight = "bolder";
		error.style.textAlign = "center";
	}
	for(var i=0;i<choice.length;i++){
				var schoolData;
				choice[i].click = function(){
					sc.getElementsByTagName('input')[0].innerHTML = this.firstChild.nodeValue;
					ajax(url,this.firstChild.nodeValue,displayName);                                //发送选中的内容到学校对应的URL，返回对应的姓名
					display();
				}	
			}
}


//数据传输函数  
function ajax(url,data,fun,argument){                            //只有这的url不用更改，是一个参数，其余的URL 都要改
	var sc = document.getElementById('school');
	var nm = document.getElementById('name');
	var ajax = getXMLHttpRequest();

	ajax.open("POST",url,data);
	ajax.setRequestHeader('Content-Type','application/x-www-form-urlencode');
	ajax.send(data);
	ajax.onreadystatechange = function(){
		if(ajax.readyState == 4){
			if((ajax.status >=200 && ajax.status < 300) || (ajax.status == 304)){
				fun(ajax.responseText);
			}else{
				alert("错误：ajax.status")
			}
		}
	}
}
// 提交表单
function postList(){
	var sc = document.getElementById('school');
	var nm = document.getElementById('name');
	var own = document.getElementById('bt1');
	var other = document.getElementById('bt2');
	var listData = "school=" + sc.getElementsByTagName('input')[0].value + "name=" + nm.getElementsByTagName('input')[0].value;
	if(!sc.getElementsByTagName('input')[0].value||!nm.getElementsByTagName('input')[0].value){
		alert("请选择您的学校");
	}else{
		sc.getElementsByTagName('input')[0].style.border="1.5px solid #46b3f1";
		nm.getElementsByTagName('input')[0].style.border="1.5px solid #46b3f1";
	}
	data = JSON.parse(data);                  //发送学校+名字
	own.onclick = ajax(url,listData,function (){
		alert("签到");
	});        //
	other.onclick = ajax(url,listData,function (){
		alert("代签");
	});        
	               //签到时间
	if(data[0].time>0){ 
		own.style.width="80%";
		own.style.backgroundColor="#46b3f1";
		other.style.display=none;
		own.innerHTML="查看会务信息";

	}else{
		own.style.backgroundColor="#46b3f1";
		other.style.backgroundColor="#46b3f1";
	}
	
}

window.onload = scList;
document.getElementById('bt1').onclick = postList;
document.getElementById('bt2').onclick = postList;
