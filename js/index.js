
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
	//var nm = document.getElementById('name');
	var schoolChoise = document.getElementById('modelContent').getElementsByTagName('ul')[0];
	sc.onclick = function(){
			this.getElementsByTagName('input')[0].disabled = "disabled";
			document.getElementById('modalMask').style.display = 'block';
			document.getElementById('chooseSchool').style.display = 'block';
			document.getElementById('list').value='';
			ajax('http://localhost/newmeeting/index.php/meeting/getschool','',function(data){
			var data = JSON.parse(data);
			schoolChoise.innerHTML='';
			for(var i=0;i<data.length;i++){
				
				var li = document.createElement('li');
				li.innerHTML = data[i].school;
				li.className="btn btn-default btn-block";
				schoolChoise.appendChild(li);

	
			}
						var choice = document.getElementsByTagName('li');
			for(var i=0;i<choice.length;i++){
				choice[i].onclick = function(){
				//alert(1);
				sc.getElementsByTagName('input')[0].value = this.firstChild.nodeValue;
				ajax('http://localhost/newmeeting/index.php/meeting/getname',this.firstChild.nodeValue,displayName);				                                //发送学校的名字到学校对应的URL，返回对应的姓名
				display();
				
				}
			}
			});


			}
		 
	document.getElementById('list').onclick = searchData;
	document.getElementById('modelContent').getElementsByTagName('span')[0].onclick = display;
	document.getElementById('modalMask').onclick = display;

}


//生成姓名并可自己编辑
function displayName(data){
	var nm = document.getElementById('name');
	var choice = document.getElementsByTagName('li');
	var data = JSON.parse(data);
	var schoolChoise = document.getElementById('modelContent').getElementsByTagName('ul')[0];
	var error = document.getElementById('modelContent').getElementsByTagName('span')[1];
	nm.onclick = function(){
			schoolChoise.innerHTML = "";
			this.getElementsByTagName('input')[0].disabled = "disabled";
			document.getElementById('modalMask').style.display = 'block';
			document.getElementById('chooseSchool').style.display = 'block';
			if(data){
				schoolChoise.innerHTML = "";
				for(var i=0;i<data.length;i++){
				var li = document.createElement('li');
				li.innerHTML = data[i].name;
				li.className="btn btn-default btn-block";
				schoolChoise.appendChild(li);
				error.innerHTML="";
				var choice = document.getElementsByTagName('li');
				//var schoolData;
				choice[i].onclick = function(){
					if(this.firstChild.nodeValue!='null'){
					nm.getElementsByTagName('input')[0].value = this.firstChild.nodeValue;
				}
					display();
					/*if(data[i].time=1){
						own.style.display='none';
						other.style.display='none';
						alert('已签到');
					}     */
						
				}
				}
			}
			else{
				error.innerHTML = "未找到相关姓名";
				error.style.fontSize = "3em";
				error.style.fontWeight = "bolder";
				error.style.textAlign = "center";
			}
		}
	}

//快速搜索
function searchData(){
	var list = document.getElementById('list');
	list.oninput=function (event) {
		ajax('http://localhost/newmeeting/index.php/meeting/schoolsearch',this.value,loadSchool);  //发送输入的关键字获得可能的学校名字
	}
}

//检查快速搜索内容输出
function loadSchool(data){
	var sc = document.getElementById('school');
	var data = JSON.parse(data);
	var schoolChoise = document.getElementById('modelContent').getElementsByTagName('ul')[0];
	var choice = document.getElementsByTagName('li');
	schoolChoise.innerHTML = "";
	var error = document.getElementById('modelContent').getElementsByTagName('span')[1];
	if(data){
		for(var i=0;i<data.length;i++){
			var li = document.createElement('li');
			li.innerHTML = data[i].school;
			schoolChoise.appendChild(li);
			li.className="btn btn-default btn-block";
			error.innerHTML="";
		}
	}else{
		
		error.innerHTML = "未找到相关内容，请检查后重新输入";
		error.style.fontSize = "3em";
		error.style.fontWeight = "bolder";
		error.style.textAlign = "center";
	}
	var choice = document.getElementsByTagName('li');
	for(var i=0;i<choice.length;i++){
				var schoolData;
				choice[i].onclick = function(){
					sc.getElementsByTagName('input')[0].value = this.firstChild.nodeValue;
					display();

					
				}	
			}
}


//数据传输函数  
function ajax(url,data,fun,argument){                            //只有这的url不用更改，是一个参数，其余的URL 都要改
	var sc = document.getElementById('school');
	var nm = document.getElementById('name');
	var ajax = new XMLHttpRequest();

	ajax.open("POST",url,true);
	ajax.setRequestHeader('Content-Type','application/x-www-form-urlencode');
	ajax.send(data);
	//alert(data);
	ajax.onreadystatechange = function(){
		if(ajax.readyState == 4){
			if((ajax.status >=200 && ajax.status < 300) || (ajax.status == 304)){
				//alert(ajax.responseText);
				fun(ajax.responseText);
			}else{
				alert("错误：ajax.status")
			}
		}
	}
}
// 提交表单
function postList(judge){
	var sc = document.getElementById('school');
	var nm = document.getElementById('name');
	var own = document.getElementById('bt1');
	var other = document.getElementById('bt2');
	var time = Date.parse(new Date());
	var listData = nm.getElementsByTagName('input')[0].value+","+time+","+judge;
	if(!sc.getElementsByTagName('input')[0].value||!nm.getElementsByTagName('input')[0].value){
		alert("请选择您的学校");
	}
	else{
		sc.getElementsByTagName('input')[0].style.border="1.5px solid #46b3f1";
		nm.getElementsByTagName('input')[0].style.border="1.5px solid #46b3f1";
		//alert(listData);
		if(judge==1){
			ajax('http://localhost/newmeeting/index.php/meeting/submit',listData,function (data){
			alert("签到");
			check(data);

		});    
		}    
		if(judge==0){
			ajax('http://localhost/newmeeting/index.php/meeting/submit',listData,function (data){
			alert("代签");
			check(data);
		});        
	}
	}
	//listData = JSON.parse(listData);                  //发送学校+名字


	
}

function check(data){
	var own = document.getElementById('bt1');
	var other = document.getElementById('bt2');
	data = JSON.parse(data);
		               //签到时间
	if(data[0].time>0){ 
		//own.style.width="80%";
		//own.style.backgroundColor="#46b3f1";
		other.style.display='none';
		//own.innerHTML="查看会务信息";
		own.style.display='none';
		alert('已签到');

	}else{
		own.style.backgroundColor="#46b3f1";
		other.style.backgroundColor="#46b3f1";

	}
}

window.onload = scList;
document.getElementsByTagName('li').className='btn';
//window.onload = displayName;
//document.getElementById('bt1').onclick = postList(1);
//document.getElementById('bt2').onclick = postList(0);