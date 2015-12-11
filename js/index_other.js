function scroll(){
	var p1 = document.getElementById('p1');
	var p2 = document.getElementById('p2');
	var p = document.getElementById('mainContent');
	p2.innerHTML=p1.innerHTML;
	function roll(){                                          //先执行else里面的，让p1自己向上走，知道p2到达顶部，然后换成p1接着往上走
		if(p2.offsetTop<=p.scrollTop){                     //如果p2到包含元素的上边界的偏移量<包含元素已经滚动到上边界的像素------p2没到包含元素的上边界
			p.scrollTop-=p1.offsetHeight;                  //包含元素的已经滚动到顶部的像素 -=p1的元素高度 
		}else{                                 
			p.scrollTop++; 
		}
	}
	
	var time = setInterval(roll,30);
	p.onmouseover=function(){
		clearInterval(time);
	}
	p.onmouseout=function(){
		time=setInterval(roll,30);
	}
}
function view(img,content1,content2,content3,mask){
	
		img.onclick = function(){
			mask.style.display = 'block'
			content1.style.display = 'block';
		}	
	    mask.onclick = function(){
		content1.style.display = 'none';
	 	content2.style.display = 'none';
	 	content3.style.display = 'none';
	 	mask.style.display = 'none';
	 }
	
}

function init(){
	var schedule = document.getElementById('schedule');
	var map = document.getElementById('map');
	var address = document.getElementById('address');
	var scheduleContent = document.getElementById('scheduleContent');
	var mapContent = document.getElementById('mapContent');
	var addressContent = document.getElementById('addressContent');
	var modelMask = document.getElementById('modelMask');
	scroll();
	view(schedule,scheduleContent,mapContent,addressContent,modelMask);
	view(map,mapContent,scheduleContent,addressContent,modelMask);
	view(address,addressContent,scheduleContent,mapContent,modelMask);

} 
window.onload = init;
