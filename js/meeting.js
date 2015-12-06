$(document).ready(function(){
	$(".school").click(function(){
		$("body").append("<div id=\"sc\"></div>");
		$("#sc").style.display = 'none';
		$("#sc").remove();
	});
	$("#sc").live('click',function(){		
		$("#sc").style.display = 'none';
		$("#sc").remove();
		});
});
  
