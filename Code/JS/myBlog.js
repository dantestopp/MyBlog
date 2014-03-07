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
	if(section == "admin" )
	{
		$("#content").append("<div id='write'></div>");
	}	
});
$("#posts").ready(function(){
	$.ajax({
		url: "php/page.php?page="+page
	}).done(function(data){
		var json = $.parseJSON(data);
		$.each(json, function(i,item){
		  $("#posts").append("<div class='blogPost'><div onclick='load("+item.id_blogPost+");' class='blogTitle'>"+item.blogTitle+"</div><div class='blogText'>"+item.blogText+"</div><div class='blogDate'>"+item.blogDate+"</div></div>")
		});
		var nextPage = parseInt(page+1);
		var lastPage = parseInt(page-1);
		if(lastPage < 1)
			lastPage = 0;
		$("#posts").append("<div id='lastPage'><a href='?page="+lastPage+"'>Last Page</a></div><div id='nextPage'><a href='?page="+nextPage+"'>Next Page</a></div>");

	});
});
function load(id)
{
	$("#content").empty();
	$.ajax({
		url: "php/post.php?id="+id
	}).done(function(data){
		var json = $.parseJSON(data);
		$.each(json, function(i,item){
		  $("#content").append("<div class='blogPost'><div class='blogTitle'>"+item.blogTitle+"</div><div class='blogText'>"+item.blogText+"</div><div class='blogDate'>"+item.blogDate+"</div></div>")
		});
	});
}
