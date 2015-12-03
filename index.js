
$(document).ready(function(){
	
		$('.school').click(function(){
			$('.school').load(url);
		})
		$('.name').click(function(){
			$('.name').load(url);
		})
		$('#bt').click(function(){
			$.post(url,{
				name : $('.name').val(),
				school : $('.school').val()
			},function(){
				var schoolId = $.get(url)
				$(".success").css("display","block");
				$(".success b").after(schoolId);
			})
		})
	
	
});
$("button").click(function(){

	alert("hello");
})
// this.getElementsByTagName('input')[0].disabled="disabled"
// 		if (!this.class){
// 			addClass(this,"active");
// };
	// $("#bt1").removeAttr("disabled");$.getJSON(url,data,functon(){})