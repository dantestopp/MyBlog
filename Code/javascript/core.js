var defaultpage = "home";
var pages = {
	"home" : {
		"title" : "Home",
		"file" : "home.php"
	},
	"blog" : {
		"title" : "My Blog",
		"file" : "page.php"
	}
};

function loadcontent() {
	active = window.location.hash.substring(1) || defaultpage;

	$('#menu a').removeClass("active");
	$('#menu a[href="#' + active + '"]').addClass("active");

	if(pages.hasOwnProperty(active)) {
		document.title = Object.getOwnPropertyDescriptor(pages,active).value.title;
		$.ajax({
			url: "template/" + Object.getOwnPropertyDescriptor(pages,active).value.file
		}).done(function(data) {
			$("#content").html(data);
		});
	} else {
		window.location.hash = "";
		document.title = Object.getOwnPropertyDescriptor(pages,defaultpage).value.title;
		$.ajax({
			url: "template/" + Object.getOwnPropertyDescriptor(pages,defaultpage).value.file
		}).done(function(data) {
			$("#content").html(data);
		});
	}
}

$(document).ready(function() {
	$("#menu").html("");
	for(var page in pages) {
		$("#menu").append('<a href="#' + page +'" class="item">' + pages[page].title + '</a>');
	}
	loadcontent();
	$("a").click(function() {
		loadcontent();
	});
});