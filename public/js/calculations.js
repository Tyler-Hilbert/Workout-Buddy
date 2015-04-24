function calc(){
	var perList = document.getElementById("percents");
	var percent = perList.options[perList.selectedIndex].value;


	$("document").ready(function(){
	    $.ajax({
	        type: "POST",
	        url : "/getworkout",
	        data : percent,
	        success : function(data){
	            console.log(data);
	        }
	    },"json");
	});
}