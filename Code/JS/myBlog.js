var page;
var section;
function getURLParameter(name) {
  return decodeURI(
   (RegExp(name + '=' + '(.+?)(&|$)').exec(location.search)||[,null])[1]
   );
}

$(document).ready(function(){
	section = getURLParameter("section")
	if(section =="blog" || section == "null"){
		page = getURLParameter("page");
		if(page =="null")
			page = 1;
		document.title = "Page"+page+" of my Blog";
		$("#content").append("<div id='posts'></div>");
	}
	//Temp
	if(section == "admin" )
		console.log("admin");
});
$("#posts").ready(function(){
	$.ajax({
		url: "php/page.php?page="+page
	}).done(function(data){
		var json = $.parseJSON(data);
		$.each(json, function(i,item){
		  $("#posts").append("<div class='blogPost'><div class='blogTitle'>"+item.blogTitle+"</div><div class='blogText'>"+item.blogText+"</div></div>")
		});

	});
});
