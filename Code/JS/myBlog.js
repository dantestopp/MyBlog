var page;
var section;
function getURLParameter(name) {
  return decodeURI(
   (RegExp(name + '=' + '(.+?)(&|$)').exec(location.search)||[,null])[1]
   );
}
jQuery.fn.exists = function(){return this.length;}

$(document).ready(function(){
	section = getURLParameter("section");
	if(section == "blog" || section == "null"){
		$("#show").empty();
		page = getURLParameter("page");
		if(page =="null")
			page = 1;
		document.title = "Page"+page+" of my Blog";
		$("#show").append("<div id='posts'></div>");
		loadPage();
	}
	if(section == "login" )
	{
		$("#show").empty();
		$("#show").append("<div id='write'></div>");
		loadLogin();
	}
	if(section == "dashboard")
	{
		$("#show").empty();
		$("#show").append("<div id='dashboard'></div>");
		loadDashboard();
	}	
});
function loadPage()
{
	$.ajax({
		url: "php/page.php?page="+page
	}).done(function(data){
		var json = $.parseJSON(data);
		$("#posts").empty();
		$.each(json, function(i,item){
		  $("#posts").append("<div class='blogPost'><div class='blogTitle'>"+item.blogTitle+"</div><div class='blogText'>"+item.blogText+"</div><div class='blogDate'>"+item.blogDate+"</div></div>")
		});
		var nextPage = parseInt(page+1);
		var lastPage = parseInt(page-1);
		if(lastPage < 1)
			lastPage = 0;
		$("#posts").append("<div id='lastPage'><a href='?page="+lastPage+"'>Last Page</a></div><div id='nextPage'><a href='?page="+nextPage+"'>Next Page</a></div>");

	});
}
function load(id)
{
	$.ajax({
		url: "php/post.php?id="+id
	}).done(function(data){
		var json = $.parseJSON(data);
		$("#posts").empty();
		$.each(json, function(i,item){
		  $("#posts").append("<div class='blogPost'><div class='blogTitle'>"+item.blogTitle+"</div><div class='blogText'>"+item.blogText+"</div><div class='blogDate'>"+item.blogDate+"</div></div>")
		});
	});
}
function loadLogin()
{
	$.ajax({
		url: "login.html"
	}).done(function(data){
		$("#write").html(data);
	});
}
function login()
	{
		$.post( "php/login.php", { username: $("#username").val(), password: $("#password").val() } ).done(
			function(data){
				var json = $.parseJSON(data);
				if(json.success=="false")
					$("#write").prepend('<div class="ui error message"><div class="header">'+json.exception+'</div></div>');
			});
	};
function loadDashboard()
{
	$.ajax({
		url: "dashboard.html"
	}).done(function(data){
		$("#dashboard").html(data);
	});
}
